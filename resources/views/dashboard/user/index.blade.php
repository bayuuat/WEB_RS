@extends('layouts.app')

@section('title')
Homepage

@endsection

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-body">

            @if (auth()->user()->roles == 'ADMIN')
            <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary shadow-sm float-right mb-4">
                <i class="fas fa-plus fa-sm text-white-50 "></i> Tambah Data
            </a>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Asal R.S.</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Roles</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{$item->user_nama}}</td>
                            <td>{{$item->user_email}}</td>
                            <td>{{$item->user_telp}}</td>
                            <td>{{$item->rumahsakit->rs_nama}}</td>
                            <td>{{$item->user_kode}}</td>
                            <td>{{$item->roles}}</td>
                            <td>
                                <a href="{{ route('user.edit', $item->id) }}" class="btn btn-info">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('user.destroy', $item->id) }}" method="POST" class="d-inline">
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
            @else
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Asal R.S.</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{$item->user_kode}}</td>
                            <td>{{$item->user_nama}}</td>
                            <td>{{$item->user_email}}</td>
                            <td>{{$item->user_telp}}</td>
                            <td>{{$item->rumahsakit->rs_nama}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif


        </div>
    </div>
</div>
@endsection