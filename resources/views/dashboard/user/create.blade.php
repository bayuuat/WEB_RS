@extends('layouts.app')

@section('title')
User

@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container mt-3">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="h3 mb-0 text-gray-800">Tambah Data User</h3>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <select class="form-control" name="roles">
                        <option>Pilih Roles</option>
                        <option value="ADMIN">Admin</option>
                        <option value="USER">User</option>
                    </select>
                </div>
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
                <div class="form-group">
                    <label for="nama">Image</label>
                    <input type="file" class="form-control-file" name="user_foto" placeholder="Image">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->
@endsection