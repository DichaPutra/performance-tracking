@extends('layouts.app2')

@section('head')
<?php $page = 'initiative' ?>

@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Initiative</li>
            <li class="breadcrumb-item active" aria-current="page">KPI</li>
        </ol>
    </nav><br>

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">

            <!--Card 1-->
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
                    </div>
                </div>
            </div>

            <!--Card 2-->
            <div class="card shadow mb-4 animated--grow-in">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">KPI</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead style="background-color: #F8F9FC;">
                                <tr>
                                    <th style="text-align: center;">No</th>
                                    <th>KPI</th>
                                    <th>Initiative</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;">1</td>
                                    <td>Return on Equity (ROE) - Tingkat pengembalian atas modal yang telah ditanamkan</td>
                                    <td style="text-align: center;">5</td>
                                    <td><a href="{{route('client.initiative.initiative')}}"><button class="btn btn-primary btn-sm">Details</button></a></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">2</td>
                                    <td>Return on Investment (ROI) - Tingkat pengembalian atas investasi yang telah ditanamkan</td>
                                    <td style="text-align: center;">3</td>
                                    <td><a href="{{route('client.initiative.initiative')}}"><button class="btn btn-primary btn-sm">Details</button></a></td>
                                </tr> 
                                <tr>
                                    <td style="text-align: center;">3</td>
                                    <td>Tingkat Kesehatan (Standar BUMN) - Kinerja berdasarkan atas sekumpulan indikator Keuangan,  Operasional dan Administratif sesuai standard yang ditentukan oleh BUMN. Indikator Keuangan  meliputi ROE, ROI, CASH RATIO, Current Ratio, Collection Periode, Perputaran Persediaan, Perputaran Total Asset, Rasio Modal Sendiri thd Total Aktiv Sedangkan indikator operasional adalah berkaitan dengan produktivitas tanaman, rendemen, % produk berkualitas tinggi serta penjualan langsung.</td>
                                    <td style="text-align: center;">2</td>
                                    <td><a href="#"><button class="btn btn-primary btn-sm">Details</button></a></td>
                                </tr> 
                                <tr>
                                    <td style="text-align: center;">4</td>
                                    <td>Cash Rasio - Kemampuan perusahaan dalam menyediakan uang tunai atau setara kas dibandingkan dengan tingkat kewajiban lancar (kurang dari setahun)</td>
                                    <td style="text-align: center;">5</td>
                                    <td><a href="#"><button class="btn btn-primary btn-sm">Details</button></a></td>
                                </tr> 
                                <tr>
                                    <td style="text-align: center;">5</td>
                                    <td>Current Ratio - Kemampuan perusahaan dalam menjaga aktiva lancar sehingga  kewajiban lancar (kurang dari setahun) selalu dapat terpenuhi </td>
                                    <td style="text-align: center;">3</td>
                                    <td><a href="#"><button class="btn btn-primary btn-sm">Details</button></a></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <!--Card 3-->
            <div class="card shadow mb-4 animated--grow-in">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Chat</h6>
                </div>
            </div>

        </div>
    </div>
    <!-- /.container-fluid -->

    @endsection

    @section('script')
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
    @endsection
