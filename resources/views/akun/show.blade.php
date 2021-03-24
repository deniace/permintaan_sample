@extends('layouts.main')
@section('title', 'Detail Akun')

@section('container')
<div class="container-fluid">
    <!-- Card -->
    <div class="card shadow mb-4">
        <!-- card header -->
        <div class="card-header py-3">
            <div class="float-left font-weight-bold text-primary">Detail Akun</div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th scope="row">ID Akun</th>
                        <td>{{$data->id}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nama</th>
                        <td>{{$data->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Jabatan</th>
                        <td>{{$data->jabatan->nama_jabatan}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Email</th>
                        <td>{{$data->email}}</td>
                    </tr>
                </tbody>
            </table>
            <a href="/akun/{{$data->id}}/edit" class="btn btn-primary" type="submit">Edit</a>
            <form onsubmit="return confirm('Hapus akun???')" action="/akun/{{$data->id}}" method="POST"
                class="d-inline">
                @method("delete")
                @csrf
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>

        </div>
        <!-- end card body -->
        <!-- card footer -->
        <div class="card-footer text-muted">
            <a href="/akun" class="card-link">Kembali</a>
        </div>
    </div>
    <!-- end card -->
</div>
@endsection