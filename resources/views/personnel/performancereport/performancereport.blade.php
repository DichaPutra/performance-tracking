@extends('layouts.app2')

@section('head')
<?php $page = 'performancereport' ?>
@endsection

@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Performance Report</li>
        </ol>
    </nav><br>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-chalkboard-teacher"></i>  Performance Report</h1>
    </div>  

    <!--Content-->
    <div class="row">

        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4 animated--grow-in">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Performance Report</h6>
                    <select class="form-control form-control-sm float-right" style="width: 20%;">
                        <option>January</option>
                        <option>February</option>
                        <option>March</option>
                        <option>April</option>
                        <option selected="">May</option>
                    </select>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead style="background-color: #F8F9FC;">
                                <tr>
                                    <th>Level</th>      
                                    <th>Position</th>
                                    <th>PIC Name</th>
                                    <th>Performance</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot style="background-color: #F8F9FC;">
                                <tr>
                                    <th>Level</th>
                                    <th>Position</th>
                                    <th>PIC Name</th>
                                    <th>Performance</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td style="background-color: #BDD7EE;">0. Corporate</td>
                                    <td>Corporate</td>
                                    <td>Tiger Nixon</td>
                                    <td style="text-align:center;">
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 90%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">90%</div>
                                        </div>
                                    </td>
                                    <td style="text-align:center;"><a href="{{route('personnel.performancereport.details')}}"><button class="btn btn-primary btn-sm">Details</button></a></td>
                                </tr>
                                <tr>
                                    <td style="background-color: #FEE599;">1. Division</td>
                                    <td>Finance</td>
                                    <td>Garrett Winters</td>
                                    <td style="text-align:center;">
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 65%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">65%</div>
                                        </div>
                                    </td>
                                    <td style="text-align:center;"><a href="{{route('personnel.performancereport.details')}}"><button class="btn btn-primary btn-sm">Details</button></a></td>
                                </tr>
                                <tr>
                                    <td style="background-color: #FEE599;">1. Division</td>
                                    <td>Production</td>
                                    <td>Jena Gaines</td>
                                    <td style="text-align:center;">
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 40%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">40%</div>
                                        </div>
                                    </td>
                                    <td style="text-align:center;"><a href="{{route('personnel.performancereport.details')}}"><button class="btn btn-primary btn-sm">Details</button></a></td>
                                </tr>
                                <tr>
                                    <td style="background-color: #FEE599;">1. Division</td>
                                    <td>Marketing</td>
                                    <td>Haley Kennedy</td>
                                    <td style="text-align:center;">
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 90%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">90%</div>
                                        </div>
                                    </td>
                                    <td style="text-align:center;"><a href="{{route('personnel.performancereport.details')}}"><button class="btn btn-primary btn-sm">Details</button></a></td>
                                </tr>
                                <tr>
                                    <td style="background-color: #FEE599;">1. Division</td>
                                    <td>Inventory</td>
                                    <td>Michael Silva</td>
                                    <td style="text-align:center;">
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 90%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">90%</div>
                                        </div>
                                    </td>
                                    <td style="text-align:center;"><a href="{{route('personnel.performancereport.details')}}"><button class="btn btn-primary btn-sm">Details</button></a></td>
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

@section('script')
<script>
    var progressBarColor;

    var someValueToCheck = 5;

    if (someValueToCheck >= 10)
        progressBarColor = "#A52A2A";
    else if (someValueToCheck >= 5)
        progressBarColor = "#00FFFF";
    else
        progressBarColor = "#00008B";

    $("#progressbar").css('background-color', progressBarColor);
</script>
@endsection
