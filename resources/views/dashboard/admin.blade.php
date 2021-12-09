@extends('layouts.app')

@section('title')
Dashboard

@endsection

@section('content')
<div class="dashboard container my-5">
    <div class="card p-3">
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <img src="https://images.pexels.com/photos/10033128/pexels-photo-10033128.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">An item</li>
                            <li class="list-group-item">A second item</li>
                        </ul>
                    </div>
                </div>
            </div>
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
        </div>
    </div>
</div>
@endsection