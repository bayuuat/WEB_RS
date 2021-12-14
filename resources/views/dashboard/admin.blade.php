@extends('layouts.app')

@section('title')
Dashboard

@endsection

@section('content')
<div class="dashboard container my-5">
    <div class="card p-3">
        <div class="row">
            <div class="col-3">
                <div class="card profile">
                    <a href="{{ route('edit-profile', auth()->user()->id) }}" class="img-profile">
                        <div class="overlay">
                            <div class="text">Edit Profile</div>
                        </div>
                        <img src="{{ Storage::url(auth()->user()->user_foto) }}">
                    </a>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-center">{{auth()->user()->user_nama}}</li>
                            <li class="list-group-item text-center">{{auth()->user()->roles}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            @if (auth()->user()->roles == 'ADMIN')
            <div class="col-9">
                <div class="row">
                    <div class="item col-6 mb-3">
                        <a href="{{ route('user.index') }}">
                            <div class="card">
                                <div class="card-body">
                                    Daftar User
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="item col-6">
                        <a href="{{ route('rs.index') }}">
                            <div class="card">
                                <div class="card-body">
                                    Data Rumah Sakit
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="item col-6">
                        <a href="{{ route('logistik.index') }}">
                            <div class="card">
                                <div class="card-body">
                                    Logistik
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="item col-6">
                        <a href="{{ route('pesan.index') }}">
                            <div class="card">
                                <div class="card-body">
                                    Penerimaan pasien
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @else
            <div class="col-9">
                <div class="row">
                    <div class="item col-6 mb-3">
                        <a href="{{ route('user.index') }}">
                            <div class="card">
                                <div class="card-body">
                                    Daftar User
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="item col-6">
                        <a href="{{ route('logistik.index') }}">
                            <div class="card">
                                <div class="card-body">
                                    Logistik Rumah Sakit
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="item col-6">
                        <a href="{{ route('pesan.index') }}">
                            <div class="card">
                                <div class="card-body">
                                    Penerimaan pasien
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>
</div>
@endsection