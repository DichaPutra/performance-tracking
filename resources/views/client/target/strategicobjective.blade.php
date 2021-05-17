@extends('layouts.app2')

@section('head')
<?php $page = 'target' ?>
@endsection

@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Target</li>
            <li class="breadcrumb-item active" aria-current="page">Strategic Objective</li>
        </ol>
    </nav><br>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-chart-line"></i>  Strategic Objective</h1>
    </div>

    <ul class="nav nav-pills justify-content-end" style="margin-bottom: 20px;">
        <li class="nav-item">
            <a class="nav-link active button btn-sm" aria-current="page" href="{{route('client.target.strategicobjective')}}">Strategic Objective</a>
        </li>
        <li class="nav-item">
            <a class="nav-link button btn-sm" href="{{route('client.target.kpi')}}">KPI</a>
        </li>
        <li class="nav-item">
            <a class="nav-link button btn-sm" href="{{route('client.target.actionplan')}}">Action Plan</a>
        </li>
    </ul>   

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4 animated--grow-in">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Strategic Objective</h6>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalAdd">
                        <i class="fas fa-plus"></i>
                    </button>

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
                </div>


                <!-- Card Body -->
                <div class="card-body">
                    <!-- Content Row -->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead style="background-color: #F8F9FC;">
                                <tr>
                                    <th style="width: 10%; text-align: center;">No</th>
                                    <th style="width: 20%;">Strategic Objective</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;">1</td>
                                    <td>Peningkatan Company Value</td>
                                    <td>Manajemen dari waktu ke waktu terus berusaha untuk meningkatkan kinerja perusahaan untuk meningkatkan nilai perusahaan sehingga harapan dari pemegang saham dan seluruh stakeholder yang lain dapat dipenuhi</td>
                                    <td style="text-align: center;"><a href="{{route('client.personnel.detailpersonnel')}}"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">2</td>
                                    <td>Optimalisasi Cash Flow</td>
                                    <td>Dalam mengelola perusahaan maka faktor cash flow menjadi kunci utama dalam keberlangsungan bisnis. Perusahaan boleh jadi memperoleh laba, namun jika tidak ada cash flow maka kegiatan usaha dapat berhenti. Cash flow yang baik dapat menjaga kepercayaan perusahaan terhadap pihak yang berkepentingan (kreditor, pemegang saham, karyawan) dengan selalu menjaga komitmen pembayaran tepat pada waktunya</td>
                                    <td style="text-align: center;"><a href="{{route('client.personnel.detailpersonnel')}}"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">3</td>
                                    <td>Efisiensi dan efektivitas biaya</td>
                                    <td>Cerminan dari upaya manajemen dalam melakukan efisiensi biaya dan efektivitas biaya yang tercermin dari ukuran-ukuran keuangan yang dapat menggambarkan pertumbuhan biaya yang dapat dikendalikan dengan baik</td>
                                    <td style="text-align: center;"><a href="{{route('client.personnel.detailpersonnel')}}"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">4</td>
                                    <td>Peningkatan Profit</td>
                                    <td>Upaya manajemen dalam meningkatkan tingkat keuntungan</td>
                                    <td style="text-align: center;"><a href="{{route('client.personnel.detailpersonnel')}}"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">5</td>
                                    <td>Peningkatan Total Pendapatan</td>
                                    <td>Upaya manajemen dalam meningkatkan tingkat pendapatan dari seluruh usaha yang dilakukan oleh perusahaan baik berupa hasil penjualan seluruh produk serta pendapatan jasa.</td>
                                    <td style="text-align: center;"><a href="{{route('client.personnel.detailpersonnel')}}"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a></td>
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
