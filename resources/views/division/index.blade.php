@extends('layouts.main')
@section('title', 'Division')

@section('container')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Area</h1>

    {{-- untuk menampilkan flashsession --}}
    @if (session('status'))
    <div class="alert alert-success">
        {{session("status")}}
    </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{url("/division/create")}}" class="btn btn-primary">Tambah Division</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Division</th>
                            <th>Nama Division</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID Division</th>
                            <th>Nama Division</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$item->id_division}}</td>
                            <td>{{$item->nama_division}}</td>
                            <td>
                                <a href="/division/{{$item->id_division}}" class="btn btn-info btn-sm">Detail</a>
                                <a href="/division/{{$item->id_division}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                <form onsubmit="return confirm('Hapus Division???')"
                                    action="/division/{{$item->id_division}}" class="d-inline" method="post">
                                    @csrf
                                    @method("delete")
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <form id="delete-form" method="POST" class="d-none">
        @method("delete")
        @csrf
    </form>

    <script>
        function processDelete(id_area){
            let formDelete = document.getElementById("delete-form");
            formDelete.innerHTML = "action", "/division/".id_area;
            formDelete.submit();
        }
    </script>

</div>
@endsection

@section('js')
<!-- Page level plugins -->
<script src="{{url("assets/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{url("assets/datatables/dataTables.bootstrap4.min.js")}}"></script>

<!-- Page level custom scripts -->
<script src="{{url("js/demo/datatables-demo.js")}}"></script>
@endsection