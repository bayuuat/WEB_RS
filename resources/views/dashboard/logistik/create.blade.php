@extends('layouts.app')

@section('title')
logistik

@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container mt-3">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="h3 mb-0 text-gray-800">Tambah Data logistik</h3>
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
            <form action="{{ route('logistik.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <select name="rs_id" required class="form-control">
                        <option value="">Pilih Asal RS</option>
                        @foreach ($item as $list)
                        <option value="{{ $list->id }}">{{ $list->rs_nama }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->
@endsection