@extends('layouts.app2')

@section('head')
<?php $page = 'personnel' ?>
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Personnel</li>
            <li class="breadcrumb-item active" aria-current="page">Add Personnel</li>
        </ol>
    </nav><br>

    <!-- Page Heading -->
    <!--    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-user-alt"></i> Add personnel</h1>
        </div>-->

    <!-- Content Row -->
    <div class="card shadow mb-4 animated--grow-in">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Add Personnel</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control " name="name" value="" required="" autocomplete="name" autofocus="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control " name="email" value="" required="" autocomplete="email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control " name="password" required="" autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required="" autocomplete="new-password">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="form-group row">
                        <label for="level" class="col-md-4 col-form-label text-md-right">Level</label>
                        <div class="col-md-6">
                            <select class="form-select form-control" aria-label="Default select example">
                                <option value="0">0. Corporate</option>
                                <option value="1">1. Division</option>
                                <option value="2">2. Department</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="position" class="col-md-4 col-form-label text-md-right">Position</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" list="pos">
                            <datalist id="pos">
                                <option value="Corporate">
                                <option value="Finance">
                                <option value="Production">
                                <option value="Marketing">
                                <option value="Purchasing">
                                <option value="Inventory">
                            </datalist>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Company Name</label>
                        <div class="col-md-6">
                            <input name="companyname"type="text" class="form-control" value="PT Bintang Jaya Abadi" readonly="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Company  Address</label>
                        <div class="col-md-6">
                            <textarea class="form-control" rows="4" readonly="">Jl. Pati Unus No.33, RT.7/RW.8, Kuningan, Gunung, Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12120</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="float-right">
                <a href="{{ URL::previous() }}"><button type="button" class="btn btn-secondary">Cancel</button></a>
                <button type="button" class="btn btn-primary">Save</button>
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
