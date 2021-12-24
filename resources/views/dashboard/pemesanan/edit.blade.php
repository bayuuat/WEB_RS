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
                <h1 class="h3 mb-0 text-gray-800">Edit Data Pemesan {{ $item->pemesanan_nama }}</h1>
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

            <form action="{{ route('pesan.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Rumah Sakit Tujuan</label>
                    <input type="text" class="form-control" value="{{$item->rumahsakit->rs_nama}}" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nama Lengkap</label>
                    <input type="text" class="form-control" placeholder="" name="pemesanan_nama"
                        value="{{ $item->pemesanan_nama }}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nomor Handphone</label>
                    <input type="text" class="form-control" placeholder="" name="pemesanan_telp"
                        value="{{ $item->pemesanan_telp }}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Deskripsi</label>
                    <textarea class="form-control" rows="3"
                        name="pemesanan_deskripsi">{{ $item->pemesanan_deskripsi }}</textarea>
                </div>
                <button type="submit" class="btn btn-dark warna-merah btn-block">Simpan</button>
            </form>

        </div>
    </div>
</div>
@endsection