@extends('layouts.app2')

@include('client.otherelement')
<!--berisikan function calculation di view-->

@section('head')
<?php $page = 'performancereport'; ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    #container {
        margin: 30px;
        width: 250px;
        height: 125px;
    }

</style>
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Performance Report</li>
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
                    <a href="{{route('client.performancereport')}}" style="margin-right: 15px;"class="btn btn-sm btn-primary "><i class="fas fa-chevron-left"></i></a><br>
                    <h6 class="m-0 font-weight-bold text-primary float-left">Details</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Level</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control " name="name"
                                           value="{{ levelName($data->level) }}" required="" autocomplete="name"
                                           autofocus="" disabled="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Level Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control " name="name"
                                           value="{{ $data->level_name }}" required="" autocomplete="name" autofocus=""
                                           disabled="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">PIC Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control " name="name"
                                           value="{{ $data->name }}" required="" autocomplete="name" autofocus=""
                                           disabled="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="position" class="col-md-4 col-form-label text-md-right">Position</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" list="pos" value="{{ $data->position }}"
                                           disabled="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control " name="email"
                                           value="{{ $data->email }}" required="" autocomplete="email" disabled="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="position" class="col-md-4 col-form-label text-md-right">Periode
                                    Target</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" list="pos" value="{{ $periode_th }}"
                                           disabled="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="position" class="col-md-4 col-form-label text-md-right">Number of SO</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" list="pos"
                                           value="{{ getCountSO($data->id, $periode_th) }}" disabled="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="position" class="col-md-4 col-form-label text-md-right">Number of
                                    KPI</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" list="pos"
                                           value="{{ getCountKPI($data->id, $periode_th) }}" disabled="">
                                </div>
                            </div>
                        </div>
                    </div><br>
                </div>
            </div>
        </div>
    </div>



    @if ($waitingApprovalCapaian->count())
    <!--jika ada waiting approval-->
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4 animated--grow-in">
                <!--Card Header - Dropdown--> 
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h5 class="m-0 font-weight-bold text-primary" style="text-align: center;">Pending Approval Capaian</h5>
                </div>
                <!--Card Body--> 
                <div class="card-body">

                    <!--ambil data capaian_kpi dengan approval = waiting for acceptance
                    - make function untuk details capaian di otherelements
                    -->
                    <div class="alert alert-warning">
                        <div class="row">
                            <div class="col-md-1" style="text-align: center;">
                                <i class="fas fa-exclamation-triangle" ></i>
                            </div>
                            <div class="col-md-9">
                                Berikut ini adalah data capaian yang pending dalam report. Harap lakukan <b>pengecekan data capaian</b>. Jika data yang diinputkan oleh personnel sudah benar, harap lakukan approval dengan menekan tombol "approve".
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <?php
                        //data untuk modal
                        $waitingApprovalCapaian2 = $waitingApprovalCapaian
                        ?>
                        <!--Tabel Approval-->
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead style="background-color: #F8F9FC;">
                                    <tr>
                                        <th style="text-align: center; width: 5%">No</th>
                                        <th style="text-align: center;">Waktu Capaian</th>
                                        <th style="text-align: center; width: 20%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($waitingApprovalCapaian as $waitingApprovalCapaian)
                                    <tr>
                                        <td style="text-align: center;">{{$loop->iteration}}</td>
                                        <td style="text-align: center;">{{$waitingApprovalCapaian->bulan}}/{{$waitingApprovalCapaian->tahun}}</td>
                                        <td style="text-align: center;">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detailsApproval{{$loop->iteration}}">Details</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!--Modal Detail-->
                        @foreach ($waitingApprovalCapaian2 as $waitingApprovalCapaian2)
                        <div class="modal fade" id="detailsApproval{{$loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Detail Capaian</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="position" class="col-md-4 col-form-label text-md-right">Waktu Capaian</label>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" list="pos"
                                                               value="{{$waitingApprovalCapaian2->bulan}}/{{$waitingApprovalCapaian2->tahun}}" disabled="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                <thead style="background-color: #F8F9FC;">
                                                    <tr>
                                                        <th style="width: 8%; text-align: center;">No</th>
                                                        <th style="width: 52%; text-align: center;">SO & KPI</th>
                                                        <th>Target</th>
                                                        <th>Capaian</th>
                                                        <th>Unit Satuan</th>
                                                        <th style="width: 40%; text-align: center;">Performance Score</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach (detailCapaianApprove($waitingApprovalCapaian2->bulan, $waitingApprovalCapaian2->tahun, $data->id) as $approvalCapaian )
                                                    <tr>
                                                        <td style="text-align: center;">{{$loop->iteration}}</td>
                                                        <td>
                                                            <b>{{$approvalCapaian->so}}</b><br>
                                                            {{$approvalCapaian->kpi}}
                                                        </td>
                                                        <td style="text-align: center;">
                                                            {{ $approvalCapaian->target}} 
                                                        </td>
                                                        <td style="text-align: center;">
                                                            {{ $approvalCapaian->capaian}} 

                                                        </td>
                                                        <td>
                                                            {{$approvalCapaian->unit}}
                                                        </td>
                                                        <td style="text-align: center;">
                                                            @if($approvalCapaian->score>100)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-info" role="progressbar" style="width: {{$approvalCapaian->score}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$approvalCapaian->score}}</div>
                                                            </div>
                                                            @elseif($approvalCapaian->score>=75)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-success" role="progressbar" style="width: {{$approvalCapaian->score}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$approvalCapaian->score}}</div>
                                                            </div>
                                                            @elseif($approvalCapaian->score>=50)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-warning" role="progressbar" style="width: {{$approvalCapaian->score}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$approvalCapaian->score}}</div>
                                                            </div>
                                                            @elseif ($approvalCapaian->score<50)
                                                            <div class="progress">
                                                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{$approvalCapaian->score}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$approvalCapaian->score}}</div>
                                                            </div>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <form method="post" action="{{route('client.performancereport.rejectcapaian')}}">
                                            @csrf
                                            <input name="bulan" type="hidden" value="{{$waitingApprovalCapaian2->bulan}}">
                                            <input name="tahun" type="hidden" value="{{$waitingApprovalCapaian2->tahun}}">
                                            <input name="id_user" type="hidden" value="{{$data->id}}">
                                            <button type="submit" class="btn btn-danger" >Reject</button>
                                        </form>
                                        <form method="post" action="{{route('client.performancereport.approvecapaian')}}">
                                            @csrf
                                            <input name="bulan" type="hidden" value="{{$waitingApprovalCapaian2->bulan}}">
                                            <input name="tahun" type="hidden" value="{{$waitingApprovalCapaian2->tahun}}">
                                            <input name="id_user" type="hidden" value="{{$data->id}}">
                                            <button type="submit" class="btn btn-primary" >Approve</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif



    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4 animated--grow-in">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h5 class="m-0 font-weight-bold text-primary" style="text-align: center;">Performance periode th
                        {{ $periode_th }}</h5>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right"><b>Range Periode
                                        Target : </b></label>
                                <div class="col-md-6">
                                    <input name="rangeperiode" class="form-control" type="text"
                                           value="{{ $range_period }}" readonly="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div>
                            <canvas id="yearlychart" width="100%" height="35%"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4 animated--grow-in">

                <!-- Card Header - Dropdown -->
                @if ($month == null)
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h5 class="m-0 font-weight-bold text-primary" style="text-align: center;">Monthly Details</h5>
                    <!-- Button trigger modal -->
                    <form method="get" action="{{route('client.performancereport.details')}}" style="width: 20%;">
                        <input type="hidden" name="user_id" value="{{$data->id}}">
                        <input type="hidden" name="periode_th" value="{{$periode_th}}">
                        <select name="month" class="form-control form-control-sm float-right" onchange="this.form.submit()">
                            <option value="" hidden>select...</option>
                            @foreach ($dropdownbln as $bln)
                            <option value="{{$bln->bulan}}-{{$bln->tahun}}">{{date('F', mktime(0, 0, 0, $bln->bulan, 10))}} / {{$bln->tahun}} </option>
                            @endforeach
                        </select>
                    </form>
                </div>
                @else
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h5 class="m-0 font-weight-bold text-primary" style="text-align: center;">Monthly Details</h5>
                    <!-- Button trigger modal -->
                    <form method="get" action="{{route('client.performancereport.details')}}" style="width: 20%;">
                        <input type="hidden" name="user_id" value="{{$data->id}}">
                        <input type="hidden" name="periode_th" value="{{$periode_th}}">
                        <select name="month" class="form-control form-control-sm float-right" onchange="this.form.submit()">
                            <option value="" hidden>select...</option>
                            @foreach ($dropdownbln as $bln)
                            <option value="{{$bln->bulan}}-{{$bln->tahun}}" @if($bln->bulan==$month) selected @endif>  {{date('F', mktime(0, 0, 0, $bln->bulan, 10))}} / {{$bln->tahun}}</option>
                            <!--<option value="{{$bln->bulan}}" @if($bln->bulan==$month) selected @endif>{{date('F', mktime(0, 0, 0, $bln->bulan, 10))}}</option>-->
                            @endforeach
                        </select>
                    </form>
                </div>
                <!-- Card Body -->
                <div class="card-body">

                    <div class="text-center"><b>Overall Performance</b> <br>{{date('F', mktime(0, 0, 0, $month, 10))}} 2021</div>
                    <!--Performance Chart-->
                    <div class="d-flex justify-content-center">
                        <link href="https://fonts.googleapis.com/css?family=Raleway:400,300,600,800,900"
                              rel="stylesheet" type="text/css">
                        <div class="float-none" id="container"></div>
                    </div><br>

                    <!-- Content Row -->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead style="background-color: #F8F9FC;">
                                <tr>
                                    <th style="width: 8%; text-align: center;">No</th>
                                    <th style="width: 52%; text-align: center;">SO & KPI</th>
                                    <!--<th>Target</th>-->
                                    <!--<th>Capaian</th>-->
                                    <th>Timeframe</th>
                                    <th>Weight</th>
                                    <th style="width: 40%; text-align: center;">Performance Score</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datacapaian as $datacapaian)
                                <tr>
                                    <td style="text-align: center;">{{$loop->iteration}}</td>
                                    <td>
                                        <b>{{$datacapaian->so}}</b><br>
                                        {{$datacapaian->kpi}}
                                    </td>
                                    <!--<td>
                                        {{$datacapaian->target}}
                                        @if($datacapaian->unit == 'Rp' || $datacapaian->unit == 'rp' || $datacapaian->unit == 'RP')
                                        Rp {{ $datacapaian->target}},-
                                        @else 
                                        {{ $datacapaian->target}} {{$datacapaian->unit}}
                                        @endif

                                    </td>
                                    <td>
                                        {{$datacapaian->target}} {{$datacapaian->target}}
                                        @if($datacapaian->unit == 'Rp' || $datacapaian->unit == 'rp' || $datacapaian->unit == 'RP')
                                        Rp {{ $datacapaian->capaian}},-
                                        @else 
                                        {{ $datacapaian->capaian}} {{$datacapaian->unit}}
                                        @endif
                                    </td>-->
                                    <td>{{$datacapaian->timeframe_target}}</td>
                                    <td>
                                        {{$datacapaian->weight}} %
                                    </td>
                                    <td style="text-align: center;">
                                        @if($datacapaian->score>100)
                                        <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: {{$datacapaian->score}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$datacapaian->score}}</div>
                                        </div>
                                        @elseif($datacapaian->score>=75)
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{$datacapaian->score}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$datacapaian->score}}</div>
                                        </div>
                                        @elseif($datacapaian->score>=50)
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: {{$datacapaian->score}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$datacapaian->score}}</div>
                                        </div>
                                        @elseif ($datacapaian->score<50)
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: {{$datacapaian->score}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$datacapaian->score}}</div>
                                        </div>
                                        @endif
                                    </td>
                                    <td style="text-align:center;">
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detailsCapaianModal{{$loop->iteration}}">Details</button>
                                    </td>
                                </tr>

                                <!--Modal Detail-->
                                <!-- Large modal -->
                            <div class="modal fade" id="detailsCapaianModal{{$loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Detail Capaian</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Strategic Objective :</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" readonly="">{{$datacapaian->so}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">KPI :</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" readonly="">{{$datacapaian->kpi}}</textarea>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Target :</label>
                                                    <input type="text" class="form-control" 
                                                           value="@if($datacapaian->unit == 'Rp' || $datacapaian->unit == 'rp' || $datacapaian->unit == 'RP')Rp {{ $datacapaian->target}},-@else{{ $datacapaian->target}} {{$datacapaian->unit}}@endif" 
                                                           readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Capaian :</label>
                                                    <input type="text" class="form-control" 
                                                           value="@if($datacapaian->unit == 'Rp' || $datacapaian->unit == 'rp' || $datacapaian->unit == 'RP')Rp {{ $datacapaian->capaian}},-@else{{ $datacapaian->capaian}} {{$datacapaian->unit}}@endif" 
                                                           readonly>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4">Polarization :</label>
                                                    <input type="text" class="form-control" value="{{$datacapaian->polarization}}" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Score :</label>
                                                    <input type="text" class="form-control" value="{{$datacapaian->score}}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->
@endsection

@section('script')
<!--chart.JS-->
<script>
    new Chart(document.getElementById("yearlychart"), {
    type: 'bar',
            data: {
            labels: <?php echo $bulanChart; ?>,
                    datasets: [{
                    label: "Performance Score",
                            type: "bar",
                            backgroundColor: "rgba(0,0,0,0.3)",
                            data: <?php echo $capaianChart; ?>,
                    }]
            },
            options: {
            title: {
            display: true,
                    text: ''
            },
                    legend: {
                    display: false
                    }
            }
    });</script>

<!--Progressbar JS-->
<script src="js/progressbar.js"></script>
<script>
    // progressbar.js@1.0.0 version is used
    // Docs: http://progressbarjs.readthedocs.org/en/1.0.0/

    var bar = new ProgressBar.SemiCircle(container, {
    strokeWidth: 1,
            color: '#FFEA82',
            trailColor: '#eee',
            trailWidth: 1,
            easing: 'easeInOut',
            duration: 1400,
            svgStyle: null,
            text: {
            value: '',
                    alignToBottom: false
            },
            from: {
            color: '#FF0000'
            },
            to: {
            color: '##00FF00'
            },
            // Set default step function for all animate calls
            step: (state, bar) => {
    bar.path.setAttribute('stroke', state.color);
    var value = Math.round(bar.value() * 100);
    if (value === 0) {
    bar.setText('0');
    } else if (value > 100){
    bar.setText(value);
    }
    else {
    bar.setText(value);
    //bar.setText(value + ' %');
    }

    if (bar.value() > 1) {
    bar.trail.setAttribute('stroke', '#439afa');
    }
    bar.text.style.color = state.color;
    }
    });
    bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
    bar.text.style.fontSize = '2rem';
    bar.animate({{$bulanScore}});
//    bar.animate({{$bulanScore}}); // Number from 0.0 to 1.0
</script>

<!--Line Chart JS-->
@endsection
