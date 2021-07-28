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

    <!--Card 1-->
    <div class="card shadow mb-4 animated--grow-in">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Business Categories</h6>
        </div>

        <!-- Card Body -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="background-color: #F8F9FC;">
                        <tr>
                            <th style="text-align: center; width: 5%;" >No</th>
                            <th style="text-align: center;">Categories</th>
                            <th style="text-align: center;">Bisnis</th>
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
        </div>

        <!-- Card Body -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="background-color: #F8F9FC;">
                        <tr>
                            <th style="text-align: center; width: 5%;" >No</th>
                            <th style="text-align: center;">Bisnis</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bisnis as $bisnis)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$bisnis->bisnis}}</td>
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
