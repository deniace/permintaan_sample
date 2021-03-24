@extends('layouts.main')
@section('title', 'Detail Area')

@section('container')
<div class="container-fluid">
    <!-- Card -->
    <div class="card shadow mb-4">
        <!-- card header -->
        <div class="card-header py-3">
            <div class="float-left font-weight-bold text-primary">Detail Area</div>
        </div>
        <div class="card-body">
            <h5>ID Area : {{$data->id_area}}</h5>
            <h6 class="card-text">Nama Area : {{$data->nama_area}}</h6>
            <p class="card-text">Singkatan Area : {{$data->singkatan_area}}</p>
            <a href="/areas/{{$data->id_area}}/edit" class="btn btn-primary" type="submit">Edit</a>
            <form onsubmit="return confirm('Hapus areas???')" action="/areas/{{$data->id_areas}}" method="POST"
                class="d-inline">
                @method("delete")
                @csrf
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>

        </div>
        <!-- end card body -->
        <!-- card footer -->
        <div class="card-footer text-muted">
            <a href="/areas" class="card-link">Kembali</a>
        </div>
    </div>
    <!-- end card -->
</div>
@endsection