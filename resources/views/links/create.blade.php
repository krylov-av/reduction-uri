@extends('../layout')
@section('title','Create URI short link')
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
        <h1 class="mt-5">Create link</h1>
    </div>
    <div class="container">
    <form action="{{ route('links.store') }}" method="POST">@csrf
        <div class="form-group">
            <label for="uri">URI</label>
            @error('uri')
            <p class="alert-danger p-3 rounded"><b>Error: </b>{{ $message }}</p>
            @enderror
            <input type="text" class="form-control" id="uri" placeholder="http://" name="uri" value="{{ old('uri') }}">
        </div>
        <button type="submit" class="btn btn-primary">Make short address</button>
    </form>
    </div>
@endsection
