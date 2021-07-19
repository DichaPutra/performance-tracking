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
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
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
                                <canvas id="yearlychart" width="100%" height="35%"></canvas>
                            </div>
                        </div>
                    </div><br><br><br>


                    <!-- Card Header - Dropdown -->
                    @if ($month == null)
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class="m-0 font-weight-bold text-primary" style="text-align: center;">Monthly Details</h5>
                        <!-- Button trigger modal -->
                        <form method="get" action="{{route('client.performancereport.details')}}" style="width: 20%;">
                            <input type="hidden" name="user_id" value="{{$data->id}}">
                            <input type="hidden" name="periode_th" value="{{$periode_th}}">
                            <select name="month" class="form-control form-control-sm float-right" onchange="this.form.submit()">
                                @foreach ($dropdownbln as $bln)
                                <option value="{{$bln->bulan}}">{{date('F', mktime(0, 0, 0, $bln->bulan, 10))}}</option>
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
                                @foreach ($dropdownbln as $bln)
                                <option value="{{$bln->bulan}}" @if($bln->bulan==$month) selected @endif>{{date('F', mktime(0, 0, 0, $bln->bulan, 10))}}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>


                    <!-- Card Body -->
                    <div class="card-body">

                        <div class="text-center"><b>Overall Performance</b> <br>May 2021</div>
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
                                        <th style="width: 52%;">Strategic Objective</th>
                                        <th style="width: 40%;">Performance</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="text-align: center;">1</td>
                                        <td>
                                            <b>Peningkatan Company Value</b><br>
                                            Manajemen dari waktu ke waktu terus berusaha untuk meningkatkan kinerja
                                            perusahaan untuk meningkatkan nilai perusahaan sehingga harapan dari
                                            pemegang saham dan seluruh stakeholder yang lain dapat dipenuhi
                                        </td>
                                        <td style="text-align: center;">
                                            <h4 class="small font-weight-bold">Peningkatan Company Value <span
                                                    class="float-right">20%</span></h4>
                                            <div class="progress mb-4">
                                                <div class="progress-bar bg-danger" role="progressbar"
                                                     style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td style="text-align:center;"><a
                                                href="{{ route('client.performancereport.kpi') }}"><button
                                                    class="btn btn-primary btn-sm">Details</button></a></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;">2</td>
                                        <td>
                                            <b>Optimalisasi Cash Flow</b><br>
                                            Dalam mengelola perusahaan maka faktor cash flow menjadi kunci utama dalam
                                            keberlangsungan bisnis. Perusahaan boleh jadi memperoleh laba, namun jika
                                            tidak ada cash flow maka kegiatan usaha dapat berhenti. Cash flow yang baik
                                            dapat menjaga kepercayaan perusahaan terhadap pihak yang berkepentingan
                                            (kreditor, pemegang saham, karyawan) dengan selalu menjaga komitmen
                                            pembayaran tepat pada waktunya
                                        </td>
                                        <td style="text-align: center;">
                                            <h4 class="small font-weight-bold">Optimalisasi Cash Flow <span
                                                    class="float-right">40%</span></h4>
                                            <div class="progress mb-4">
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                     style="width: 40%" aria-valuenow="40" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td style="text-align:center;"><a
                                                href="{{ route('client.performancereport.kpi') }}"><button
                                                    class="btn btn-primary btn-sm">Details</button></a></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;">3</td>
                                        <td><b>Efisiensi dan efektivitas biaya</b><br>
                                            Cerminan dari upaya manajemen dalam melakukan efisiensi biaya dan
                                            efektivitas biaya yang tercermin dari ukuran-ukuran keuangan yang dapat
                                            menggambarkan pertumbuhan biaya yang dapat dikendalikan dengan baik
                                        </td>
                                        <td style="text-align: center;">
                                            <h4 class="small font-weight-bold">Efisiensi dan efektivitas biaya <span
                                                    class="float-right">100%</span></h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                     style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td style="text-align:center;"><a
                                                href="{{ route('client.performancereport.kpi') }}"><button
                                                    class="btn btn-primary btn-sm">Details</button></a></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;">4</td>
                                        <td><b>Peningkatan Profit</b><br>
                                            Upaya manajemen dalam meningkatkan tingkat keuntungan
                                        </td>
                                        <td style="text-align: center;">
                                            <h4 class="small font-weight-bold">Peningkatan Profit <span
                                                    class="float-right">100%</span></h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                     style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td style="text-align:center;"><a
                                                href="{{ route('client.performancereport.kpi') }}"><button
                                                    class="btn btn-primary btn-sm">Details</button></a></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;">5</td>
                                        <td><b>Peningkatan Total Pendapatan</b><br>
                                            Upaya manajemen dalam meningkatkan tingkat pendapatan dari seluruh usaha
                                            yang dilakukan oleh perusahaan baik berupa hasil penjualan seluruh produk
                                            serta pendapatan jasa.

                                        </td>
                                        <td style="text-align: center;">
                                            <h4 class="small font-weight-bold">Peningkatan Total Pendapatan <span
                                                    class="float-right">100%</span></h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                     style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td style="text-align:center;"><a
                                                href="{{ route('client.performancereport.kpi') }}"><button
                                                    class="btn btn-primary btn-sm">Details</button></a></td>
                                    </tr>
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
    strokeWidth: 6,
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
    bar.setText('');
    } else {
    bar.setText(value);
    //bar.setText(value + ' %');
    }

    bar.text.style.color = state.color;
    }
    });
    bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
    bar.text.style.fontSize = '2rem';
    bar.animate({{$bulanScore}}); // Number from 0.0 to 1.0
</script>

<!--Line Chart JS-->
@endsection
