@extends('layouts.app2')

@section('head')
<?php $page = 'personnel' ?>
@endsection

@section('content')

<!-- PHP Part-->
<?php

function levelName($level)
{
    switch ($level)
    {
        case 0:
            return "0. Corporate";
            break;
        case 1:
            return "1. Division";
            break;
        case 2:
            return "2. Departement";
            break;
    }
}
?>
<!--end of PHP part-->

<!-- Begin Page Content -->
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"> Personnel</li>
            @if($edit == 1)
            <li class="breadcrumb-item active" aria-current="page"> Edit</li>
            @else
            <li class="breadcrumb-item active" aria-current="page"> Details</li>
            @endif
        </ol>
    </nav><br>

    <!-- Page Heading -->
    <!--    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-user-alt"></i> Details</h1>
        </div>-->

    <!-- Content Row -->
    <div class="card shadow mb-4 animated--grow-in">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

            @if($edit == 0)
            <h6 class="m-0 font-weight-bold text-primary">Details</h6>
            <div class="float-right">
                <a href="{{route('client.personnel.editpersonnel', ['idpersonnel'=>$data->id])}}"><button class="btn btn-sm btn-primary">Edit</button></a>
                <a href="#" onclick="return confirm('All personnel related data will be deleted, Are you sure you want to delete this personnel? ');" ><button class="btn btn-sm btn-danger">Delete</button></a>
            </div>
            @else
            <h6 class="m-0 font-weight-bold text-primary">Edit</h6>
            @endif
        </div>
        <!-- Card Body -->
        <div class="card-body">

            <!--Error Message-->
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

            <!--Success Message--> 
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session('success') }}
            </div>
            @endif

            <!--Form Update personnel-->
            <form method="POST" action="{{route('client.personnel.update')}}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" name="id" value="{{$data->id}}">
                        @if($edit == 0)
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control " name="name" value="{{$data->name}}" required="" autocomplete="name" autofocus="" disabled="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="position"  class="col-md-4 col-form-label text-md-right">Position</label>
                            <div class="col-md-6">
                                @if($edit==1)
                                <input type="text" name="position" class="form-control" list="pos" value="{{$data->position}}">
                                @else
                                <input type="text" class="form-control" list="pos" value="{{$data->position}}" disabled="">
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control " name="email" value="{{$data->email}}" required="" autocomplete="email" disabled="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">+62</span>
                                    </div>
                                    <input name="phone" type="number" class="form-control" value="{{$data->phone}}"  disabled="">


                                </div>
                            </div>
                        </div>

                        @endif

                        @if($edit == 1)
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control " name="name" value="{{$data->name}}" required="" autocomplete="name" autofocus="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="position"  class="col-md-4 col-form-label text-md-right">Position</label>
                            <div class="col-md-6">
                                @if($edit==1)
                                <input type="text" name="position" class="form-control"  value="{{$data->position}}" placeholder="Jabatan PIC ...">
                                @else
                                <input type="text" class="form-control" list="pos" value="{{$data->position}}">
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control " name="email" value="{{$data->email}}" required="" autocomplete="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control " name="password" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-6">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Level</label>
                            <div class="col-md-6">
                                <input name="level"type="text" class="form-control" value="{{levelName($data->level)}}" readonly="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="position"  class="col-md-4 col-form-label text-md-right">Level Name</label>
                            <div class="col-md-6">
                                @if($edit==1)
                                <input type="text" name="level_name" class="form-control" value="{{$data->level_name}}" placeholder="Nama Divisi / Departemen ...">
                                @else
                                <input type="text" class="form-control" list="pos" value="{{$data->level_name}}" disabled="">
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Company Name</label>
                            <div class="col-md-6">
                                <input name="company_name"type="text" class="form-control" value="{{$data->company_name}}" readonly="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Company  Address</label>
                            <div class="col-md-6">
                                <textarea name="company_address"class="form-control" rows="4" readonly="">{{$data->company_address}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                @if($edit == 1)
                <div class="float-right">
                    <a href="{{ URL::previous() }}"><button type="button" class="btn btn-secondary">Cancel</button></a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                @else
                <div class="float-right">
                    <a href="{{ route('client.personnel') }}"><button type="button" class="btn btn-secondary">Back</button></a>
                </div>
                @endif
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
