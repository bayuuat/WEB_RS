@extends('layouts.app')

@section('title')
Homepage

@endsection

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-body">
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
                        @foreach ($items as $key => $item)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$item->pemesanan_nama}}</td>
                            <td>{{$item->pemesanan_telp}}</td>
                            <td>{{$item->pemesanan_deskripsi}}</td>
                            <td>{{$item->rumahsakit->rs_nama}}</td>
                            <td>
                                <a href="{{ route('pesan.edit', $item->id) }}" class="btn btn-info">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('pesan.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        <i class="fas fa-trash "></i>
                                    </button>
                                </form>
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