@extends('../layout')
@section('title','Update link')
@push('styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body{
            background-color: #343a40;
        }
        h1,label{
            color: white;
        }

    </style>
@endpush
@push('scripts')
    <script src="{{ asset('js/app.js') }}" defer></script>
@endpush
@section('content')
    <div class="container">
        @include('../navbar')
        @switch($link->count)
            @case(0)
            <h1 class="mt-5 mb-5">Link not used.</h1>
            @break
            @case(1)
            <h1 class="mt-5 mb-5">Link used 1 time.</h1>
            @break
            @default
            <h1 class="mt-5 mb-5">Link used ({{ $link->count }}) times.</h1>
        @endswitch

    </div>
    <div class="container">
        <div class="row">
            <div class="col-2 text-white text-right h4">
                URI:
            </div>
            <div class="col-10 text-white h4">
                <a href="{{ $link->link }}">{{ $link->link }}</a>
            </div>
        </div>
        <hr class="bg-light">
        <div class="row">
            <div class="col-2 text-white text-right h5">
                Short link:
            </div>
            <div class="col-10 text-white h4">
                <a href="{{ env('APP_URL') }}/{{ $link->shortlink }}">{{ env('APP_URL') }}/{{ $link->shortlink }}</a>
            </div>
        </div>
        <!--<div class="col-8 m-auto">

            <label for="uri">URI</label>
                <input type="text" class="form-control" name="uri" value="{{ $link->link }}">
        </div>
        -->
    </div>
@endsection
