@extends('layouts.app')

@section('title')
Homepage

@endsection

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-body">

            <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary shadow-sm float-right mb-4">
                <i class="fas fa-plus fa-sm text-white-50 "></i> Tambah Data
            </a>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Pasien</th>
                            <th scope="col">Telp. Pasien</th>
                            <th scope="col">Deskripsi Penyakit</th>
                            <th scope="col">Rumah Sakit Tujuan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{$item->pemesanan_nama}}</td>
                            <td>{{$item->pemesanan_telp}}</td>
                            <td>{{$item->pemesanan_deskripsi}}</td>
                            <td>{{$item->rumahsakit->rs_nama}}</td>
                            <td>
                                <a href="{{ route('user.edit', $item->id) }}" class="btn btn-info">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection