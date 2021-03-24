@extends('layouts.auth')

@section('title', "Login")

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
                                    <h1 class="h2 text-gray-900 mb-4">Selamat Datang</h1>
                                </div>
                                <hr>

                                <div class="text-center">
                                    <div class="row">
                                        <div class="col">
                                            <h3>silahkan</h3>
                                            <a href="{{ route('login') }}" class="btn btn-success btn-block">Login</a>
                                        </div>
                                        {{-- <div class="col-6">
                                            <h3>Jika ingin mendaftar silahkan</h3>
                                            <a href="{{ route('register') }}"
                                        class="btn btn-info btn-block">Register</a>
                                    </div> --}}
                                </div>
                            </div>

                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>
@endsection