@extends('layouts.app3')

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

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-chalkboard-teacher"></i> Performance Report</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4 animated--grow-in">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary float-left">Details</h6>

                        <form method="get" action="{{ route('personnel.performancereport') }}" style="margin-top: -20px;">
                            <select name="periode_th" onchange="this.form.submit()"
                                class="form-control form-control-sm float-right" style="width: 20%;">
                                @foreach ($alltahun as $ath)
                                    <option @if ($periode_th == $ath->periode_th) selected @endif value="{{ $ath->periode_th }}">
                                        {{ $ath->periode_th }}
                                    </option>
                                @endforeach
                            </select>
                        </form>

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

                            <!--                        <div class="chart-container" style="height:20%; width:100%">
                                                                                    <canvas id="yearlychart"></canvas>
                                                                                </div>-->
                            <div class="row">
                                <div>
                                    <canvas id="yearlychart" height="350" width="700"></canvas>
                                </div>
                            </div>
                        </div><br><br><br>


                        <!-- Card Header - Dropdown -->
                        @if ($month == null)
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h5 class="m-0 font-weight-bold text-primary" style="text-align: center;">Monthly Details
                                </h5>
                                <!-- Button trigger modal -->
                                <form method="get" action="{{ route('personnel.performancereport') }}"
                                    style="width: 20%;">
                                    <input type="hidden" name="user_id" value="{{ $data->id }}">
                                    <input type="hidden" name="periode_th" value="{{ $periode_th }}">
                                    <select name="month" class="form-control form-control-sm float-right"
                                        onchange="this.form.submit()">
                                        <option value="" hidden>select...</option>
                                        @foreach ($dropdownbln as $bln)
                                            <option value="{{ $bln->bulan }}-{{ $bln->tahun }}">
                                                {{ date('F', mktime(0, 0, 0, $bln->bulan, 10)) }} / {{ $bln->tahun }}
                                            </option>
                                        @endforeach
                                    </select>
                                </form>
                            </div>
                        @else
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h5 class="m-0 font-weight-bold text-primary" style="text-align: center;">Monthly Details
                                </h5>
                                <!-- Button trigger modal -->
                                <form method="get" action="{{ route('personnel.performancereport') }}"
                                    style="width: 20%;">
                                    <input type="hidden" name="user_id" value="{{ $data->id }}">
                                    <input type="hidden" name="periode_th" value="{{ $periode_th }}">
                                    <select name="month" class="form-control form-control-sm float-right"
                                        onchange="this.form.submit()">
                                        <option value="" hidden>select...</option>
                                        @foreach ($dropdownbln as $bln)
                                            <option value="{{ $bln->bulan }}-{{ $bln->tahun }}"
                                                @if ($bln->bulan == $month) selected @endif>
                                                {{ date('F', mktime(0, 0, 0, $bln->bulan, 10)) }}
                                                / {{ $bln->tahun }}</option>
                                            <!--<option value="{{ $bln->bulan }}" @if ($bln->bulan == $month) selected @endif>{{ date('F', mktime(0, 0, 0, $bln->bulan, 10)) }}</option>-->
                                        @endforeach
                                    </select>
                                </form>
                            </div>


                            <!-- Card Body -->
                            <div class="card-body">

                                <div class="text-center"><b>Overall Performance</b>
                                    <br>{{ date('F', mktime(0, 0, 0, $month, 10)) }} 2021
                                </div>
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
                                                <th>Timeframe</th>
                                                <th>Weight</th>
                                                <th style="width: 40%; text-align: center;">Deviation from target</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($datacapaian as $datacapaian)
                                                <tr>
                                                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                                                    <td>
                                                        <b>{{ $datacapaian->so }}</b><br>
                                                        {{ $datacapaian->kpi }}
                                                    </td>
                                                    <td>{{ $datacapaian->timeframe_target }}</td>
                                                    <td>
                                                        {{ $datacapaian->weight }} %
                                                    </td>
                                                    <td style="text-align: center;">
                                                        @if ($datacapaian->score - 100 >= 0)
                                                            <span
                                                                class="badge badge-success">+{{ $datacapaian->score - 100 }}%</span>
                                                        @else
                                                            <span
                                                                class="badge badge-danger">{{ $datacapaian->score - 100 }}%</span>
                                                        @endif
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <button type="button" class="btn btn-primary btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#detailsCapaianModal{{ $loop->iteration }}">Details</button>
                                                    </td>
                                                </tr>

                                                <!--Modal Detail-->
                                                <!-- Large modal -->
                                                <div class="modal fade"
                                                    id="detailsCapaianModal{{ $loop->iteration }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Detail Capaian</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlTextarea1">Strategic
                                                                        Objective
                                                                        :</label>
                                                                    <textarea class="form-control"
                                                                        id="exampleFormControlTextarea1" rows="2"
                                                                        readonly="">{{ $datacapaian->so }}</textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlTextarea1">KPI :</label>
                                                                    <textarea class="form-control"
                                                                        id="exampleFormControlTextarea1" rows="2"
                                                                        readonly="">{{ $datacapaian->kpi }}</textarea>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputEmail4">Target :</label>
                                                                        <input type="text" class="form-control"
                                                                            value="@if ($datacapaian->unit == 'Rp' || $datacapaian->unit == 'rp' || $datacapaian->unit == 'RP')Rp {{ $datacapaian->target }},-@else{{ $datacapaian->target }} {{ $datacapaian->unit }}@endif" readonly>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputPassword4">Capaian :</label>
                                                                        <input type="text" class="form-control"
                                                                            value="@if ($datacapaian->unit == 'Rp' || $datacapaian->unit == 'rp' || $datacapaian->unit == 'RP')Rp {{ $datacapaian->capaian }},-@else{{ $datacapaian->capaian }} {{ $datacapaian->unit }}@endif" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputEmail4">Polarization :</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $datacapaian->polarization }}"
                                                                            readonly>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputPassword4">Deviation from target :</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $datacapaian->score - 100 }}%" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
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

    </div>
    <!-- /.container-fluid -->

@endsection

@section('script')
    <!--chart.JS-->
    <script>
        new Chart(document.getElementById("yearlychart"), {
            type: 'line',
            data: {
                labels: <?php echo $bulanChart; ?>,
                datasets: [{
                    label: "Deviation from target",
                    type: "line",
                    backgroundColor: "rgba(0,0,0,0.0)",
                    pointStyle: 'circle',
                    pointBackgroundColor: "rgba(135, 160, 206)",
                    pointRadius: 10,
                    pointHoverRadius: 15,
                    borderColor: "rgba(135, 160, 206)",
                    data: <?php echo $capaianChart; ?>,
                    tension: 0.0,
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
        });
    </script>

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
                } else if (value > 100) {
                    bar.setText(value);
                } else {
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
        bar.animate({{ $bulanScore }});
        //    bar.animate({{ $bulanScore }}); // Number from 0.0 to 1.0
    </script>

    <!--Line Chart JS-->
@endsection
