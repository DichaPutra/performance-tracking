@extends('layouts.app2')

@section('head')
<?php $page = 'target' ?>
@endsection

@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Target</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('client.target.actionplan')}}">Action Plan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail</li>
        </ol>
    </nav><br>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-chart-line"></i>  Action Plan Detail</h1>
    </div>

    <ul class="nav nav-pills justify-content-end" style="margin-bottom: 20px;">
        <li class="nav-item">
            <a class="nav-link button btn-sm" aria-current="page" href="{{route('client.target.strategicobjective')}}">Strategic Objective</a>
        </li>
        <li class="nav-item">
            <a class="nav-link button btn-sm" href="{{route('client.target.kpi')}}">Action Plan Detail</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active button btn-sm" href="{{route('client.target.actionplan')}}">Action Plan</a>
        </li>
    </ul>   

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4 animated--grow-in">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Action Plan Detail</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!-- Content Row -->
                    <div class="form-group">
                        <label for="exampleFormControlInput1">KPI :</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly="">Return on Equity (ROE) - Tingkat pengembalian atas modal yang telah ditanamkan</textarea>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead style="background-color: #F8F9FC;">
                                <tr>
                                    <th style="text-align: center;">No</th>
                                    <th>Action Plan</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;">1</td>
                                    <td>Action Plan 1</td>
                                    <td style="text-align: center;"><a href="{{route('client.personnel.actionplandetail')}}"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">2</td>
                                    <td>Action Plan 2</td>
                                    <td style="text-align: center;"><a href="{{route('client.personnel.actionplandetail')}}"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a></td>
                                </tr> 
                                <tr>
                                    <td style="text-align: center;">3</td>
                                    <td>Action Plan 3</td>
                                    <td style="text-align: center;"><a href="{{route('client.personnel.actionplandetail')}}"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a></td>
                                </tr> 
                                <tr>
                                    <td style="text-align: center;">4</td>
                                    <td>Action Plan 4</td>
                                    <td style="text-align: center;"><a href="{{route('client.personnel.actionplandetail')}}"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a></td>
                                </tr> 
                                <tr>
                                    <td style="text-align: center;">5</td>
                                    <td>Action Plan 5</td>
                                    <td style="text-align: center;"><a href="{{route('client.personnel.actionplandetail')}}"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">6</td>
                                    <td>Action Plan 6</td>
                                    <td style="text-align: center;"><a href="{{route('client.personnel.actionplandetail')}}"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">7</td>
                                    <td>Action Plan 7</td>
                                    <td style="text-align: center;"><a href="{{route('client.personnel.actionplandetail')}}"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a></td>
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
