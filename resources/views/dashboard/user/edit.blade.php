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
                <h1 class="h3 mb-0 text-gray-800">Edit Data Aslab {{ $item->nama }}</h1>
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
                    <form action="{{ route('aslab.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap"
                                value="{{ $item->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nick</label>
                            <input type="text" class="form-control" name="nick" placeholder="Nickname"
                                value="{{ $item->nick }}">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="nama">Angkatan</label>
                                <input type="text" class="form-control" name="angkatan" placeholder="Angkatan"
                                    value="{{ $item->angkatan }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nama">NRP</label>
                                <input type="text" class="form-control" name="nrp" placeholder="NRP"
                                    value="{{ $item->nrp }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama">Divisi</label>
                            <input type="text" class="form-control" name="divisi" placeholder="Divisi"
                                value="{{ $item->divisi }}">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nama">Github</label>
                                <input type="text" class="form-control" name="github" placeholder="Link Github"
                                    value="{{ $item->github }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama">Linkedin</label>
                                <input type="text" class="form-control" name="linkedin" placeholder="Link Linkedin"
                                    value="{{ $item->linkedin }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nama">Twitter</label>
                                <input type="text" class="form-control" name="twt" placeholder="Link Twitter"
                                    value="{{ $item->twt }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama">Instagram</label>
                                <input type="text" class="form-control" name="insta" placeholder="Link Instagram"
                                    value="{{ $item->insta }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama">Description</label>
                            <input type="text" class="form-control" name="description" placeholder="Description"
                                value="{{ $item->description }}">
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
    </div>
</div>
@endsection

@extends('layout.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Aslab {{ $item->nama }}</h1>
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
            <form action="{{ route('aslab.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap"
                        value="{{ $item->nama }}">
                </div>
                <div class="form-group">
                    <label for="nama">Nick</label>
                    <input type="text" class="form-control" name="nick" placeholder="Nickname"
                        value="{{ $item->nick }}">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="nama">Angkatan</label>
                        <input type="text" class="form-control" name="angkatan" placeholder="Angkatan"
                            value="{{ $item->angkatan }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nama">NRP</label>
                        <input type="text" class="form-control" name="nrp" placeholder="NRP" value="{{ $item->nrp }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="nama">Divisi</label>
                    <input type="text" class="form-control" name="divisi" placeholder="Divisi"
                        value="{{ $item->divisi }}">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nama">Github</label>
                        <input type="text" class="form-control" name="github" placeholder="Link Github"
                            value="{{ $item->github }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nama">Linkedin</label>
                        <input type="text" class="form-control" name="linkedin" placeholder="Link Linkedin"
                            value="{{ $item->linkedin }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nama">Twitter</label>
                        <input type="text" class="form-control" name="twt" placeholder="Link Twitter"
                            value="{{ $item->twt }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nama">Instagram</label>
                        <input type="text" class="form-control" name="insta" placeholder="Link Instagram"
                            value="{{ $item->insta }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="nama">Description</label>
                    <input type="text" class="form-control" name="description" placeholder="Description"
                        value="{{ $item->description }}">
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
<!-- /.container-fluid -->
@endsection