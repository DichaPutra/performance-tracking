@extends('layouts.app2')

@section('head')
<?php $page = 'target' ?>
@endsection

@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Target</li>
            <li class="breadcrumb-item active" aria-current="page">KPI</li>
        </ol>
    </nav><br>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-chart-line"></i>  KPI</h1>
    </div>

    <ul class="nav nav-pills justify-content-end" style="margin-bottom: 20px;">
        <li class="nav-item">
            <a class="nav-link button btn-sm" aria-current="page" href="{{route('client.target.strategicobjective')}}">Strategic Objective</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active button btn-sm" href="{{route('client.target.kpi')}}">KPI</a>
        </li>
        <li class="nav-item">
            <a class="nav-link button btn-sm" href="{{route('client.target.actionplan')}}">Action Plan</a>
        </li>
    </ul>   

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4 animated--grow-in">
                <!-- Card Body -->
                <div class="card-body">
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <b>Objective :</b> Peningkatan Company Value
                                    </button>
                                    <button class="btn btn-sm btn-primary float-right" data-bs-toggle="modal" data-bs-target="#modalAdd"><i class="fas fa-plus"></i></button>
                                </h5>
                            </div>

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
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Strategic Objective :</label>
                                                <input type="text" value="Peningkatan Company Value" class="form-control" readonly="">
                                            </div><br>

                                            <div class="form-group">
                                                <label for="exampleFormControlSelect2">Key Performance Indicator :</label>
                                                <select class="form-control" id="exampleFormControlSelect2" size="10">
                                                    <option>Peningkatan Company Value</option>
                                                    <option>Optimalisasi Cash Flow</option>
                                                    <option>Efisiensi dan efektivitas biaya</option>
                                                    <option>Peningkatan Profit</option>
                                                    <option>Peningkatan Total Pendapatan</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Add</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead style="background-color: #F8F9FC;">
                                                <tr>
                                                    <th style="text-align: center;">No</th>
                                                    <th>KPI</th>
                                                    <th>Unit of Measurement</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="text-align: center;">1</td>
                                                    <td>Return on Equity (ROE) - Tingkat pengembalian atas modal yang telah ditanamkan</td>
                                                    <td style="text-align: center;">%</td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: center;">2</td>
                                                    <td>Return on Investment (ROI) - Tingkat pengembalian atas investasi yang telah ditanamkan</td>
                                                    <td style="text-align: center;">%</td>
                                                </tr> 
                                                <tr>
                                                    <td style="text-align: center;">3</td>
                                                    <td>Tingkat Kesehatan (Standar BUMN) - Kinerja berdasarkan atas sekumpulan indikator Keuangan,  Operasional dan Administratif sesuai standard yang ditentukan oleh BUMN. Indikator Keuangan  meliputi ROE, ROI, CASH RATIO, Current Ratio, Collection Periode, Perputaran Persediaan, Perputaran Total Asset, Rasio Modal Sendiri thd Total Aktiv Sedangkan indikator operasional adalah berkaitan dengan produktivitas tanaman, rendemen, % produk berkualitas tinggi serta penjualan langsung.</td>
                                                    <td style="text-align: center;">Score</td>
                                                </tr> 
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <b>Objective :</b> Optimalisasi Cash Flow
                                    </button>
                                    <button class="btn btn-sm btn-primary float-right"><i class="fas fa-plus"></i></button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead style="background-color: #F8F9FC;">
                                                <tr>
                                                    <th style="text-align: center;">No</th>
                                                    <th>KPI</th>
                                                    <th>Unit of Measurement</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="text-align: center;">4</td>
                                                    <td>Cash Rasio - Kemampuan perusahaan dalam menyediakan uang tunai atau setara kas dibandingkan dengan tingkat kewajiban lancar (kurang dari setahun)</td>
                                                    <td style="text-align: center;">%</td>
                                                </tr> 
                                                <tr>
                                                    <td style="text-align: center;">5</td>
                                                    <td>Current Ratio - Kemampuan perusahaan dalam menjaga aktiva lancar sehingga  kewajiban lancar (kurang dari setahun) selalu dapat terpenuhi </td>
                                                    <td style="text-align: center;">%</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree" data-toggle="collapse" data-target="#collapseThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <b>Objective :</b> Efisiensi dan efektivitas biaya
                                    </button>
                                    <button class="btn btn-sm btn-primary float-right"><i class="fas fa-plus"></i></button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead style="background-color: #F8F9FC;">
                                                <tr>
                                                    <th style="text-align: center;">No</th>
                                                    <th>KPI</th>
                                                    <th>Unit of Measurement</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="text-align: center;">6</td>
                                                    <td>% Pertumbuhan Biaya - Pertumbuhan biaya antar periode mencerminkan apakah perusahaan semakin efisien atau tidak. Selama pertumbuhan biaya masih lebih kecil dibandingkan dengan pertumbuhan revenue maka dapat dikatakan perusahaan dapat mengelola kinerja secara lebih efisien.</td>
                                                    <td style="text-align: center;">%</td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: center;">7</td>
                                                    <td>Net Margin - Kemampuan perusahaan dalam mengelola biaya akan berdampak kepada net margin yang semakin tinggi</td>
                                                    <td style="text-align: center;">%</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
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
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">KPI</h6>

                    <button class="btn btn-sm btn-primary"><i class="fas fa-plus"></i></button>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!-- Content Row -->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead style="background-color: #F8F9FC;">
                                <tr>
                                    <th style="text-align: center;">No</th>
                                    <th>Strategic Objective</th>
                                    <th>KPI</th>
                                    <th>Unit of Measurement</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;">1</td>
                                    <td>Peningkatan Company Value</td>
                                    <td>Return on Equity (ROE) - Tingkat pengembalian atas modal yang telah ditanamkan</td>
                                    <td style="text-align: center;">%</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">2</td>
                                    <td>Peningkatan Company Value</td>
                                    <td>Return on Investment (ROI) - Tingkat pengembalian atas investasi yang telah ditanamkan</td>
                                    <td style="text-align: center;">%</td>
                                </tr> 
                                <tr>
                                    <td style="text-align: center;">3</td>
                                    <td>Peningkatan Company Value</td>
                                    <td>Tingkat Kesehatan (Standar BUMN) - Kinerja berdasarkan atas sekumpulan indikator Keuangan,  Operasional dan Administratif sesuai standard yang ditentukan oleh BUMN. Indikator Keuangan  meliputi ROE, ROI, CASH RATIO, Current Ratio, Collection Periode, Perputaran Persediaan, Perputaran Total Asset, Rasio Modal Sendiri thd Total Aktiv Sedangkan indikator operasional adalah berkaitan dengan produktivitas tanaman, rendemen, % produk berkualitas tinggi serta penjualan langsung.</td>
                                    <td style="text-align: center;">Score</td>
                                </tr> 
                                <tr>
                                    <td style="text-align: center;">4</td>
                                    <td>Optimalisasi Cash Flow</td>
                                    <td>Cash Rasio - Kemampuan perusahaan dalam menyediakan uang tunai atau setara kas dibandingkan dengan tingkat kewajiban lancar (kurang dari setahun)</td>
                                    <td style="text-align: center;">%</td>
                                </tr> 
                                <tr>
                                    <td style="text-align: center;">5</td>
                                    <td>Optimalisasi Cash Flow</td>
                                    <td>Current Ratio - Kemampuan perusahaan dalam menjaga aktiva lancar sehingga  kewajiban lancar (kurang dari setahun) selalu dapat terpenuhi </td>
                                    <td style="text-align: center;">%</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">6</td>
                                    <td>Efisiensi dan efektivitas biaya</td>
                                    <td>% Pertumbuhan Biaya - Pertumbuhan biaya antar periode mencerminkan apakah perusahaan semakin efisien atau tidak. Selama pertumbuhan biaya masih lebih kecil dibandingkan dengan pertumbuhan revenue maka dapat dikatakan perusahaan dapat mengelola kinerja secara lebih efisien.</td>
                                    <td style="text-align: center;">%</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">7</td>
                                    <td>Efisiensi dan efektivitas biaya</td>
                                    <td>Net Margin - Kemampuan perusahaan dalam mengelola biaya akan berdampak kepada net margin yang semakin tinggi</td>
                                    <td style="text-align: center;">%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
