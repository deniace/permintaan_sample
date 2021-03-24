@extends('layouts.main')
@section('title', 'Detail Division')

@section('container')
<div class="container-fluid">
    <!-- Card -->
    <div class="card shadow mb-4">
        <!-- card header -->
        <div class="card-header py-3">
            <div class="float-left font-weight-bold text-primary">Detail Division</div>
        </div>
        <div class="card-body">
            <h5>ID Division : {{$data->id_division}}</h5>
            <h6 class="card-text">Nama Division : {{$data->nama_division}}</h6>
            <a href="/division/{{$data->id_division}}/edit" class="btn btn-primary" type="submit">Edit</a>
            <form onsubmit="return confirm('Hapus division???')" action="/division/{{$data->id_division}}" method="POST"
                class="d-inline">
                @method("delete")
                @csrf
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>

        </div>
        <!-- end card body -->
        <!-- card footer -->
        <div class="card-footer text-muted">
            <a href="/division" class="card-link">Kembali</a>
        </div>
    </div>
    <!-- end card -->
</div>
@endsection