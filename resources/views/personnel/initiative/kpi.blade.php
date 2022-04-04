@extends('layouts.app3')

@include('client.otherelement')<!--berisikan function di view-->

@section('head')
<?php $page = 'initiative' ?>

<style>
    .scroll {
        max-height: 520px;
        overflow-y: auto;
    }
</style>

@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Initiative</li>
            <li class="breadcrumb-item active" aria-current="page">KPI</li>
            @if ($datasi != null)
            <li class="breadcrumb-item active" aria-current="page">SI</li>
            @endif
        </ol>
    </nav><br>

    <!-- Page Heading -->
    <!--    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-lightbulb"></i>  Initiative</h1>
        </div> -->

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">


            <!--Card 1-->
            <div class="card shadow mb-4 animated--grow-in">
                <!-- Card Header - Dropdown -->

                @if ($datasi == null)
                <!--header kpi-->
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Personnel</h6>
                    <form method="get" action="{{route('personnel.initiative.kpi')}}" style="margin-top: -20px;">
                        <select name="periode_th" onchange="this.form.submit()" class="form-control form-control-sm float-right" style="width: 20%;">
                            @foreach ($alltahun as $ath)
                            <option @if ($periode_th == $ath->periode_th) selected @endif value="{{$ath->periode_th}}">{{$ath->periode_th}}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
                @else
                <!--header si-->
                <div class="card-header py-3 d-flex flex-row align-items-center">
                    <a href="{{route('personnel.initiative.kpi')}}" style="margin-right: 15px;"class="btn btn-sm btn-primary "><i class="fas fa-chevron-left"></i></a><br>
                    <h6 class="m-0 font-weight-bold text-primary">Personnel</h6>
                </div>
                @endif

                <!-- Card Body -->
                <div class="card-body">
                    @if ( (session('success')))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('success') }}
                    </div>
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
                                <label for="position" class="col-md-4 col-form-label text-md-right">Periode
                                    Target</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" list="pos" value="{{ $tahun }}"
                                           disabled="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="position" class="col-md-4 col-form-label text-md-right">Number of
                                    KPI</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" list="pos"
                                           value="{{ getCountKPI($data->id, $tahun) }}" disabled="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if ($datasi == null)
            <!--Card 2-->
            <div class="card shadow mb-4 animated--grow-in">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">KPI Periode {{$tahun}}</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right"><b>Range Periode Target : </b></label>
                                <div class="col-md-6">
                                    <?php
                                    if (empty($datakpi[0]))
                                    {
                                        $rangeperiode = null;
                                    }
                                    else
                                    {
                                        $rangeperiode = $datakpi[0]->range_period;
                                    }
                                    ?>
                                    <input name="rangeperiode" class="form-control" type="text"
                                           value="{{$rangeperiode}}" readonly="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead style="background-color: #F8F9FC;">
                                <tr>
                                    <th style="text-align: center;">No</th>
                                    <th style="text-align: center;">SO</th>
                                    <th style="text-align: center;">KPI</th>
                                    <th style="text-align: center;">Initiative</th>
                                    <th style="text-align: center;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datakpi as $datakpi)
                                <tr>
                                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                                    <td>
                                        {{$datakpi->so}}
                                        @if($datakpi->id_so_library == null)
                                        <span class="badge badge-secondary float-right"><i class="fa fa-user"></i> </span>
                                        @endif
                                    </td>
                                    <td>
                                        {{$datakpi->kpi}}
                                        @if($datakpi->id_kpi_library == null)
                                        <span class="badge badge-secondary float-right"><i class="fa fa-user"></i> </span>
                                        @endif
                                    </td>
                                    <td style="text-align: center;">{{getCountSIbyKPI($datakpi->id, $tahun)}}</td>
                                    <td style="text-align: center;"><a href="{{route('personnel.initiative.kpi',['idpersonnel' => $data->id ,'tahun'=>$tahun, 'idkpi' => $datakpi->id])}}"><button class="btn btn-primary btn-sm">Details</button></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @else
            <!--Card 3-->
            <div class="card shadow mb-4 animated--grow-in">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h5 class="m-0 font-weight-bold text-primary">Strategic Initiative</h5>
                </div>

                <!-- Modal Add-->
                <div class="modal fade bd-example-modal-lg" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Strategic Initiative </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="form-loading"method="POST" action="{{route('personnel.initiative.addinitiative')}}">
                                    @csrf
                                    <input name="id_user" type="hidden" value="{{$data->id}}">
                                    <input name="id_target_kpi" type="hidden" value="{{$datakpiselected->id}}">
                                    <input name="periode_th" type="hidden" value="{{$tahun}}">

                                    @livewire('addinitiative', ['id_user' => $data->id , 'id_target_kpi' => $datakpiselected->id, 'id_kpi_library' => $datakpiselected->id_kpi_library])

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary button-loading">
                                            <i style="display: none;"class="spinner fa fa-spinner fa-spin"></i> Add
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label >Strategic Objective :</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" readonly="">{{$datakpiselected->so}}</textarea>
                            </div>
                            <div class="form-group">
                                <label >KPI :</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" readonly="">{{$datakpiselected->kpi}}</textarea>
                            </div>
                        </div>
                    </div>


                    <button class="btn btn-md btn-primary float-right" style="margin-bottom: 15px;"data-bs-toggle="modal" data-bs-target="#modalAdd"><i class="fas fa-plus"></i></button>
                    <br>

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead style="background-color: #F8F9FC;">
                            <tr>
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">Initiative</th>
                                <th style="text-align: center;">Action Plan</th>
                                <th style="width: 15%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datasi as $datasi)
                            @if ($datasi->approval == 'waiting for approval')
                            <tr style="background-color: #FFF3CD;">
                                @else 
                            <tr>
                                @endif
                                <td style="text-align: center;">{{ $loop->iteration }}</td>
                                <td>{{$datasi->si}}</td>
                                <td style="text-align: center;">
                                    {{getCountActionPlan($datasi->id, $tahun)}}
                                </td>
                                <!--<td>{{$datasi->approval}}</td>-->
                                <td style="width: 15%; text-align: center;">
                                    <form method="post" action="{{route('personnel.initiative.deleteinitiative')}}">
                                        @csrf
                                        <a href="{{route('personnel.initiative.actionplan',['idpersonnel'=>$data->id, 'tahun'=>$tahun, 'idkpiselected'=>$datakpiselected->id, 'idsi'=>$datasi->id])}}" class="btn btn-primary btn-sm">Details</a>
                                        <input name="idsi" type="hidden" value="{{$datasi->id}}">
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('All Action Plan related data will be deleted, Are you sure you want to delete this Initiative ? ');">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            @endif
        </div>
    </div>
    <!-- /.container-fluid -->

    @endsection

    @section('script')
<!--    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>-->
    <script>
        window.setTimeout(function () {
            $(".alert-success").fadeTo(500, 0).slideUp(500, function () {
                $(this).remove();
            });
        }, 1500);
    </script>
    @endsection
