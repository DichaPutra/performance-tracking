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
            <li class="breadcrumb-item active" aria-current="page">Initiative</li>
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
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">KPI</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" rows="4" readonly="">Cash Rasio - Kemampuan perusahaan dalam menyediakan uang tunai atau setara kas dibandingkan dengan tingkat kewajiban lancar (kurang dari setahun)</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Card 1-->
            <div class="card shadow mb-4 animated--grow-in">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h5 class="m-0 font-weight-bold text-primary">Initiative</h5>
                    <button class="btn btn-sm btn-primary float-right" data-bs-toggle="modal" data-bs-target="#modalAdd"><i class="fas fa-plus"></i></button>
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
                                    <label for="exampleFormControlSelect1">Business Categories :</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>Accounting & Tax Services</option>
                                        <option>Arts, Culture & Entertainment</option>
                                        <option>Auto Sales & Service</option>
                                        <option>Banking & Finance</option>
                                        <option>Business Services</option>
                                        <option>Community Organizations</option>
                                        <option>Dentists & Orthodontists</option>
                                        <option>Education</option>
                                        <option>Health & Wellness</option>
                                        <option>Health Care</option>
                                        <option>Home Improvement</option>
                                        <option>Insurance</option>
                                        <option>Internet & Web Services</option>
                                        <option>Legal Services</option>
                                        <option>Lodging & Travel</option>
                                        <option>Marketing & Advertising</option>
                                        <option>News & Media</option>
                                        <option>Pet Services</option>
                                        <option>Real Estate</option>
                                        <option>Restaurants & Nightlife</option>
                                        <option>Shopping & Retail</option>
                                        <option>Sports & Recreation</option>
                                        <option>Transportation</option>
                                        <option>Utilities</option>
                                        <option>Wedding, Events & Meetings</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Strategic Objective :</label>
                                    <select multiple class="form-control" id="exampleFormControlSelect2" size="10">
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

                <!-- Card Body -->
                <div class="card-body">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead style="background-color: #F8F9FC;">
                            <tr>
                                <th style="text-align: center;">No</th>
                                <th>Initiative</th>
                                <th>Action Plan</th>
                                <th style="width: 10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: center;">1</td>
                                <td>Return on Equity (ROE) - Tingkat pengembalian atas modal yang telah ditanamkan</td>
                                <td style="text-align: center;">5</td>
                                <td>
                                    <a href="{{route('client.initiative.actionplan')}}"><button class="btn btn-primary btn-sm">Details</button></a>
                                    <a href="#" onclick="return confirm('All Action Plan related data will be deleted, Are you sure you want to delete this Initiative ? ');"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">2</td>
                                <td>Return on Investment (ROI) - Tingkat pengembalian atas investasi yang telah ditanamkan</td>
                                <td style="text-align: center;">3</td>
                                <td>
                                    <a href="{{route('client.initiative.actionplan')}}"><button class="btn btn-primary btn-sm">Details</button></a>
                                    <a href="#" onclick="return confirm('All Action Plan related data will be deleted, Are you sure you want to delete this Initiative ? ');"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a>
                                </td>
                            </tr> 
                            <tr>
                                <td style="text-align: center;">3</td>
                                <td>Tingkat Kesehatan (Standar BUMN) - Kinerja berdasarkan atas sekumpulan indikator Keuangan,  Operasional dan Administratif sesuai standard yang ditentukan oleh BUMN. Indikator Keuangan  meliputi ROE, ROI, CASH RATIO, Current Ratio, Collection Periode, Perputaran Persediaan, Perputaran Total Asset, Rasio Modal Sendiri thd Total Aktiv Sedangkan indikator operasional adalah berkaitan dengan produktivitas tanaman, rendemen, % produk berkualitas tinggi serta penjualan langsung.</td>
                                <td style="text-align: center;">2</td>
                                <td>
                                    <a href="{{route('client.initiative.actionplan')}}"><button class="btn btn-primary btn-sm">Details</button></a>
                                    <a href="#" onclick="return confirm('All Action Plan related data will be deleted, Are you sure you want to delete this Initiative ? ');"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a>
                                </td>
                            </tr> 
                            <tr>
                                <td style="text-align: center;">4</td>
                                <td>Cash Rasio - Kemampuan perusahaan dalam menyediakan uang tunai atau setara kas dibandingkan dengan tingkat kewajiban lancar (kurang dari setahun)</td>
                                <td style="text-align: center;">5</td>
                                <td>
                                    <a href="{{route('client.initiative.actionplan')}}"><button class="btn btn-primary btn-sm">Details</button></a>
                                    <a href="#" onclick="return confirm('All Action Plan related data will be deleted, Are you sure you want to delete this Initiative ? ');"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a>
                                </td>
                            </tr> 
                            <tr>
                                <td style="text-align: center;">5</td>
                                <td>Current Ratio - Kemampuan perusahaan dalam menjaga aktiva lancar sehingga  kewajiban lancar (kurang dari setahun) selalu dapat terpenuhi </td>
                                <td style="text-align: center;">3</td>
                                <td>
                                    <a href="{{route('client.initiative.actionplan')}}"><button class="btn btn-primary btn-sm">Details</button></a>
                                    <a href="#" onclick="return confirm('All Action Plan related data will be deleted, Are you sure you want to delete this Initiative ? ');"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a>
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
@endsection
