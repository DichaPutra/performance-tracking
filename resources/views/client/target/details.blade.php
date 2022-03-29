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
        </ol>
    </nav><br>

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
                                    @if ($targetstatus == null)
                                    <div style="color: red; font-weight: bold; margin-top: 5px;">
                                        Not Active
                                    </div>
                                    @elseif ($targetstatus->status == 'waiting for approval')
                                    <div style="color: grey; font-weight: bold; margin-top: 5px;">
                                        {{$targetstatus->status}}
                                    </div>
                                    @elseif ($targetstatus->status == 'approved')
                                    <div style="color: green; font-weight: bold; margin-top: 5px;">
                                        {{$targetstatus->status}}
                                    </div>
                                    @elseif ($targetstatus->status == 'not approved')
                                    <div style="color: red; font-weight: bold; margin-top: 5px;">
                                        {{$targetstatus->status}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div><br>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link @if(is_null(session('tab'))) active @endif" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Strategic Objective</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link @if(session('tab') == 'kpi') active @endif" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">KPI</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <!-- ========= Tab 1 Strategic Objective =========== -->
                        <div class="tab-pane fade @if(is_null(session('tab')))show active @endif" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <br>
                            <!-- Card Header - Dropdown -->
                            <div class="py-3 d-flex flex-row align-items-center justify-content-between">
                                @if (($targetstatus == null)||(($targetstatus->status != 'waiting for approval')&&($targetstatus->status != 'approved')))
                                <!-- Button trigger modal -->
                                <button type="button" style="margin-left: 20px;" class="btn btn-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#modalAdd">
                                    Add SO <i class="fas fa-plus"></i>
                                </button>
                                @endif

                                <!-- Modal Add-->
                                <div class="modal fade bd-example-modal-lg" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Strategic Objective </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- **** Form Add SO **** -->

                                                <form class="form-loading"method="POST" action="{{route('client.target.addso')}}">
                                                    @csrf
                                                    <input type="hidden" name="userid" value="{{$data->id}}">
                                                    <input type="hidden" name="tahun" value="{{$tahun}}">

                                                    @livewire('target') 

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
                            </div>

                            <!-- Card Body -->
                            <div class="card-body">
                                <!-- Content Row -->
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead style="background-color: #F8F9FC;">
                                            <tr>
                                                <th style="width: 5%; text-align: center;">No</th>
                                                <th>Strategic Objective</th>
                                                @if (($targetstatus == null)||(($targetstatus->status != 'waiting for approval')&&($targetstatus->status != 'approved')))
                                                <th style="width: 10%; text-align: center;">Operation</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dataso as $so)
                                            <tr>
                                                <td style="width: 5%; text-align: center;">{{ $loop->iteration }}</td>
                                                <td>
                                                    {{$so->so}}
                                                    @if($so->id_so_library == null)
                                                    <span class="badge badge-secondary float-right"><i class="fa fa-user"></i> Custom</span>
                                                    @endif
                                                </td>
                                                @if (($targetstatus == null)||(($targetstatus->status != 'waiting for approval')&&($targetstatus->status != 'approved')))
                                                <td style="width: 10%;text-align: center;">
                                                    <form action="{{route('client.target.deleteso')}}" method="post">
                                                        <!--button edit SO-->
                                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit{{$so->id}}">
                                                            <i class="fas fa-pen"></i>
                                                        </button>
                                                        <!--button delete SO-->
                                                        @csrf
                                                        <input type="hidden" name="id_targetso" value="{{$so->id}}">
                                                        <input type="hidden" name="userid" value="{{$data->id}}">
                                                        <input type="hidden" name="tahun" value="{{$tahun}}">
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('All KPI related data will be deleted, Are you sure you want to delete this Strategic Objective? ');">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                @endif
                                            </tr>

                                            <!--modal edit-->
                                        <div class="modal fade bd-example-modal-lg" id="modalEdit{{$so->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Strategic Objective</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{route('client.target.editso')}}">
                                                            @csrf
                                                            <input type="hidden" name="userid" value="{{$data->id}}">
                                                            <input type="hidden" name="idtargetso" value="{{$so->id}}">
                                                            <input type="hidden" name="tahun" value="{{$tahun}}">
                                                            <input type="text" name="so" value="{{$so->so}}" class="form-control" >

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <input type="submit" class="btn btn-primary" value="Edit">
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--end of tab 1-->


                        <!-- ========== Tab 2 KPI ========== -->
                        <div class="tab-pane fade @if(session('tab') == 'kpi') show active @endif" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <br>

                            <!-- Card Header - Dropdown -->
                            <div class="py-3 d-flex flex-row align-items-center justify-content-between">
                                @if (($targetstatus == null)||(($targetstatus->status != 'waiting for approval')&&($targetstatus->status != 'approved')))
                                <!-- Button trigger modal -->
                                <button type="button" style="margin-left: 20px;"class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalAddKPI">
                                    Add KPI <i class="fas fa-plus"></i>
                                </button>
                                @endif

                                <!-- Modal Add-->
                                <div class="modal fade bd-example-modal-lg" id="modalAddKPI" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add KPI </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- **** Form Add KPI **** -->

                                                <form class="form-loading" method="POST" action="{{route('client.target.addkpi')}}">
                                                    @csrf
                                                    <input type="hidden" name="userid" value="{{$data->id}}">
                                                    <input type="hidden" name="tahun" value="{{$tahun}}">

                                                    @livewire('targetkpi', ['id_personnel' => $data->id, 'tahun' => $tahun])

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
                            </div> <br>

                            <!-- Card Body -->
                            <div class="card-body">
                                <!--Success Message--> 

                                <!--Content Row-->
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                        <thead style="background-color: #F8F9FC;">
                                            <tr>
                                                <th style="width: 3%; text-align: center;">No </th>
                                                <th style="width: 20%;text-align: center;">Strategic Objective</th>
                                                <th style="text-align: center;">KPI</th>
                                                <th style="width: 10%; text-align: center;">Timeframe</th>
                                                <th style="width: 5%; text-align: center;">Target</th>
                                                @if (($targetstatus == null)||(($targetstatus->status != 'waiting for approval')&&($targetstatus->status != 'approved')))
                                                <th style="width: 10%; text-align: center;">Operation</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $totalWeight = 0 ?>
                                            @foreach ($datakpi as $kpi)
                                            <tr>
                                                <td style="width: 3%; text-align: center;">{{ $loop->iteration }}</td>
                                                <td style="width: 20%;">
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
                                                <td style="width: 10%; text-align: center;">{{$kpi->timeframe_target}}</td>
                                                <td style="width: 5%; text-align: center;">
                                                    @if($kpi->unit == 'Rp' || $kpi->unit == 'rp' || $kpi->unit == 'RP')
                                                    Rp {{ $kpi->target}},-
                                                    @else 
                                                    {{ $kpi->target}} {{$kpi->unit}}
                                                    @endif
                                                </td>
                                                @if (($targetstatus == null)||(($targetstatus->status != 'waiting for approval')&&($targetstatus->status != 'approved')))
                                                <td style="width: 10%;text-align: center;">
                                                    <form action="{{route('client.target.deletekpi')}}" method="post">
                                                        @csrf
                                                        <!--button edit kpi-->
                                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditKPI{{ $loop->iteration }}">
                                                            <i class="fas fa-pen"></i>
                                                        </button>
                                                        <!--button delete kpi-->
                                                        <input type="hidden" name="id_targetkpi" value="{{$kpi->id}}">
                                                        <input type="hidden" name="userid" value="{{$data->id}}">
                                                        <input type="hidden" name="tahun" value="{{$tahun}}">

                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('All KPI related data will be deleted, Are you sure you want to delete this KPI? ');">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                @endif
                                            </tr>
                                            <!--modal edit-->
                                        <div class="modal fade bd-example-modal-lg" id="modalEditKPI{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit KPI</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{route('client.target.editkpi')}}">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="hidden" name="userid" value="{{$data->id}}">
                                                                    <input type="hidden" name="idtargetkpi" value="{{$kpi->id}}">
                                                                    <input type="hidden" name="tahun" value="{{$tahun}}">
                                                                    <label>KPI :</label>
                                                                    <input type="text" name="kpiedit" value="{{$kpi->kpi}}" class="form-control" >
                                                                </div>
                                                            </div><br>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Target :</label>
                                                                    <div class="input-group mb-3">
                                                                        <input name="targetedit" type="number" min="1"  value="{{$kpi->target}}" class="form-control" >
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text" id="basic-addon2">{{$kpi->unit}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Timeframe :</label>
                                                                    <div class="input-group mb-3">
                                                                        <select name="timeframe" class="form-control" required="">
                                                                            <option value=" " hidden>select...</option>
                                                                            <option @if($kpi->timeframe_target == 'bulanan') selected @endif value="bulanan">Bulanan</option>
                                                                            <option @if($kpi->timeframe_target == 'triwulan') selected @endif value="triwulan">Triwulan</option>
                                                                            <option @if($kpi->timeframe_target == 'quartal') selected @endif value="quartal">Quartal</option>
                                                                            <option @if($kpi->timeframe_target == 'semester') selected @endif value="semester">Semester</option>
                                                                            <option @if($kpi->timeframe_target == 'tahunan') selected @endif value="tahunan">Tahunan</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <input type="submit" class="btn btn-primary" value="Edit">
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--end of tab 2-->

                        <hr>
                        <div class="row">
                            <div class="col-md-8">
                            </div>

                            <div class="col-md-4">
                                <div class="float-right">
                                    <a href="{{route('client.target')}}" class="btn btn-secondary ">Cancel</a>
                                    @if ($targetstatus == null)
                                    <a href="{{ route('client.target.addtargetstatus', ['idpersonnel' => $idpersonnel, 'tahun' => $tahun]) }}" class="btn btn-primary">
                                        Propose to Team
                                    </a>
                                    @elseif($targetstatus->status == 'not approved')
                                    <a href="{{ route('client.target.updatetargetstatus', ['idpersonnel' => $idpersonnel, 'tahun' => $tahun]) }}" class="btn btn-primary">
                                        Propose to Team
                                    </a>
                                    @elseif (isTargetExist($data->id, $tahun) && ($targetstatus->status == 'approved'))
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        Activate
                                    </button>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <!-- Button trigger modal -->


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Awal Mulai Periode Target</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <form class="form-loading" action="{{route('client.target.activateconfirm')}}">
                                        @csrf
                                        <div class="modal-body">
                                            <!--<a href="{{route('client.target.activateconfirm', ['idpersonnel'=>$data->id, 'tahun'=>$tahun])}}" class="btn btn-primary btn-sm">Activate</a>-->


                                            <input type="hidden" name="idpersonnel" value="{{$data->id}}">
                                            <input type="hidden" name="tahun" value="{{$tahun}}">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select name="startingbln"value class="form-control">                                        
                                                        @for ($i = 1; $i <= 12; $i++)
                                                        @if (checkTargetTerakhir($data->id, $tahun)>=$i)
                                                        @else
                                                        <option value="{{$i}}">{{date('F', mktime(0, 0, 0, $i, 10))}}</option>
                                                        @endif
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <input class="form-control" type="text" value="{{$tahun}}" readonly="">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary button-loading">
                                                <i style="display: none;"class="spinner fa fa-spinner fa-spin"></i> Save
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection

@section('script')
<script>
//    $(document).ready(function () {
//        $('#dataTable').DataTable({
//            "paging": false,
//            "searching": false,
//        });
//    });
//
//    $(document).ready(function () {
//        $('#tableKPI').DataTable({
//            "paging": false,
//            "searching": false,
//        });
//    });

    window.setTimeout(function () {
        $(".alert-success").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 10000);
</script>
@endsection
