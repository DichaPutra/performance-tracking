@extends('layouts.app2')

@section('head')
<?php $page = 'performancereport' ?>

<style>
    #container {
        margin: 20px;
        width: 200px;
        height: 100px;
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
                                    <input id="name" type="text" class="form-control " name="name" value="0. Corporate" required="" autocomplete="name" autofocus="" disabled="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="position" class="col-md-4 col-form-label text-md-right">Position</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" list="pos" value="Corporate" disabled="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">PIC Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control " name="name" value="Charde Marshall" required="" autocomplete="name" autofocus="" disabled="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control " name="email" value="chardemarshall@mail.com" required="" autocomplete="email" disabled="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="position" class="col-md-4 col-form-label text-md-right">Number of SO</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" list="pos" value="5" disabled="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="position" class="col-md-4 col-form-label text-md-right">Number of KPI</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" list="pos" value="15" disabled="">
                                </div>
                            </div>
                        </div>
                    </div><br>

                    <!--TABS--> 
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Performance Report</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Yearly</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <!-- ========= Tab 1 Performance Report =========== -->
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <br>

                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;"> </h6>
                                <h5 class="m-0 font-weight-bold text-primary" style="text-align: center;">Performance Report</h5>
                                <!-- Button trigger modal -->
                                <select class="form-control form-control-sm float-right" style="width: 20%;">
                                    <option>January</option>
                                    <option>February</option>
                                    <option>March</option>
                                    <option>April</option>
                                    <option>May</option>
                                </select>
                            </div>


                            <!-- Card Body -->
                            <div class="card-body">

                                <!--Performance Chart--> 
                                <link href="https://fonts.googleapis.com/css?family=Raleway:400,300,600,800,900" rel="stylesheet" type="text/css">
                                <div class="float-none" id="container"></div>

                                <!-- Content Row -->
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead style="background-color: #F8F9FC;">
                                            <tr>
                                                <th style="width: 8%; text-align: center;">No</th>
                                                <th style="width: 52%;">Strategic Objective</th>
                                                <th style="width: 40%;">Performance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="text-align: center;">1</td>
                                                <td>
                                                    <b>Peningkatan Company Value</b><br>
                                                    Manajemen dari waktu ke waktu terus berusaha untuk meningkatkan kinerja perusahaan untuk meningkatkan nilai perusahaan sehingga harapan dari pemegang saham dan seluruh stakeholder yang lain dapat dipenuhi
                                                </td>
                                                <td style="text-align: center;">
                                                    <h4 class="small font-weight-bold">Peningkatan Company Value <span class="float-right">20%</span></h4>
                                                    <div class="progress mb-4">
                                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">2</td>
                                                <td>
                                                    <b>Optimalisasi Cash Flow</b><br>
                                                    Dalam mengelola perusahaan maka faktor cash flow menjadi kunci utama dalam keberlangsungan bisnis. Perusahaan boleh jadi memperoleh laba, namun jika tidak ada cash flow maka kegiatan usaha dapat berhenti. Cash flow yang baik dapat menjaga kepercayaan perusahaan terhadap pihak yang berkepentingan (kreditor, pemegang saham, karyawan) dengan selalu menjaga komitmen pembayaran tepat pada waktunya
                                                </td>
                                                <td style="text-align: center;">
                                                    <h4 class="small font-weight-bold">Optimalisasi Cash Flow <span class="float-right">40%</span></h4>
                                                    <div class="progress mb-4">
                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">3</td>
                                                <td><b>Efisiensi dan efektivitas biaya</b><br>
                                                    Cerminan dari upaya manajemen dalam melakukan efisiensi biaya dan efektivitas biaya yang tercermin dari ukuran-ukuran keuangan yang dapat menggambarkan pertumbuhan biaya yang dapat dikendalikan dengan baik
                                                </td>
                                                <td style="text-align: center;">
                                                    <h4 class="small font-weight-bold">Efisiensi dan efektivitas biaya <span class="float-right">100%</span></h4>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">4</td>
                                                <td><b>Peningkatan Profit</b><br>
                                                    Upaya manajemen dalam meningkatkan tingkat keuntungan
                                                </td>
                                                <td style="text-align: center;">
                                                    <h4 class="small font-weight-bold">Peningkatan Profit <span class="float-right">100%</span></h4>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">5</td>
                                                <td><b>Peningkatan Total Pendapatan</b><br>
                                                    Upaya manajemen dalam meningkatkan tingkat pendapatan dari seluruh usaha yang dilakukan oleh perusahaan baik berupa hasil penjualan seluruh produk serta pendapatan jasa.

                                                </td>
                                                <td style="text-align: center;">
                                                    <h4 class="small font-weight-bold">Peningkatan Total Pendapatan <span class="float-right">100%</span></h4>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>    
                                                </td>
                                            </tr>                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>
                        <!--end of tab 1-->


                        <!-- ========== Tab 2 Yearly ========== -->
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <br>
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Performance in 2021</h6>
                                <select class="form-control form-control-sm float-right" style="width: 20%;">
                                    <option>2018</option>
                                    <option>2019</option>
                                    <option>2020</option>
                                    <option selected="">2021</option>
                                </select>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="myAreaChart"></canvas>
                                </div>
                            </div>

                        </div>
                        <!--end of tab 2-->
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

