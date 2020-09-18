<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;
    protected $keyType='string';
    public $incrementing=false;
    //We can add next link because this data
    //not fields by users (insert/update unavailable for any users)
    // And this not brake our security.
    //protected $fillable = ['id','user_id','link_id','user_agent','ip','created_at','updated_at'];
    protected $guarded = [];
}
