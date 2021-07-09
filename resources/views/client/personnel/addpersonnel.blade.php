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
            @if($errors->all() != NULL)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach 
                </ul>
            </div>
            @endif

            <form method="POST" action="{{route('client.personnel.store')}}" >
                <div class="row">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control " name="name" placeholder=""value="" required="" autocomplete="name" autofocus="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="position" class="col-md-4 col-form-label text-md-right" >Position</label>
                            <div class="col-md-6">
                                <input name="position"type="text" class="form-control" placeholder="Jabatan PIC ..." >
                                <!--<datalist id="pos">
                                    <option value="Corporate">
                                    <option value="Finance">
                                    <option value="Production">
                                    <option value="Marketing">
                                    <option value="Purchasing">
                                    <option value="Inventory">
                                </datalist>-->
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
                                <select name="level" class="form-select form-control" aria-label="Default select example">
                                    <option value="0">0. Corporate</option>
                                    <option value="1">1. Division</option>
                                    <option value="2">2. Department</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="position" class="col-md-4 col-form-label text-md-right">Level Name</label>
                            <div class="col-md-6">
                                <input name="level_name"type="text" class="form-control" placeholder="Nama Divisi / Departemen ...">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Company Name</label>
                            <div class="col-md-6">
                                <input name="company_name"type="text" class="form-control" value="{{Auth::user()->company_name}}" readonly="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Company  Address</label>
                            <div class="col-md-6">
                                <textarea name="company_address"class="form-control" rows="4" readonly="">{{Auth::user()->company_address}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="float-right">
                    <a href="{{ URL::previous() }}"><button type="button" class="btn btn-secondary">Cancel</button></a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
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
