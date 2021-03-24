@extends('layouts.main')
@section('title', 'Tambah Division')

@section('container')
<div class="container-fluid">
    <!-- Card -->
    <div class="card shadow mb-4">
        <!-- card header -->
        <div class="card-header py-3">
            <div class="float-left font-weight-bold text-primary">Tambah Division</div>
        </div>
        <div class="card-body">

            <form method="post" action="{{"/division"}}">
                @csrf
                <div class="form-group">
                    <label for="nama_division">Nama Division*</label>
                    <input type="text" class="form-control @error('nama_division') is-invalid @enderror"
                        name="nama_division" id="nama_division" placeholder="Nama Area" value="{{old("nama_division")}}"
                        required>
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