@extends('layouts.app2')

@include('client.otherelement')<!--berisikan function calculation di view-->

@section('head')
<?php $page = 'target' ?> 
@endsection

@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Target</li>
            <li class="breadcrumb-item active" aria-current="page">Check</li>
        </ol>
    </nav><br>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-bullseye"></i>  Target</h1>
    </div> 

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4 animated--grow-in">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center">
                    <!--back button--> 
                    <a href="{{route('client.target')}}" style="margin-right: 15px;"class="btn btn-sm btn-primary "><i class="fas fa-chevron-left"></i></a><br>
                    <h6 class="m-0 font-weight-bold text-primary float-left" >Details</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!--Success Message--> 
                    @if ( (session('success')))
                    @if(session('tab') == 'kpi')
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('success') }}
                    </div>
                    @endif
                    @endif

                    <!--Success Message--> 
                    @if ( (session('success')))
                    @if(is_null(session('tab')))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('success') }}
                    </div>
                    @endif
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Level</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control " name="name" value="{{levelName($data->level)}}" required="" autocomplete="name" autofocus="" disabled="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Level Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control " name="name" value="{{$data->level_name}}" required="" autocomplete="name" autofocus="" disabled="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">PIC Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control " name="name" value="{{$data->name}}" required="" autocomplete="name" autofocus="" disabled="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="position" class="col-md-4 col-form-label text-md-right">Position</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" list="pos" value="{{$data->position}}" disabled="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control " name="email" value="{{$data->email}}" required="" autocomplete="email" disabled="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="position" class="col-md-4 col-form-label text-md-right">Periode Target</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" list="pos" value="{{$tahun}}" disabled="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="position" class="col-md-4 col-form-label text-md-right">Number of SO</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" list="pos" value="{{getCountSO($data->id, $tahun)}}" disabled="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="position" class="col-md-4 col-form-label text-md-right">Number of KPI</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" list="pos" value="{{getCountKPI($data->id, $tahun)}}" disabled="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="position" class="col-md-4 col-form-label text-md-right">Status : </label>
                                <div class="col-md-6">
                                    <div style="color: green; font-weight: bold; margin-top: 5px;">
                                        Active
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br>




                </div>
            </div>
        </div>

        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4 animated--grow-in">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center">
                    <!--back button--> 
                    <h6 class="m-0 font-weight-bold text-primary float-left" >Target {{$tahun}}</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right"><b>Range Periode Target : </b></label>
                                <div class="col-md-6">
                                    <input name="rangeperiode" class="form-control"type="text" value="{{$range_period}}" readonly="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead style="background-color: #F8F9FC;">
                                <tr>
                                    <th>No</th>
                                    <!--<th>SO</th>-->
                                    <th>KPI</th>
                                    <!--<th>Timeframe</th>-->
                                    <?php $bln = $startingbln ?>
                                    @for($i = 0; $i<12; $i++)
                                    <th style="text-align: center;">{{$bln}}</th>
                                    @if($bln == 12)
                                    <?php $bln = 1 ?>
                                    @else
                                    <?php $bln++ ?>
                                    @endif
                                    @endfor

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($activetarget as $act)
                                <tr>
                                    <td style="vertical-align: middle; text-align: center;">{{ $loop->iteration }}</td>
                                    <!--<td>{{$act->so}}</td>-->
                                    <td style="vertical-align: middle;">{{$act->kpi}} <b>({{$act->unit}})</b></td>
                                    <!--<td style="vertical-align: middle;">{{$act->timeframe_target}}</td>-->
                                    <?php
                                    $bln = $startingbln;
                                    $th = $tahun;
                                    ?>
                                    @for($i = 0; $i<12; $i++)
                                    <!--{{$data->id}} {{$act->id_target_kpi}}-->
                                    <td style="vertical-align: middle; text-align: center;">{{getTargetbyMonth($data->id, $act->id_target_kpi, $bln, $th)}} </td>
                                    @if($bln == 12)
                                    <?php $bln = 1; $th++; ?>
                                    @else
                                    <?php $bln++ ?>
                                    @endif
                                    @endfor
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable({
            "paging": false,
            "searching": false,
        });
    });

    $(document).ready(function () {
        $('#tableKPI').DataTable({
            "paging": false,
            "searching": false,
        });
    });

    window.setTimeout(function () {
        $(".alert-success").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 1500);
</script>
@endsection
