@extends('layouts.app')

@section('title')
Homepage

@endsection

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-body">
            @if (auth()->user()->roles == 'ADMIN')
            <a href="{{ route('logistik.create') }}" class="btn btn-sm btn-primary shadow-sm float-right mb-4">
                <i class="fas fa-plus fa-sm text-white-50 "></i> Tambah Data
            </a>
            @else
            <button type="button" class="btn btn-sm btn-primary shadow-sm float-right mb-4" data-toggle="modal"
                data-target="#exampleModal">
                <i class="fas fa-plus fa-sm text-white-50 "></i> Tambah Data
            </button>
            @endif


            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID Alat</th>
                            <th scope="col">Milik Rumah Sakit</th>
                            <th scope="col">Kondisi</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $key => $item)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$item->id}}</td>
                            <td>{{$item->rumahsakit->rs_nama}}</td>
                            <td>{{$item->alat_kondisi}}</td>
                            <td>
                                <a href="{{ route('logistik.edit', $item->id) }}" class="btn btn-info">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('logistik.destroy', $item->id) }}" method="POST"
                                    class="d-inline">
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

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Alat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img class="mb-4 mx-auto d-block" src="{{url('Images/danger-icon.svg')}}" style="width: 100px">
                <h5 class="text-center">
                    Apakah anda ingin menambah alat untuk
                </h5>
                <h5 class="text-center">{{$item->rumahsakit->rs_nama}}?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <form action="{{ route('logistik.store') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection