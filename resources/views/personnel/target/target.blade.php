@extends('layouts.app3')

@section('head')
<?php $page = 'target' ?>
@endsection

@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
    </nav>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-bullseye"></i> Target</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">

            <div class="card shadow mb-4 animated--grow-in">
                <!--Card Header - Dropdown--> 
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Target</h6>
                    <form method="get" action="{{route('personnel.target')}}" style="margin-top: -20px;">
                        <select name="tahun" onchange="this.form.submit()" class="form-control form-control-sm float-right" style="width: 20%;">
                            @foreach ($alltahun as $ath)
                            <option @if ($tahun == $ath->periode_th) selected @endif value="{{$ath->periode_th}}">{{$ath->periode_th}}</option>
                            @endforeach
                        </select>
                    </form>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <!--Success Message--> 
                    @if ( (session('success')))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('success') }}
                    </div>
                    @endif
                    <br>


                    <!-- Card Header - Dropdown -->
                    <h5 class="m-0 font-weight-bold text-primary" style="text-align: center;">Target KPI {{$tahun}}</h5><br>
                    @if ($targetstatus->status == 'waiting for approval'||'approved')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right"><b>Periode Tahun : </b></label>
                                <div class="col-md-6">
                                    <input name="rangeperiode" class="form-control"type="text" value="{{$tahun}}" readonly="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right"><b>Status : </b></label>
                                <div class="col-md-6">
                                    @if($targetstatus->status == 'waiting for approval')
                                    <div style="color: grey; font-weight: bold; margin-top: 5px;">
                                        {{$targetstatus->status}}
                                    </div>
                                    @elseif($targetstatus->status == 'not approved')
                                    <div style="color: red; font-weight: bold; margin-top: 5px;">
                                        {{$targetstatus->status}}
                                    </div>
                                    @elseif ($targetstatus->status == 'approved')
                                    <div style="color: green; font-weight: bold; margin-top: 5px;">
                                        {{$targetstatus->status}}
                                    </div>
                                    @elseif ($targetstatus->status == 'Active')
                                    <div style="color: green; font-weight: bold; margin-top: 5px;">
                                        {{$targetstatus->status}}
                                    </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                    @elseif ($targetstatus->status == 'Active')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right"><b>Periode Target : </b></label>
                                <div class="col-md-6">
                                    <input name="rangeperiode" class="form-control"type="text" value="{{$periode_th}}" readonly="">
                                </div>
                            </div>
                        </div>
                    </div>
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
                    @endif
                    <br>


                    <!--KPI Table-->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead style="background-color: #F8F9FC;">
                                <tr>
                                    <th style="width: 8%; text-align: center;">No</th>
                                    <th>Strategic Objective</th>
                                    <th>KPI</th>
                                    @if (($targetstatus == null)||($targetstatus->status == 'Active'))
                                    <th>Weight</th>
                                    @endif
                                    <th>Target</th>
                                    <th>Timeframe </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datatarget as $dat)
                                <tr>
                                    <td style="text-align: center;">{{$loop->iteration}}</td>
                                    <td>{{$dat->so}}</td>
                                    <td>{{$dat->kpi}}</td>
                                    @if (($targetstatus == null)||($targetstatus->status == 'Active'))
                                    <td>{{$dat->weight}}%</td>
                                    @endif
                                    <td>{{$dat->target}} {{$dat->unit}}</td>
                                    <td>{{$dat->timeframe_target}}</td>
                                    <!--<td>{{$dat->range_period}}</td>-->
                                </tr>                       
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br>
                    @if ($targetstatus->status == 'waiting for approval')
                    <div class="row">
                        <div class="col-md-8">
                        </div>
                        <div class="col-md-4">

                            <!--BUTTON REJECT APPROVE--> 
                            <div class="float-right">
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalReject">
                                    Review
                                </button>
                                <a href="{{route('personnel.target.approve',['tahun'=>$tahun])}}" class="btn btn-success">
                                    Agreed
                                </a>
                            </div>

                            <!--MODAL REJECT REASON-->
                            <div class="modal fade" id="modalReject" tabindex="-1" role="dialog"aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Usulan Perbaikan & Alasan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="POST" action="{{route('personnel.target.notapprove')}}">
                                            @csrf
                                            <div class="modal-body">
                                                <input name="iduser"type="hidden" value="{{$iduser}}">
                                                <input name="tahun"type="hidden" value="{{$tahun}}">
                                                <textarea name="reason"class="form-control" rows="5"></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">OK</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
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
</script>
@endsection
