@extends('layouts.auth')

@section('title')
    Halaman Login

@endsection

@section('content')
    <div class="container">
        <div class="text-center login-title">
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
                        <h2 class="text-center">Masuk</h2>
                        <form action="" class="mt-3">
                            <div class="form-group">
                                <input type="Username" placeholder="ID" class="form-control" />
                            </div>
                            <div class="form-group">
                                <input type="Password" placeholder="Password" class="form-control" />
                            </div>
                            <a href="dashboard.html" class="btn btn_warna btn-block mt-4">
                                Masuk
                            </a>
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
