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
                <h1 class="h3 mb-0 text-gray-800">Edit Data logistik</h1>
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

            <form action="{{ route('logistik.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <select name="rs_id" required class="form-control">
                        <option value="{{ $item->rumahsakit->id }}">{{ $item->rumahsakit->rs_nama }} - Jangan Diubah
                        </option>
                        @foreach ($rs as $list)
                        <option value="{{ $list->id }}">{{ $list->rs_nama }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-dark warna-merah btn-block">Simpan</button>
            </form>

        </div>
    </div>
</div>
@endsection