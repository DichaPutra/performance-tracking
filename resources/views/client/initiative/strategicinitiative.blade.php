@extends('layouts.app2')

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
            <li class="breadcrumb-item active" aria-current="page">SI</li>
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

                <div class="card-header py-3 d-flex flex-row align-items-center">
                    <a href="{{route('client.initiative.kpi', ['idpersonnel'=>$data->id,'tahun'=>$tahun])}}" style="margin-right: 15px;"class="btn btn-sm btn-primary "><i class="fas fa-chevron-left"></i></a><br>

                    <h6 class="m-0 font-weight-bold text-primary">Personnel</h6>
                </div>
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
                                <form class="form-loading" method="POST" action="{{route('client.initiative.addinitiative')}}">
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

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead style="background-color: #F8F9FC;">
                                <tr>
                                    <th style="text-align: center;">No</th>
                                    <th style="text-align: center;">Strategic Initiative</th>
                                    <th style="text-align: center;">Keterangan</th>
                                    <th style="width: 10%;text-align: center;">Action Plan</th>
                                    <th style="width: 12%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datasi as $datasi)
                                @if ($datasi->approval != 'approved')
                                <tr style="background-color: #FFF3CD;">
                                    @else 
                                <tr>
                                    @endif
                                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                                    <td>{{$datasi->si}}</td>
                                    <td>- <b>{{$datasi->approval}}</b> - {{$datasi->keterangan}}</td>
                                    <td style="text-align: center;">
                                        <a href="{{route('client.initiative.actionplan',['idpersonnel'=>$data->id, 'tahun'=>$tahun, 'idkpiselected'=>$datakpiselected->id, 'idsi'=>$datasi->id])}}" class="btn btn-secondary">
                                            {{getCountActionPlan($datasi->id, $tahun)}}
                                        </a>
                                    </td>
                                    <td style="text-align: center;">
                                        @if ($datasi->approval == 'waiting for approval')
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form method="post" action="{{route('client.initiative.approveinitiative')}}">
                                                    @csrf
                                                    <input name="idsi" type="hidden" value="{{$datasi->id}}">
                                                    <button type="submit" class="btn btn-success btn-sm">
                                                        Approve
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="col-md-6">

                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalReject{{$datasi->id}}"">
                                                    <i class="fas fa-times"></i>
                                                </button>

                                                <!--MODAL REJECT REASON-->
                                                <div class="modal fade" id="modalReject{{$datasi->id}}" tabindex="-1" role="dialog"aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Alasan Penolakan</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form method="post" action="{{route('client.initiative.rejectinitiative')}}">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <input name="idsi" type="hidden" value="{{$datasi->id}}">
                                                                    <textarea name="keterangan"class="form-control" rows="5"></textarea>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">OK</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--END OF MODAL-->
                                            </div>
                                        </div>
                                        @else 
                                        <form method="post" action="{{route('client.initiative.deleteinitiative')}}">
                                            @csrf
                                            <!--<a href="{{route('client.initiative.actionplan',['idpersonnel'=>$data->id, 'tahun'=>$tahun, 'idkpiselected'=>$datakpiselected->id, 'idsi'=>$datasi->id])}}" class="btn btn-primary btn-sm">Details</a>-->
                                            <input name="idsi" type="hidden" value="{{$datasi->id}}">
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('All Action Plan related data will be deleted, Are you sure you want to delete this Initiative ? ');">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                        @endif
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
