@extends('layouts.app2')

@include('client.otherelement')<!--berisikan function di view-->

@section('head')
<?php $page = 'target' ?>
@endsection

@section('content')

<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Target</li>
            <li class="breadcrumb-item active" aria-current="page">Details</li>
            <li class="breadcrumb-item active" aria-current="page">Activate</li>
        </ol>
    </nav><br>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4 animated--grow-in">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center">
                    <!--back button--> 
                    <a href="{{route('client.target.details', ['idpersonnel'=>$data->id, 'tahun'=>$tahun])}}" style="margin-right: 15px;"class="btn btn-sm btn-primary "><i class="fas fa-chevron-left"></i></a><br>
                    <h6 class="m-0 font-weight-bold text-primary float-left" >Activate</h6>
                </div>


                <!-- Card Body -->
                <div class="card-body">
                    <form method="post" action="{{route('client.target.activate')}}">
                        @csrf
                        <!-- Message--> 
                        <div class="alert alert-primary" style="height: 10%;" role="alert">
                            <div class="row">
                                <div class="col-md-12">
                                    Harap lengkapi data berikut sebelum melanjutkan :
                                    <ul style="margin-right: 15px;">
                                        <li>(Starting Period) Input periode awal tahun KPI berjalan</li>
                                        <li>(Weight) Input bobot KPI dengan total akhir 100%</li>
                                    </ul>
                                </div>
                            </div>
                        </div><br>

                        <!--Success Message--> 
                        @if ( (session('error')))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ session('error') }}
                        </div>
                        @endif

                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right"><b>Starting Target Period : </b></label>
                                    <div class="col-md-6">
                                        <select name="startTarget" id="startTarget" class="form-control">
                                            <option value="1" selected="">January {{$tahun}}</option>
                                            <option value="2">February {{$tahun}}</option>
                                            <option value="3">March {{$tahun}}</option>
                                            <option value="4">April {{$tahun}}</option>
                                            <option value="5">May {{$tahun}}</option>
                                            <option value="6">June {{$tahun}}</option>
                                            <option value="7">July {{$tahun}}</option>
                                            <option value="8">August {{$tahun}}</option>
                                            <option value="9">September {{$tahun}}</option>
                                            <option value="10">October {{$tahun}}</option>
                                            <option value="11">November {{$tahun}}</option>
                                            <option value="12">December {{$tahun}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right"><b>Target Period : </b></label>
                                    <div class="col-md-6">
                                        <input name="periodeTarget" id="periodeTarget"type="text" class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>


                        <div class="table-responsive">
                            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                <thead style="background-color: #F8F9FC;">
                                    <tr>
                                        <th>No </th>
                                        <th>Strategic Objective</th>
                                        <th>KPI</th>
                                        <th>Timeframe</th>
                                        <th>Target</th>
                                        <th style="width: 20%">Weight</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datakpi as $kpi)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{$kpi->so}}
                                            @if($kpi->id_so_library == null)
                                            <span class="badge badge-secondary float-right"><i class="fa fa-user"></i> </span>
                                            @endif
                                        </td>
                                        <td>
                                            {{$kpi->kpi}}
                                            @if($kpi->id_kpi_library == null)
                                            <span class="badge badge-secondary float-right"><i class="fa fa-user"></i> </span>
                                            @endif
                                        </td>
                                        <td>{{$kpi->timeframe_target}}</td>
                                        <td>
                                            @if($kpi->unit == 'Rp' || $kpi->unit == 'rp' || $kpi->unit == 'RP')
                                            Rp {{ $kpi->target}},-
                                            @else 
                                            {{ $kpi->target}} {{$kpi->unit}}
                                            @endif
                                        </td>
                                        <td>
                                            <div class="input-group mb-3">
                                                <input type="hidden" name="user_id" value="{{$data->id}}">
                                                <input type="hidden" name="tahun" value="{{$tahun}}">
                                                <input type="hidden" name="idtargetkpi[]" value="{{$kpi->id}}">
                                                <input name="weight[]" onchange="findTotal()" type="number"  id="qty{{$loop->iteration}}" class="form-control" min="0" max="100" placeholder=" 1 - 100 %" required=""><br>
                                                <!--<input name="weight" id="weight" onchange="totalWeight()" type="number" class="form-control" min="0" max="100" placeholder=" 1 - 100 %" required="">-->
                                                <div class="input-group-append">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5" style="text-align: center;"><b>Total Weight</b></td>
                                        <td>
                                            <input type="hidden" name="totalHidden" id="totalHidden">
                                            <input type="text" name="totalWeight" id="total" disabled=""> 
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-10">
                                <!--....-->
                            </div>
                            <div class="col-md-2">
                                <div class="float-right">
                                    <a href="{{route('client.target.details', ['idpersonnel'=>$data->id, 'tahun'=>$tahun])}}" class="btn btn-sm btn-secondary ">Cancel</a>
                                    <input type="submit" class=" btn btn-primary btn-sm" value="Activate">
                                </div>
                            </div>
                        </div>

                    </form>

<!--                        Qty1 : <input onchange="findTotal()" type="number" name="qty" id="qty1"/><br>
                        Qty2 : <input onchange="findTotal()" type="number" name="qty" id="qty2"/><br>
                        Qty3 : <input onchange="findTotal()" type="number" name="qty" id="qty3"/><br>
                        Qty4 : <input onchange="findTotal()" type="number" name="qty" id="qty4"/><br>
                        Qty5 : <input onchange="findTotal()" type="number" name="qty" id="qty5"/><br>
                        Qty6 : <input onchange="findTotal()" type="number" name="qty" id="qty6"/><br>
                        Qty7 : <input onchange="findTotal()" type="number" name="qty" id="qty7"/><br>
                        Qty8 : <input onchange="findTotal()" type="number" name="qty" id="qty8"/><br>
                        <br><br>-->
                    <!--Total : <input type="text" name="total" id="total"/>-->


                </div>
            </div>
        </div>

    </div>

</div>
@endsection

@section('script')
<script>

    function myFunction() {
//        var bln = document.getElementsById('startTarget').value;
        document.getElementById("periodeTarget").value = "yes";
    }

    function findTotal() {
        var arr = document.getElementsByName('weight[]');
        var tot = 0;
        for (var i = 0; i < arr.length; i++) {
            if (parseInt(arr[i].value))
                tot += parseInt(arr[i].value);
        }
        document.getElementById('total').value = tot + " %";
        document.getElementById('totalHidden').value = tot;
    }

    window.setTimeout(function () {
        $(".alert-danger").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 3000);
</script>
@endsection
