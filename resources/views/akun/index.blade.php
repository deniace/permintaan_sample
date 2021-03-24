@extends('layouts.main')
@section('title', 'Akun')

@section('container')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Management Akun</h1>

    {{-- untuk menampilkan flashsession --}}
    @if (session('status'))
    <div class="alert alert-success">
        {{session("status")}}
    </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{url("/akun/create")}}" class="btn btn-primary">Tambah akun</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID akun</th>
                            <th>Nama</th>
                            <th>Role / Jabatan</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID akun</th>
                            <th>Nama</th>
                            <th>Role / Jabatan</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->jabatan->nama_jabatan}}</td>
                            <td>{{$item->email}}</td>
                            <td>
                                <a href="/akun/{{$item->id}}" class="btn btn-info btn-sm">Detail</a>
                                <a href="/akun/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                <form onsubmit="return confirm('Hapus akun???')" action="/akun/{{$item->id}}"
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
        function processDelete(id){
            let formDelete = document.getElementById("delete-form");
            formDelete.innerHTML = "action", "/akun/".id;
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