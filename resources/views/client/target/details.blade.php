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

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-bullseye"></i>  Target</h1>
    </div> 

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4 animated--grow-in">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Details</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">

                    <a href="{{route('client.target')}}" class="btn btn-sm btn-primary "><i class="fas fa-chevron-left"></i></a>

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
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;"> </h6>
                                <h5 class="m-0 font-weight-bold text-primary" style="text-align: center;">Strategic Objective</h5>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalAdd">
                                    <i class="fas fa-plus"></i>
                                </button>

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

                                                <form method="POST" action="{{route('client.target.addso')}}">
                                                    @csrf
                                                    <input type="hidden" name="userid" value="{{$data->id}}">
                                                    <input type="hidden" name="tahun" value="{{$tahun}}">

                                                    @livewire('target') 

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <input type="submit" class="btn btn-primary" value="Add">
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Body -->
                            <div class="card-body">
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

                                <!-- Content Row -->
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead style="background-color: #F8F9FC;">
                                            <tr>
                                                <th style="width: 5%; text-align: center;">No</th>
                                                <th>Strategic Objective</th>
                                                <th style="width: 10%; text-align: center;">Operation</th>
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
                                                <td style="width: 10%;text-align: center;">
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit{{$so->id}}">
                                                        <i class="fas fa-pen"></i>
                                                    </button>
                                                    <a href="#" onclick="return confirm('All KPI related data will be deleted, Are you sure you want to delete this Strategic Objective? ');"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a>
                                                </td>
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
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;"> </h6>
                                <h5 class="m-0 font-weight-bold text-primary" style="text-align: center;">KPI</h5>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalAddKPI">
                                    <i class="fas fa-plus"></i>
                                </button>

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

                                                <form method="POST" action="{{route('client.target.addkpi')}}">
                                                    @csrf
                                                    <input type="hidden" name="userid" value="{{$data->id}}">
                                                    <input type="hidden" name="tahun" value="{{$tahun}}">

                                                    @livewire('targetkpi', ['id_personnel' => $data->id, 'tahun' => $tahun])

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <input type="submit" class="btn btn-primary" value="Add">
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


                                <!--Content Row-->
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                        <thead style="background-color: #F8F9FC;">
                                            <tr>
                                                <th style="width: 3%; text-align: center;">No </th>
                                                <th style="width: 20%;text-align: center;">Strategic Objective</th>
                                                <th style="text-align: center;">KPI</th>
                                                <th style="width: 10%; text-align: center;">Unit/Satuan</th>
                                                <th style="width: 5%; text-align: center;">Target</th>
                                                <th style="width: 5%; text-align: center;">Weight</th>
                                                <th style="width: 10%; text-align: center;">Operation</th>
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
                                                <td style="width: 10%; text-align: center;">{{$kpi->unit}}</td>
                                                <td style="width: 5%; text-align: center;">{{$kpi->target}}</td>
                                                <td style="width: 5%; text-align: center;">{{$kpi->weight}} % <?php $totalWeight += $kpi->weight; ?></td>
                                                <td style="width: 10%;text-align: center;">
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditKPI{{ $loop->iteration }}">
                                                        <i class="fas fa-pen"></i>
                                                    </button>
                                                    <a href="#" onclick="return confirm('All KPI related data will be deleted, Are you sure you want to delete this Strategic Objective? ');"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a>
                                                </td>
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
                                                                        <input name="targetedit" type="number" min="1" max="100"  value="{{$kpi->weight}}" class="form-control" >
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text" id="basic-addon2">{{$kpi->unit}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Weight :</label>
                                                                    <div class="input-group mb-3">
                                                                        <input type="number" min="1" max="100" name="weightedit" value="{{$kpi->weight}}" class="form-control" >
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text" id="basic-addon2">%</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> <br>

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
                                        <tr>
                                            <td colspan="5" style="text-align: center;"><b>Total Weight</b></td>
                                            <td style="text-align: center;">{{$totalWeight}} %</td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div><br>
                            </div>

                        </div>
                        <!--end of tab 2-->
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
</script>
@endsection
