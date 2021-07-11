@extends('layouts.app2')

@section('head')
<?php $page = 'target' ?>
@endsection

@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
<!--        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Target Tahunan</li>
            <li class="breadcrumb-item active" aria-current="page">Details</li>
        </ol>-->
    </nav>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-bullseye"></i> Target</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">

            <div class="card shadow mb-4 animated--grow-in">
                <!-- Card Header - Dropdown -->
<!--                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Target</h6>
                    <select class="form-control form-control-sm float-right" style="width: 20%;">
                        <option>January</option>
                        <option>February</option>
                        <option>March</option>
                        <option>April</option>
                        <option selected="">May</option>
                    </select>
                </div>-->

                <!-- Card Body -->
                <div class="card-body">

                    <br>
                    <!-- Card Header - Dropdown -->
                    <div class="card-header">
                        <h5 class="m-0 font-weight-bold text-primary" style="text-align: center;">Target KPI {{date('Y')}}</h5>
                    </div><br>


                    <!--KPI Table-->
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead style="background-color: #F8F9FC;">
                            <tr>
                                <th style="width: 8%; text-align: center;">No</th>
                                <th>Strategic Objective</th>
                                <th>KPI</th>
                                <th>Weight</th>
                                <th>Target</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: center;">1</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">2</td>
                                <td>
                                    <b>Return on Investment (ROI)</b><br>
                                    Tingkat pengembalian atas investasi yang telah ditanamkan
                                </td>
                                <td>60%</td>
                                <td><input type="text" class="form-control"></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">3</td>
                                <td><b>Tingkat Kesehatan (Standar BUMN)</b><br>
                                    Kinerja berdasarkan atas sekumpulan indikator Keuangan, Operasional dan Administratif sesuai standard yang ditentukan oleh BUMN. Indikator Keuangan meliputi ROE, ROI, CASH RATIO, Current Ratio, Collection Periode, Perputaran Persediaan, Perputaran Total Asset, Rasio Modal Sendiri thd Total Aktiv Sedangkan indikator operasional adalah berkaitan dengan produktivitas tanaman, rendemen, % produk berkualitas tinggi serta penjualan langsung.
                                </td>
                                <td>60%</td>
                                <td><input type="text" class="form-control"></td>
                            </tr>                          
                        </tbody>
                    </table>

                    <!--<button></button>-->
                    <button class="btn btn-primary float-right">Save</button>
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
