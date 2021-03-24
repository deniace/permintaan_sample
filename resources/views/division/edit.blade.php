@extends('layouts.main')
@section('title', 'Edit Division')

@section('container')
<div class="container-fluid">
    <!-- Card -->
    <div class="card shadow mb-4">
        <!-- card header -->
        <div class="card-header py-3">
            <div class="float-left font-weight-bold text-primary">Edit Division</div>
        </div>
        <div class="card-body">

            <form method="post" action="/division/{{$data->id_division}}">
                @method("put")
                @csrf
                <div class="form-group">
                    <label for="nama_division">Nama Area*</label>
                    <input type="text" class="form-control @error('nama_division') is-invalid @enderror"
                        name="nama_division" id="nama_division" placeholder="Nama Division"
                        value="{{$data->nama_division}}" required>
                    @error('nama_division')<div class="invalid-feedback">{{$message}}</div>@enderror
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