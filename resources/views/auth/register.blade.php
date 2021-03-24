@extends('layouts.auth')

@section('title', "Register")

@section('container')

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5 ">
                <div class="card-body p-0 ">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                </div>

                                <form class="user @if($errors->any()) was-validated @endif" method="post"
                                    action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="test"
                                            class="form-control form-control-user @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name') }}" required autocomplete="name"
                                            autofocus placeholder="Nama anda" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <select class="custom-select @error('name') is-invalid @enderror" id="id_role"
                                            name="id_role" required>
                                            <option value="">Role</option>
                                            <option @if (old('id_role')==="0" ) selected @endif value="0">User
                                            </option>
                                            <option @if (old('id_role')==="1" ) selected @endif value="1">Admin
                                            </option>
                                        </select>
                                        @error('id_role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="email"
                                            class="form-control form-control-user @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email') }}" required
                                            autocomplete="email" autofocus placeholder="Enter Email Address...">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="password"
                                            class="form-control form-control-user @error('password') is-invalid @enderror"
                                            required autocomplete="new-password" id="password" name="password"
                                            placeholder="Password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user " required
                                            autocomplete="new-password" id="password_confirmation"
                                            name="password_confirmation" placeholder="Konfirmasi Password">
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Register
                                    </button>
                                    <hr>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="#">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{ route('register') }}">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection