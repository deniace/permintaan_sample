@extends('layouts.main')
@section('title', 'Import File')

@section('container')
<div class="container-fluid">
    <!-- Card -->
    <div class="card shadow mb-4">
        <!-- card header -->
        <div class="card-header py-3">
            <div class="float-left font-weight-bold text-primary">Import File</div>
            <form onsubmit="return confirm('Hapus Semua Data???')" action="/import" class="d-inline" method="post">
                @csrf
                @method("delete")
                <button type="submit" class="btn btn-danger btn-sm float-right">Hapus</button>
            </form>
        </div>
        <div class="card-body">
            {{-- untuk menampilkan flashsession --}}
            @if (session('status'))
            <div class="alert alert-success">
                {{session("status")}}
            </div>
            @endif
            <form method="post" action="{{"/import"}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="file_excel">file_excel excel</label>
                    <input type="file" class="form-control-file @error('file_excel') is-invalid @enderror"
                        id="file_excel" name="file_excel">
                    @error('file_excel')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
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