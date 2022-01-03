@extends('layouts.app')

@section('title')
Dashboard

@endsection

@push('prepend-script')
<script src="{{ url('js/LPdefs.js') }}"></script>
<script src="{{ url('js/LPmethods.js') }}"></script>
<script>
    lp_reportErrorsTo=lp_reportSolutionTo="solutionout";
		var lp_demo_exampleNumber=0;
		var lp_demo_accuracy=6;
		var lp_demo_mode="decimal";
		var lp_demo_verboseLevel=lp_verbosity_none;
		
		function showSolution( str ) {
            var Arr = str.split(';');
            
            var p = Arr[0].split(' ');
            p = p[2];
            var xy = Arr[1].split(',');
            var x = xy[0].split(' ');
            x = x[3];
            var y = xy[1].split(' ');
            y = y[3];
            
            if (x == y){p = p/2}
            else if (x > y){p = y}
            else if (x < y){p = x}

			document.getElementById("solutionout").innerHTML = str;
			document.getElementById("solusikondisi").innerHTML = `p = ${p}`;
			document.getElementById("inputoptimasi").value = p;
		}
</script>
@endpush

@section('content')
<div class="container col-4 mt-3">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="h3 mb-0 text-gray-800">Hitung Optimasi Ruangan</h3>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('logistik.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-auto form-group">
                    <label for="inputZip">Luas ruangan</label>
                    <div class="input-group mb-2">
                        <input type="number" class="form-control" id="lebar">
                        <div class="input-group-prepend">
                            <div class="input-group-text" style="font-weight: 900">&#13217;</div>
                        </div>
                    </div>
                </div>
                <div class="col-auto form-group">
                    <label for="inputZip">Jumlah kasur</label>
                    <div class="input-group mb-2">
                        <input type="number" class="form-control" id="kasur">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Kasur</div>
                        </div>
                    </div>
                </div>
                <div class="col-auto form-group">
                    <label for="inputZip">Jumlah alat</label>
                    <div class="input-group mb-2">
                        <input type="number" class="form-control" id="alat">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Alat</div>
                        </div>
                    </div>
                </div>
                <div class="col-auto mt-4">
                    <input type="button" class="btn btn-primary btn-block" value="Hitung" onClick="hitung();"
                        data-toggle="modal" data-target="#exampleModal">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Optimasi Ruang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="solutionout"
                    style="text-align:center;background-color:white;width:95%;font-family:monospace;border:thin solid;padding:10px">
                    An optimal solution (or message) will appear here.
                </div>
                <br>
                <br>
                <h6>Hasil setelah pengkondisian</h6>
                <div id="solusikondisi"
                    style="text-align:center;background-color:white;width:95%;font-family:monospace;border:thin solid;padding:10px">
                    An optimal solution (or message) will appear here.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form action="{{ route('update-optimasi', auth()->user()->user_asalrs) }}" method="POST">
                    @csrf
                    <input type="text" id="inputoptimasi" name="rs_optimal" style="display: none">
                    <button type="submit" class="btn btn-primary">Simpan Hasil</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    function hitung(){
        var lebar = document.getElementById("lebar").value;
        var kasur = document.getElementById("kasur").value;
        var alat = document.getElementById("alat").value;

        var coba = `Maximize p = x + y subject to \n12x + y <= ${lebar} \nx <= ${kasur} \ny <= ${alat} \nx >= 0 \n y >= 0`

        var Q = new lpProblem( coba );
        lp_verboseLevel=lp_demo_verboseLevel;
        Q.mode=lp_demo_mode;
        Q.sigDigits=lp_demo_accuracy;
        try{Q.solve()}
        finally{showSolution( Q.solutionToString() );}
    }
</script>
@endpush