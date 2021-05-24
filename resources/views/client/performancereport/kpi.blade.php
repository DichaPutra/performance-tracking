@extends('layouts.app2')

@section('head')
<?php $page = 'performancereport' ?>

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
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4 animated--grow-in">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <!--                            <a href="{{ url()->previous() }}">
                                                    <button class="btn btn-primary">
                                                        <i class="fas fa-arrow-left"></i>
                                                    </button>
                                                </a>-->
                    <h5 class="m-0 font-weight-bold text-primary" style="text-align: center;">SO : Peningkatan Company Value</h5>
                    <!-- Button trigger modal -->
                    <select class="form-control form-control-sm float-right" style="width: 20%;">
                        <option>January</option>
                        <option>February</option>
                        <option>March</option>
                        <option>April</option>
                        <option selected="">May</option>
                    </select>
                </div>


                <!-- Card Body -->
                <div class="card-body">

                    <div class="text-center"><b>SO : Peningkatan Company Value</b> <br>May 2021</div>
                    <!--Performance Chart--> 
                    <div class="d-flex justify-content-center">
                        <link href="https://fonts.googleapis.com/css?family=Raleway:400,300,600,800,900" rel="stylesheet" type="text/css">
                        <div class="float-none" id="container"></div>
                    </div><br>


                    <!-- Content Row -->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead style="background-color: #F8F9FC;">
                                <tr>
                                    <th style="width: 8%; text-align: center;">No</th>
                                    <th style="width: 52%;">KPI</th>
                                    <th>Target</th>
                                    <th>Actual</th>
                                    <th style="width: 40%;">Performance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;">1</td>
                                    <td>
                                        <b>Return on Equity (ROE)</b><br>
                                        Tingkat pengembalian atas modal yang telah ditanamkan
                                    </td>
                                    <td>60%</td>
                                    <td>30%</td>
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
                                        <b>Return on Investment (ROI)</b><br>
                                        Tingkat pengembalian atas investasi yang telah ditanamkan
                                    </td>
                                    <td>60%</td>
                                    <td>30%</td>
                                    <td style="text-align: center;">
                                        <h4 class="small font-weight-bold">Optimalisasi Cash Flow <span class="float-right">30%</span></h4>
                                        <div class="progress mb-4">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">3</td>
                                    <td><b>Tingkat Kesehatan (Standar BUMN)</b><br>
                                        Kinerja berdasarkan atas sekumpulan indikator Keuangan, Operasional dan Administratif sesuai standard yang ditentukan oleh BUMN. Indikator Keuangan meliputi ROE, ROI, CASH RATIO, Current Ratio, Collection Periode, Perputaran Persediaan, Perputaran Total Asset, Rasio Modal Sendiri thd Total Aktiv Sedangkan indikator operasional adalah berkaitan dengan produktivitas tanaman, rendemen, % produk berkualitas tinggi serta penjualan langsung.
                                    </td>
                                    <td>60%</td>
                                    <td>30%</td>
                                    <td style="text-align: center;">
                                        <h4 class="small font-weight-bold">Efisiensi dan efektivitas biaya <span class="float-right">100%</span></h4>
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
        bar.animate({{0.3123}}); // Number from 0.0 to 1.0
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