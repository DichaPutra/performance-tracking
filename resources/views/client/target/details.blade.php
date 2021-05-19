@extends('layouts.app2')

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

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Strategic Objective</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">KPI</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <!--Tab 1 Strategic Objective-->
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <br><br>
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h3 mb-0 text-gray-800"></h1>
                                <a href="#" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                    <i class="fas fa-plus fa-sm text-white-50"></i> Add SO
                                </a>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead style="background-color: #F8F9FC;">
                                        <tr>
                                            <th style="text-align: center;" >No</th>
                                            <th style="text-align: center;" >KPI Name</th>
                                            <th style="text-align: center;" >Unit Measure</th>
                                            <th style="text-align: center;" >Target</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center;">1</td>
                                            <td>% penilaian keamanan, khasiat, dan mutu Obat dan Produk Biologi yang diselesaikan tepat waktu</td>
                                            <td style="text-align: center;">%</td>
                                            <td style="text-align: center;">3</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">2</td>
                                            <td>Brand Image adalah indeks yang diperoleh dari survey merek untuk menentukan kekuatan merek di mata pembeli. Semakin kuat merek maka efek differensiasi akan lebih kuat dan harga menjadi variabel yang lebih dapat dikendalikan dan tidak terjebak dalam persaingan komoditi</td>
                                            <td style="text-align: center;">%</td>
                                            <td style="text-align: center;">3</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">3</td>
                                            <td>Ashton Cox</td>
                                            <td style="text-align: center;">3</td>
                                            <td style="text-align: center;">3</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">4</td>
                                            <td>Jena Gaines</td>
                                            <td style="text-align: center;">3</td>
                                            <td style="text-align: center;">3</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">5</td>
                                            <td>Quinn Flynn</td>
                                            <td style="text-align: center;">3</td>
                                            <td style="text-align: center;">3</td>
                                        </tr>                             
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--end of tab 1-->
                        <!-- ** Tab 2 KPI ** -->
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <br><br>
                            <!--KPI per SO-->
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" style="background-color: #FEE599">
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
</script>
@endsection
