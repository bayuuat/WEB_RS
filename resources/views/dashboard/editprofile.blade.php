@extends('layouts.app')

@section('title')
Dashboard

@endsection

@section('content')
<div class="dashboard container my-5">
    <div class="card p-3">
        <div class="row">
            <div class="col-3">
                <div class="card profile">
                    <div class="img-profile">
                        <img src="{{ Storage::url(auth()->user()->user_foto) }}">
                    </div>
                </div>
            </div>
            <div class="col-9">
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
                        <input type="id" placeholder="NIK" class="form-control" name="user_kode"
                            value="{{ $item->user_kode }}" />
                    </div>
                    <div class="form-group">
                        <label for="nama">Image</label>
                        <input type="file" class="form-control-file" name="user_foto" placeholder="Image">
                    </div>
                    <button type="submit" class="btn btn-dark warna-merah btn-block">Simpan</button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection