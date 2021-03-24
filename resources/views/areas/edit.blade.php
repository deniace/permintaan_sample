@extends('layouts.main')
@section('title', 'Edit Area')

@section('container')
<div class="container-fluid">
    <!-- Card -->
    <div class="card shadow mb-4">
        <!-- card header -->
        <div class="card-header py-3">
            <div class="float-left font-weight-bold text-primary">Edit Area</div>
        </div>
        <div class="card-body">

            <form method="post" action="/areas/{{$data->id_area}}">
                @method("put")
                @csrf
                <div class="form-group">
                    <label for="nama_area">Nama Area*</label>
                    <input type="text" class="form-control @error('nama_area') is-invalid @enderror" name="nama_area"
                        id="nama_area" placeholder="Nama Product" value="{{$data->nama_area}}" required>
                    @error('nama_area')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="singkatan_area">Singkatan Area*</label>
                    <input type="text" class="form-control @error('singkatan_area') is-invalid @enderror"
                        name="singkatan_area" id="singkatan_area" placeholder="Singkatan Area"
                        value="{{$data->singkatan_area}}" required>
                    @error('singkatan_area')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
        <!-- end card body -->
        <!-- card footer -->
        <div class="card-footer text-muted">
            <small>* harus di isi</small>
        </div>
    </div>
    <!-- end card -->
</div>
@endsection