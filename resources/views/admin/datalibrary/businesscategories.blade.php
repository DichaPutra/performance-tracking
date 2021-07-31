@extends('layouts.app2')

@include('admin.otherelement')
<!--berisikan function di view-->

@section('head')
<?php $page = 'dataLibrary' ?>
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!--Breadcrumb-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Business Categories</li>
        </ol>
    </nav><br>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-book"></i> Business Categories</h1>
        <!--        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
                </a>-->
    </div>

    @if ( (session('success')))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ session('success') }}
    </div>
    @endif

    <!--Card 1-->
    <div class="card shadow mb-4 animated--grow-in">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Business Categories</h6>
            <button class="btn btn-md btn-primary float-right"data-bs-toggle="modal" data-bs-target="#BCateAdd"><i class="fas fa-plus"></i></button>
        </div>

        <!-- Modal Add-->
        <div class="modal fade bd-example-modal-lg" id="BCateAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Business Categories </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{route('admin.datalibrary.addbusinesscategories')}}">
                        @csrf
                        <div class="modal-body">
                            <label>Business Categories :</label>
                            <input name="businesscategories" type="text" class="form-control">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" value="Add" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Card Body -->
        <div class="card-body">
            <br>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="background-color: #F8F9FC;">
                        <tr>
                            <th style="text-align: center; width: 5%;" >No</th>
                            <th style="text-align: center;">Categories</th>
                            <th style="width: 10%; text-align: center;">Bisnis</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($businesscategories as $bc)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$bc->category}}</td>
                            <td style="text-align: center;">
                                <a href="{{route('admin.datalibrary.businesscategories', ['category'=>$bc->id])}}">{{getBisnisCount($bc->id)}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> 
    </div>

    <!--Card 2-->
    @if ($bisnis != null)
    <div class="card shadow mb-4 animated--grow-in">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Bisnis</h6>
            <button class="btn btn-md btn-primary float-right"data-bs-toggle="modal" data-bs-target="#BAdd"><i class="fas fa-plus"></i></button>
        </div>

        <!-- Modal Add-->
        <div class="modal fade bd-example-modal-lg" id="BAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Bisnis </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{route('admin.datalibrary.addbisnis')}}">
                        @csrf
                        <input name="idbc" type="hidden" value="{{$selectedbc->id}}">
                        <div class="modal-body">

                            <label>Bisnis :</label>
                            <input name="bisnis" type="text" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" value="Add" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Card Body -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <label>Business Categories :</label>
                    <input class="form-control" type="text" value="{{$selectedbc->category}}" readonly="">
                </div>
            </div><br>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="background-color: #F8F9FC;">
                        <tr>
                            <th style="text-align: center; width: 5%;" >No</th>
                            <th style="text-align: center;">Bisnis</th>
                            <th style="width: 10%; text-align: center;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bisnis as $bisnis)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$bisnis->bisnis}}</td>
                            <td style="width: 10%; text-align: center;">
                                <form method="post" action="{{route('admin.datalibrary.deletebisnis')}}">
                                    @csrf
                                    <input name="idbisnis" type="hidden" value="{{$bisnis->id}}">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this bisnis ? ');">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> 
    </div>
    @endif
</div>
@endsection

@section('script')
<!--    <script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>-->
<script>
    window.setTimeout(function () {
        $(".alert-success").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 1500);
</script>
@endsection
