@extends('layouts.main')
@section('title', 'Edit Akun')

@section('container')
<div class="container-fluid">
    <!-- Card -->
    <div class="card shadow mb-4">
        <!-- card header -->
        <div class="card-header py-3">
            <div class="float-left font-weight-bold text-primary">Edit Profile</div>
        </div>
        <div class="card-body">
            {{-- untuk menampilkan flashsession --}}
            @if (session('status'))
            <div class="alert alert-success">
                {{session("status")}}
            </div>
            @endif
            <form method="post" action="/profile/{{$data->id}}">
                @method("put")
                @csrf
                <div class="form-group">
                    <label for="name">Nama*</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                        placeholder="Nama" value="{{$data->name}}" required>
                    @error('name')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="name">Email*</label>
                    <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                        id="email" name="email" value="{{ $data->email }}" autocomplete="email" autofocus
                        placeholder="Enter Email Address...">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Password*</label>
                    <input type="password"
                        class="form-control form-control-user @error('password') is-invalid @enderror"
                        autocomplete="new-password" id="password" name="password" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Ulangi Passwords*</label>
                    <input type="password" class="form-control form-control-user " autocomplete="new-password"
                        id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password">
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