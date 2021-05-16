@extends('layouts.app2')

@section('head')
<?php $page = 'kpi' ?>
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
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save</button>
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
                                    <th>Strategic Objective</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;">1</td>
                                    <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</td>
                                    <td style="text-align: center;"><a href="{{route('client.personnel.detailpersonnel')}}"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">2</td>
                                    <td>when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</td>
                                    <td style="text-align: center;"><a href="{{route('client.personnel.detailpersonnel')}}"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">3</td>
                                    <td>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software</td>
                                    <td style="text-align: center;"><a href="{{route('client.personnel.detailpersonnel')}}"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">4</td>
                                    <td>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock,</td>
                                    <td style="text-align: center;"><a href="{{route('client.personnel.detailpersonnel')}}"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a></td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">5</td>
                                    <td>a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage,</td>
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
