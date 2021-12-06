@extends('layouts.app')

@section('title')
Homepage

@endsection

@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Rumah Sakit</th>
                <th scope="col">Kondisi</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <th scope="row">1</th>
                <td>{{$item->rs_nama}}</td>
                @if (($item->rs_kondisi) != 0)
                <td>Penuh</td>
                @else
                <td>Tersedia</td>
                @endif
                <td>
                    @if (($item->rs_kondisi) != 0)
                    <a class="btn btn-secondary disabled">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    @else
                    <a href="{{ route('pemesanan', $item->id) }}" class="btn btn-info">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection