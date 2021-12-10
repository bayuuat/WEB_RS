@extends('layouts.app')

@section('title')
Homepage

@endsection

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-body">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Data User {{ $item->user_nama }}</h1>
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

            <form action="{{ route('user.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <select class="form-control" name="roles">
                        <option value="{{ $item->roles }}">{{ $item->roles }} - Jangan Diubah</option>
                        <option value="ADMIN">Admin</option>
                        <option value="USER">User</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="Name" placeholder="Nama Lengkap" class="form-control" name="user_nama"
                        value="{{ $item->user_nama }}" />
                </div>
                <label>Tempat Tanggal Lahir</label>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="address" placeholder="Tempat" class="form-control" name="user_tempat"
                            value="{{ $item->user_tempat }}" />
                    </div>
                    <div class="form-group col-md-6">
                        <input type="date" placeholder="Birthdate" class="form-control" name="user_ttl"
                            value="{{ $item->user_ttl }}" />
                    </div>
                </div>
                <div class="form-group">
                    <input type="email" placeholder="Alamat Email" class="form-control" name="user_email"
                        value="{{ $item->user_email }}" />
                </div>
                <div class="form-group">
                    <input type="number" placeholder="Nomor Telepon" class="form-control" name="user_telp"
                        value="{{ $item->user_telp }}" />
                </div>
                <div class="form-group">
                    <select name="user_asalrs" required class="form-control">
                        <option value="{{ $item->rumahsakit->id }}">{{ $item->rumahsakit->rs_nama }} - Jangan Diubah
                        </option>
                        @foreach ($rs as $list)
                        <option value="{{ $list->id }}">{{ $list->rs_nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="id" placeholder="ID" class="form-control" name="user_kode"
                        value="{{ $item->user_kode }}" />
                </div>
                <div class="form-group">
                    <label for="nama">Image</label>
                    <input type="file" class="form-control-file" name="foto" placeholder="Image">
                </div>
                <button type="submit" class="btn btn-dark warna-merah btn-block">Simpan</button>
            </form>

        </div>
    </div>
</div>
@endsection