@extends('layouts.main')
@section('title', 'Areas')

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
            <a href="{{url("/areas/create")}}" class="btn btn-primary">Tambah area</a>
            {{-- <a href="/students/create" class="btn btn-primary my-3">Tambah data</a> --}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Area</th>
                            <th>Nama Area</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- {{dd($data)}} --}}
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$item->id_area}}</td>
                            <td>{{$item->nama_area}}</td>
                            <td>
                                <a href="/areas/{{$item->id_area}}" class="btn btn-info btn-sm">Detail</a>
                                <a href="/areas/{{$item->id_area}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                <form onsubmit="return confirm('Hapus area???')" action="/areas/{{$item->id_area}}"
                                    class="d-inline" method="post">
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
            formDelete.innerHTML = "action", "/areas/".id_area;
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