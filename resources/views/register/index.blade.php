@extends('layouts.auth')

@section('title')
Halaman Register

@endsection

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div>
    <div class="text-center login-title">
        <div class="container">
            <h3 class="mb-0 title mt-2"><u>Sistem Informasi Ketersediaan Ruang IGD</u></h3>
            <h4 class="mt-3">
                HALAMAN REGISTRASI
            </h4>
        </div>
    </div>
    <div class="section-store-auth ">
        <div class="container">
            <div class="row row-login d-flex justify-content-center align-items-center">
                <div class="col-lg-4 col-md-6 box-login mt-5">
                    <h2 class="text-center">Registrasi</h2>
                    <form action="{{ route('registered') }}" method="post" class="mt-3">
                        @csrf
                        <div class="form-group">
                            <input type="Name" placeholder="Nama Lengkap" class="form-control" name="user_nama"
                                value="{{ old('user_nama') }}" />
                        </div>
                        <label>Tempat Tanggal Lahir</label>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="address" placeholder="Tempat" class="form-control" name="user_tempat"
                                    value="{{ old('user_tempat') }}" />
                            </div>
                            <div class="form-group col-md-6">
                                <input type="date" placeholder="Birthdate" class="form-control" name="user_ttl"
                                    value="{{ old('user_ttl') }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" placeholder="Alamat Email" class="form-control" name="user_email"
                                value="{{ old('user_email') }}" />
                        </div>
                        <div class="form-group">
                            <input type="number" placeholder="Nomor Telepon" class="form-control" name="user_telp"
                                value="{{ old('user_telp') }}" />
                        </div>
                        <div class="form-group">
                            <select name="user_asalrs" required class="form-control">
                                <option value="">Pilih Asal RS</option>
                                @foreach ($item as $list)
                                <option value="{{ $list->id }}">{{ $list->rs_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="number" placeholder="Kode" class="form-control" name="user_kode"
                                value="{{ old('user_kode') }}" />
                        </div>
                        <div class="form-group">
                            <input type="Password" placeholder="Password" class="form-control" name="password" />
                        </div>
                        <div class="form-group">
                            <input type="Password" placeholder="Confirm Password" class="form-control"
                                name="password_confirmation" />
                        </div>
                        <button type="submit" class="btn btn_warna btn-block mt-4">
                            Register
                        </button>
                    </form>
                    <p class="text-center">
                        sudah memiliki akun? Masuk<a href="/login"> Disini!</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@push('addon-style')
<style>
    body {
        background-image: url("Images/bed.jpg");
        background-size: cover;
    }
</style>


@endpush