@extends('layouts.app2')

@section('head')
<?php $page = 'kpi' ?>
@endsection

@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">KPI</li>
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
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
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
                            <div class="form-group row">
                                <label for="position" class="col-md-4 col-form-label text-md-right">Position</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" list="pos" value="Regional Director" disabled="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="position" class="col-md-4 col-form-label text-md-right">Number of KPIs</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" list="pos" value="5" disabled="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"></h1>
                        <a href="#" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-plus fa-sm text-white-50"></i> Add KPI
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
            </div>
        </div>

    </div>

</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable({
            "paging":false,
            "searching": false,
        });
    });
</script>
@endsection
