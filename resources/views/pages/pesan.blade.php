@extends('layouts.app')

@section('title')
Homepage

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

<div class="container">
    <form method="POST" action="{{ route('pesan.store', $item->id) }}">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Nama Lengkap</label>
            <input type="text" class="form-control" placeholder="" name="pemesanan_nama">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Nomor Handphone</label>
            <input type="text" class="form-control" placeholder="" name="pemesanan_telp">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Deskripsi</label>
            <textarea class="form-control" rows="3" name="pemesanan_deskripsi"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection