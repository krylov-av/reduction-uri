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
        <h1 class="mt-5">Update link</h1>
    </div>
    <div class="container">
        <form action="{{ route('links.update',$link->id) }}" method="POST">@csrf @method('PATCH')
            <div class="form-group">
                <label for="uri">URI</label>
                <input type="text" class="form-control" name="uri" value="{{ $link->link }}">
            </div>
            <button type="submit" class="btn btn-primary">Update link</button>
        </form>
    </div>
@endsection