@endsection

@section('script')

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
            from: {color: '#FF0000'},
            to: {color: '##00FF00'},
            // Set default step function for all animate calls
            step: (state, bar) => {
    bar.path.setAttribute('stroke', state.color);
    var value = Math.round(bar.value() * 100);
    if (value === 0) {
    bar.setText('');
    } else {
    bar.setText(value + ' %');
    }

    bar.text.style.color = state.color;
    }
    });
    bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
    bar.text.style.fontSize = '2rem';
    bar.animate({{0.7564}}); // Number from 0.0 to 1.0
</script>

<!--Line Chart JS--> 
<script>
// Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';
    function number_format(number, decimals, dec_point, thousands_sep) {
    // *     example: number_format(1234.56, 2, ',', ' ');
    // *     return: '1 234,56'
    number = (number + '').replace(',', '').replace(' ', '');
    var n = !isFinite( + number) ? 0 : + number,
            prec = !isFinite( + decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
            };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
    }

// Area Chart Example
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
    type: 'line',
            data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                    label: "Performance",
                            lineTension: 0.3,
                            backgroundColor: "rgba(78, 115, 223, 0.05)",
                            borderColor: "rgba(78, 115, 223, 1)",
                            pointRadius: 3,
                            pointBackgroundColor: "rgba(78, 115, 223, 1)",
                            pointBorderColor: "rgba(78, 115, 223, 1)",
                            pointHoverRadius: 3,
                            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                            pointHitRadius: 10,
                            pointBorderWidth: 2,
                            data: [70, 80, 97, 90, 68, 87, 70, 90, , , , ],
                    }],
            },
            options: {
            maintainAspectRatio: false,
                    layout: {
                    padding: {
                    left: 10,
                            right: 25,
                            top: 25,
                            bottom: 0
                    }
                    },
                    scales: {
                    xAxes: [{
                    time: {
                    unit: 'date'
                    },
                            gridLines: {
                            display: false,
                                    drawBorder: false
                            },
                            ticks: {
                            maxTicksLimit: 7
                            }
                    }],
                            yAxes: [{
                            ticks: {
                            maxTicksLimit: 5,
                                    padding: 10,
                                    // Include a dollar sign in the ticks
                                    callback: function (value, index, values) {
                                    return  number_format(value) + '%';
                                    }
                            },
                                    gridLines: {
                                    color: "rgb(234, 236, 244)",
                                            zeroLineColor: "rgb(234, 236, 244)",
                                            drawBorder: false,
                                            borderDash: [2],
                                            zeroLineBorderDash: [2]
                                    }
                            }],
                    },
                    legend: {
                    display: false
                    },
                    tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                            bodyFontColor: "#858796",
                            titleMarginBottom: 10,
                            titleFontColor: '#6e707e',
                            titleFontSize: 14,
                            borderColor: '#dddfeb',
                            borderWidth: 1,
                            xPadding: 15,
                            yPadding: 15,
                            displayColors: false,
                            intersect: false,
                            mode: 'index',
                            caretPadding: 10,
                            callbacks: {
                            label: function (tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ':' + number_format(tooltipItem.yLabel) + '%';
                            }
                            }
                    }
            }
    });
</script>
@endsection