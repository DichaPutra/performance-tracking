@extends('layouts.app2')

@include('client.otherelement')<!--berisikan function di view-->

@section('head')
<?php $page = 'initiative' ?>

@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Initiative</li>
            <li class="breadcrumb-item active" aria-current="page">KPI</li>
            <li class="breadcrumb-item active" aria-current="page">Initiative</li>
        </ol>
    </nav><br>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-lightbulb"></i>  Initiative</h1>
    </div> 

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">

            <!--Card 1-->
            <div class="card shadow mb-4 animated--grow-in">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Details</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Level</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control " name="name" value="{{levelName($data->level)}}" required="" autocomplete="name" autofocus="" disabled="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="position" class="col-md-4 col-form-label text-md-right">Position</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" list="pos" value="{{$data->position}}" disabled="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">PIC Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control " name="name" value="{{$data->name}}" required="" autocomplete="name" autofocus="" disabled="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control " name="email" value="{{$data->email}}" required="" autocomplete="email" disabled="">
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-4 col-form-label text-md-right">KPI</label>
                                                        <div class="col-md-6">
                                                            <textarea class="form-control" rows="4" readonly="">Cash Rasio - Kemampuan perusahaan dalam menyediakan uang tunai atau setara kas dibandingkan dengan tingkat kewajiban lancar (kurang dari setahun)</textarea>
                                                        </div>
                                                    </div>
                                                </div>-->
                    </div>
                </div>
            </div>

            <!--Card 2-->
            <div class="card shadow mb-4 animated--grow-in">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">KPI</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead style="background-color: #F8F9FC;">
                                <tr>
                                    <th style="text-align: center;">No</th>
                                    <th style="text-align: center;">SO</th>
                                    <th style="text-align: center;">KPI</th>
                                    <th style="text-align: center;">Initiative</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;">1</td>
                                    <td style="text-align: center;">{{$datakpi->so}}</td>
                                    <td style="text-align: center;">{{$datakpi->kpi}}</td>
                                    <td style="text-align: center;">{{getCountSIbyKPI($datakpi->id)}}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <!--Card 3-->
            <div class="card shadow mb-4 animated--grow-in">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h5 class="m-0 font-weight-bold text-primary">Initiative</h5>

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
                                <form method="POST" action="{{route('client.initiative.addinitiative')}}">
                                    @csrf
                                    <input name="id_user" type="hidden" value="{{$data->id}}">
                                    <input name="id_target_kpi" type="hidden" value="{{$datakpi->id}}">


                                    @livewire('addinitiative', ['id_user' => $data->id , 'id_target_kpi' => $datakpi->id, 'id_kpi_library' => $datakpi->id_kpi_library])

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" value="Add" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body">

                    <a href="{{route('client.initiative.kpi', ['idpersonnel'=>$data->id])}}">
                        <button class="btn btn-md btn-primary float-left"><i class="fas fa-chevron-left"></i></button>
                    </a>
                    <button class="btn btn-md btn-primary float-right" style="margin-bottom: 15px;"data-bs-toggle="modal" data-bs-target="#modalAdd"><i class="fas fa-plus"></i></button>
                    <br>

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead style="background-color: #F8F9FC;">
                            <tr>
                                <th style="text-align: center;">No</th>
                                <th>Initiative</th>
                                <!--<th>Action Plan</th>-->
                                <th style="width: 15%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datasi as $datasi)
                            <tr>
                                <td style="text-align: center;">{{ $loop->iteration }}</td>
                                <td>{{$datasi->si}}</td>
                                <!--<td style="text-align: center;">5</td>-->
                                <td style="width: 15%; text-align: center;">
                                    <a href="{{route('client.initiative.actionplan')}}"><button class="btn btn-primary btn-sm">Details</button></a>
                                    <a href="#" onclick="return confirm('All Action Plan related data will be deleted, Are you sure you want to delete this Initiative ? ');"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
</div>
<!-- /.container-fluid -->

@endsection

@section('script')
@endsection
