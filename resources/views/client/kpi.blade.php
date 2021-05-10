@extends('layouts.app2')

@section('head')
<?php $page = 'kpi' ?>
@endsection

@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">KPI</li>
        </ol>
    </nav><br>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-chart-line"></i>  KPI</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4 animated--grow-in">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">List personnel</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead style="background-color: #F8F9FC;">
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot style="background-color: #F8F9FC;">
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td><a href="{{route('client.personnel.detailpersonnel')}}"><button class="btn btn-primary btn-sm">Details</button></a></td>
                                </tr>
                                <tr>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td><a href="{{route('client.personnel.detailpersonnel')}}"><button class="btn btn-primary btn-sm">Details</button></a></td>
                                </tr>
                                <tr>
                                    <td>Ashton Cox</td>
                                    <td>Junior Technical Author</td>
                                    <td><a href="{{route('client.personnel.detailpersonnel')}}"><button class="btn btn-primary btn-sm">Details</button></a></td>
                                </tr>
                                <tr>
                                    <td>Jena Gaines</td>
                                    <td>Office Manager</td>
                                    <td><a href="{{route('client.personnel.detailpersonnel')}}"><button class="btn btn-primary btn-sm">Details</button></a></td>
                                </tr>
                                <tr>
                                    <td>Quinn Flynn</td>
                                    <td>Support Lead</td>
                                    <td><a href="{{route('client.personnel.detailpersonnel')}}"><button class="btn btn-primary btn-sm">Details</button></a></td>
                                </tr>
                                <tr>
                                    <td>Charde Marshall</td>
                                    <td>Regional Director</td>
                                    <td><a href="{{route('client.personnel.detailpersonnel')}}"><button class="btn btn-primary btn-sm">Details</button></a></td>
                                </tr>
                                <tr>
                                    <td>Haley Kennedy</td>
                                    <td>Senior Marketing Designer</td>
                                    <td><a href="{{route('client.personnel.detailpersonnel')}}"><button class="btn btn-primary btn-sm">Details</button></a></td>
                                </tr>
                                <tr>
                                    <td>Tatyana Fitzpatrick</td>
                                    <td>Regional Director</td>
                                    <td><a href="{{route('client.personnel.detailpersonnel')}}"><button class="btn btn-primary btn-sm">Details</button></a></td>
                                </tr>
                                <tr>
                                    <td>Michael Silva</td>
                                    <td>Marketing Designer</td>
                                    <td><a href="{{route('client.personnel.detailpersonnel')}}"><button class="btn btn-primary btn-sm">Details</button></a></td>
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
