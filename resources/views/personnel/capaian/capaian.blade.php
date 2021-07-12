@extends('layouts.app2')

@section('head')
<?php $page = 'capaian' ?>
@endsection

@section('content')
<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-chart-line"></i> Capaian</h1>
            </div>

            <div class="card shadow mb-4 animated--grow-in">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Capaian</h6>

                    <button class="btn btn-secondary" data-toggle="modal" data-target="#changeTarget">{{date('F', mktime(0, 0, 0, $bulan, 10))}} {{$tahun}}</button>

                    <!-- Modal ganti tanggal-->
                    <div class="modal fade" id="changeTarget" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Change Date</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>                                    
                                <form method="post" action="{{route('personnel.capaian')}}">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label><b>Tahun :</b></label>
                                                <div class="input-group mb-3">
                                                    <select name="tahun" class="form-control" required="">
                                                        <option value=" " hidden>select...</option>
                                                        @foreach ($alltahun as $alltahun)
                                                        <option value="{{$alltahun->tahun}}" >{{$alltahun->tahun}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label><b>Bulan :</b></label>
                                                <div class="input-group mb-3">
                                                    <select name="bulan" class="form-control" required="">
                                                        <option value=" " hidden>select...</option>
                                                        @for($i = 1; $i <= 12; $i++)
                                                        <option value="{{$i}}">{{date('F', mktime(0, 0, 0, $i, 10))}}</option>
                                                        @endfor
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Go</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                                        <!--<input class="form-control form-control-sm float-right" type="text" readonly="" value="{{date('F')}} {{date('Y')}}">-->



                </div>

                <!-- Card Body -->
                <div class="card-body">

                    <!--is scored = {{$is_scored}}-->
                    @if($is_scored != 0)
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <i class="fa fa-check" style="margin-right: 20px;"></i>  you have entered this month's data
                    </div>
                    @endif

                    <br>
                    <!-- Card Header - Dropdown -->
                    <h5 class="m-0 font-weight-bold text-primary" style="text-align: center;">Capaian KPI</h5>
                    <br>


                    <!--KPI Table-->
                    <form method="post" action="{{route('personnel.capaian.addcapaian')}}">
                        @csrf
                        <input name="bulan" value="{{$bulan}}" type="hidden" >
                        <input name="tahun" value="{{$tahun}}" type="hidden" >
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead style="background-color: #F8F9FC;">
                                    <tr>
                                        <th style="width: 8%; text-align: center;">No</th>
                                        <th style="text-align: center;">SO</th>
                                        <th style="text-align: center;">KPI</th>
                                        <th style="text-align: center;">Timeframe</th>
                                        <th>Target</th>
                                        <th>Actual</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($target as $target)
                                    <tr>

                                        <td style="text-align: center;">{{$loop->iteration}}</td>
                                        <td>{{$target->so}}</td>
                                        <td>{{$target->kpi}}</td>
                                        <td>{{$target->timeframe_target}}</td>
                                        <td>{{$target->target}}{{$target->unit}}</td>
                                        <td> 
                                            <div class="input-group mb-3">
                                                <input name="activetargetid[]" value="{{$target->id}}" type="hidden" >
                                                <input name="so[]" value="{{$target->so}}" type="hidden" >
                                                <input name="kpi[]" value="{{$target->kpi}}" type="hidden" >
                                                <input name="unit[]" value="{{$target->unit}}" type="hidden" >
                                                <input name="measurement[]" value="{{$target->measurement}}" type="hidden" >
                                                <input name="target[]" value="{{$target->target}}" type="hidden" >
                                                <input name="weight[]" value="{{$target->weight}}" type="hidden" >
                                                <input name="polarization[]" value="{{$target->polarization}}" type="hidden" >
                                                <input name="capaian[]" type="number" class="form-control" min="1" required="">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">{{$target->unit}}</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>                        
                                    @endforeach
                                </tbody>
                            </table>
                        </div><br>
                        <!--<button></button>-->
                        @if($is_scored == 0)
                        <button class="btn btn-primary float-right" onclick="confirm('Make sure your input is correct before going to the submit process. Are you sure to submit this data?')">Submit Capaian</button>
                        @endif
                    </form>
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
