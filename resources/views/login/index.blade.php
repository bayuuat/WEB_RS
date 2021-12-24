@extends('layouts.auth')

@section('title')
Halaman Login

@endsection

@section('content')
<div class="text-center login-title">
    <div class="container">
        <h3 class="mb-0 title mt-2"><u>Sistem Informasi Ketersediaan Ruang IGD</u></h3>
        <h4 class="mt-3">
            HALAMAN LOGIN
        </h4>
    </div>
</div>
<div>
    <div class="section-store-auth ">
        <div class="container">
            <div class="row row-login d-flex justify-content-center align-items-center">
                <div class="col-lg-4 col-md-6 box-login mt-5">

                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dimissible fade show" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dimissible fade show" role="alert">
                        {{ session('loginError') }}
                    </div>
                    @endif

                    <h2 class="text-center">Masuk</h2>
                    <form action="/login" method="POST" class="mt-3">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="user_email" placeholder="ID" class="form-control" />
                        </div>
                        <div class="form-group">
                            <input type="Password" placeholder="Password" name="password" class="form-control" />
                        </div>
                        <button type="submit" class="btn btn_warna btn-block mt-4">
                            Masuk
                        </button>
                    </form>
                    <p class="text-center">
                        Tidak memiliki akun? Registrasi<a href="/register"> disini!</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-style')
<style>
    body {
        background-image: url("Images/bed.jpg");
        background-size: cover;
    }
</style>


@endpush