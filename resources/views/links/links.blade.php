@extends('../layout')
@section('title','Manage links')
@push('styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body{
            background-color: #343a40;
        }
        h1{
            color: white;
        }
        th{
            color:orange;
            text-align: center;
        }
        .control-btn
        {
           padding: 0px 10px;
        }
        a.table-link{
            color:white;
            text-decoration: none;
        }
        a.table-link:hover,a.table-link:visited:hover{
            color: #999999;
        }
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
        function delete_row(row){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200 && this.responseText=="Deleted") {
                    //Deleted succesfuly
                    var elem = document.querySelector("#row_"+row);
                    elem.remove();
                    //delete alert rectangle, if it exists
                    var alerts = document.querySelectorAll(".alert");
                    alerts.forEach(function(alert){
                        alert.remove();
                    });
                }
            };
            xhttp.open("DELETE", "/links/"+row, true);
            xhttp.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}");
            xhttp.send();
        }
        function deleteLink(link){
            event.preventDefault();
            console.log(link);
            var form=document.querySelector("#deleteLink");
            form.action=link;
            form.submit();
        }
    </script>
@endpush
@section('content')
    <div class="container">
        @include('../navbar')

        <div class="row">
            <div class="col-10 m-auto">
                @if (Session::has('Success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('Success') }}
                    </div>
                @endif
                <table class="table table-bordered table-dark">
                    <thead>
                    <tr>
                        <th scope="col">URI</th>
                        <th scope="col">Short&#8209;link</th>
                        <th scope="col">Count</th>
                        <th scope="col" style="width: 225px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($links as $link)
                        <tr id="row_{{ $link->id }}">
                            <td><a class="table-link" href="{{ $link->link }}">{{ $link->link }}</a></td>
                            <td><a class="table-link" href="{{ env('APP_URL') }}/{{ $link->shortlink }}">{{ $link->shortlink }}</a></td>
                            <td>{{ $link->count }}</td>
                            <td class="text-center">
                                <a class="btn btn-outline-light mr-2 control-btn" href="{{ route('links.show',$link->id) }}">View</a>
                                <a class="btn btn-outline-success mr-2 control-btn" href="{{ route('links.edit',$link->id) }}">Edit</a>
                                <!-- AJAX variant
                                <button class="btn btn-outline-danger mr-2 control-btn" onclick="delete_row({{ $link->id }})">Delete</button>
                                -->
                                <a class="btn btn-outline-danger mr-2 control-btn" href="{{ route('links.destroy',$link->id) }}" onclick="deleteLink('{{ route('links.destroy',$link->id) }}')">Delete</a>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">No data</td>
                    </tr>
                    @endforelse
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-6">
                        @if ($links->currentPage()!==1 and count($links->items())>0)
                        <a href="{{ $links->previousPageUrl() }}" class="btn btn-outline-primary">Prev</a>
                        @endif
                    </div>
                    <div class="col-6 text-right">
                        @if ($links->currentPage()<$links->lastPage())
                        <a href="{{ $links->nextPageUrl() }}" class="btn btn-outline-primary">Next</a>
                        @endif
                    </div>
                </div>
                <form id="deleteLink" method="POST" style="display:none;">
                    <input type="hidden" name="_method" value="delete">
                    @csrf
                </form>
            </div>
        </div><!--//.row-->
    </div>
@endsection
