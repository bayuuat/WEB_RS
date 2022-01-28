@extends('layouts.app')

@section('title')
Homepage

@endsection

@section('content')
<div class="container mt-4">
    <div>
        <h3>Aktivitas</h3>
    </div>
    <div class="card shadow">
        <div class="card-body">
            <div class="bluetext border-bottom mb-2">
                <h5> Riwayat</h5>
            </div>
            @foreach ($users as $user)
            @if ($user->activity == 1)
            <div class="row mb-3">
                <div class="col-2">
                    <div class="container roundedpill d-flex justify-content-center bg-primary">
                        <div class="d-flex justify-content-center align-items-center">
                            <i class="fas fa-check whitefont"></i>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="bluetext">
                        {{ $user->time }}
                    </div>
                    <div class="row col-8 border-bottom">
                        {{ $user->user->user_nama }} telah masuk sistem informasi rumah sakit
                    </div>
                </div>
            </div>

            @else
            <div class="row mb-3">
                <div class="col-2">
                    <div class="container roundedpill d-flex justify-content-center bg-secondary">
                        <div class="d-flex justify-content-center align-items-center">
                            <i class="fas fa-door-open whitefont"></i>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="text-secondary">
                        {{ $user->time }}
                    </div>
                    <div class="row col-8 border-bottom">
                        {{ $user->user->user_nama }} telah keluar sistem informasi rumah sakit
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>

</div>

@endsection