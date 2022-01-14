@extends('layouts.app')

@section('title')
Homepage
@endsection

@push('prepend-style')
<style>
    .loader {
        width: 100vw;
        height: 100vh;
        background-color: #8ac7ec;
        position: fixed;
        display: flex;
        z-index: 100;
        align-items: center;
        justify-content: center;
    }

    .load {
        width: 50px;
        height: 50px;
        border: 5px solid;
        color: whitesmoke;
        border-radius: 50%;
        border-top-color: transparent;
        animation: loading 1.2s linear infinite;
    }

    @keyframes loading {
        25% {
            color: whitesmoke;
        }

        50% {
            color: whitesmoke;
        }

        75% {
            color: whitesmoke;
        }

        to {
            transform: rotate(360deg);
        }
    }
</style>
@endpush

@section('loader')
<div class="loader">
    <div class="load"></div>
</div>
@endsection

@section('content')
<div class="container my-5">
    <table class="table" id="crudTable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Rumah Sakit</th>
                <th scope="col">Jumlah Tersedia</th>
                <th scope="col">Kondisi</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $key => $item)
            <tr>
                <th scope="row">{{$key++}}</th>
                <td>{{$item->rs_nama}}</td>
                <td id="alat{{$item->id}}">0</td>
                <td id="kondisi{{$item->id}}">Penuh</td>
                <td>
                    <a href="{{ route('pemesanan', $item->id) }}" id="aksi{{$item->id}}"
                        class="btn btn-secondary disabled">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('addon-script')
<script>
    setTimeout(function () {
        $('.loader').fadeToggle();
    }, 2000)

    $(document).ready(getData);
    function getData(){
        let data;
        $.ajax({
            url: '{{url("api/logistik")}}',
            dataType: 'json',
            success: function (response) {
                data = response.data;
                // console.log(data);
                
                for (let i = 1; i < data.length; i++) {
                    if(data[i].id){
                        $("#alat"+data[i].id).html(data[i].tersedia);
                        if(data[i].tersedia != 0){
                            $("#kondisi"+data[i].id).html('Tersedia');
                            $("#aksi"+data[i].id).removeClass("btn-secondary");
                            $("#aksi"+data[i].id).removeClass("disabled");
                            $("#aksi"+data[i].id).addClass("btn-info");
                        } else if(data[i].tersedia == 0) {
                            $("#kondisi"+data[i].id).html('Penuh');
                            $("#aksi"+data[i].id).removeClass("btn-info");
                            $("#aksi"+data[i].id).addClass("btn-secondary");
                            $("#aksi"+data[i].id).addClass("disabled");
                        }
                    } 
                }
            },
            error: function(){
                alert("failure From php side!!! ");
            }
        });
    }
    
    setInterval(getData, 1000);
</script>
@endpush

@if (session()->has('success'))
@push('addon-script')
<script>
    swal({
        title: "Berhasil Mendaftar",
        text: "{!! session('success') !!}",
        icon: "success",
    });
</script>
@endpush
@endif