@extends('layouts.app')

@section('title')
User

@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container mt-3">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="h3 mb-0 text-gray-800">Tambah Data Rumah Sakit</h3>
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
            <form action="{{ route('rs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" placeholder="Nama Rumah Sakit" class="form-control" name="rs_nama"
                        value="{{ old('rs_nama') }}" />
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Lokasi Rumah Sakit" class="form-control" name="rs_lokasi"
                        value="{{ old('rs_lokasi') }}" />
                </div>
                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->
@endsection