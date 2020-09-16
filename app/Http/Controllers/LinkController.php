<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Link;

class LinkController extends Controller
{
    public function index()
    {
        $request = \request();
        $username = $request->user()->name;
        //$links = \App\Models\Link::all();
        $links = \App\Models\Link::orderBy('updated_at', 'desc')->paginate(10);
        return view('links.links',['username'=>$username,'links'=>$links]);
    }
    public function destroy(\App\Models\Link $link)
    {
        $statistics = \App\Models\Statistic::where('link_id',$link->id)->get();
        foreach($statistics as $statistic)
        {
            $statistic->delete();
        }
        $link->delete();
        return redirect()->back();
    }
    /*rename next function to destroy and you can use AJAX deleting*/
    public function destroy_ajax(\App\Models\Link $link)
    {
        $statistics = \App\Models\Statistic::where('link_id',$link->id)->get();
        foreach($statistics as $statistic)
        {
            $statistic->delete();
        }
        $link->delete();
        print "Deleted";
    }
    public function create()
    {
        return view('links.create');
    }
    private function generate_link($length = 5)
    {
        //Except letters that can be mixed (0O,1Il)
        $characters = '23456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < $length; $i++) {
            $randstring .= $characters[rand(0, strlen($characters))];
        }
        //$randstring = '59LMr1';
        return $randstring;
    }
    public function store()
    {
        \request()->validate([
            'uri'=>['required','url'],
        ]);

        // generate shortlink and save
        $link = new \App\Models\Link;
        $link->link = \request()->uri;
        $unique=false;
        do
        {
            $shortlink = $this->generate_link();
            $unique=!\App\Models\Link::where('shortlink',$shortlink)->first();
        } while ($unique!=true);
        $link->shortlink = $shortlink;
        $link->count = 0;
        $link->save();

        return redirect()->route('links.index')->with('Success', 'Link "'.$link->link.'" successfully created');
    }
    public function edit(\App\Models\Link $link)
    {
        return view('links.edit',['link'=>$link]);
    }
    public function update(\App\Models\Link $link)
    {
        \request()->validate([
            'uri'=>['required','url'],
        ]);
        $link->link = \request()->uri;
        $link->save();
        return redirect()->route('links.index')->with('Success', 'Link "'.$link->link.'" successfully updated');
    }
    public function goToPage(\App\Models\Link $page)
    {
        $statistic = new \App\Models\Statistic;
        $statistic->id=\Ramsey\Uuid\Uuid::uuid4()->toString();
        $statistic->user_id=\request()->user()->id;
        $statistic->link_id=$page->id;
        $statistic->user_agent=\request()->userAgent();
        $statistic->ip=\request()->ip();
        //$statistic->save();
        //dd($statistic);
        dispatch(new \App\Jobs\VisitorToStatistic($statistic))->onQueue('default');
        //onQueue('addStatistic');
        //if ($link = \App\Models\Link::where('shortlink',$page)->first())
        //{
        //    $href = $link->link;
        //}
        //else
        //{
        //    $href='/';
        //}
        //return redirect($href);
    }
    public function show(\App\Models\Link $link)
    {
        return view('links.show',['link'=>$link]);
    }
}
