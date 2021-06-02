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
                                    <th style="text-align: center; width: 25%;" >Name</th>
                                    <th style="text-align: center;" >Position</th>
                                    <th style="text-align: center;" >Number of KPIs</th>
                                    <th style="text-align: center;" >Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><b>Tiger Nixon</b></td>
                                    <td>System Architect</td>
                                    <td style="text-align: center;">3</td>
                                    <td style="text-align: center;" ><a href="{{route('client.kpi.details')}}"><button class="btn btn-primary btn-sm">Details</button></a></td>
                                </tr>
                                <tr>
                                    <td><b>Garrett Winters</b></td>
                                    <td>Accountant</td>
                                    <td style="text-align: center;">3</td>
                                    <td style="text-align: center;" ><a href="{{route('client.kpi.details')}}"><button class="btn btn-primary btn-sm">Details</button></a></td>
                                </tr>
                                <tr>
                                    <td><b>Ashton Connie</b></td>
                                    <td>Junior Technical Author</td>
                                    <td style="text-align: center;">3</td>
                                    <td style="text-align: center;" ><a href="{{route('client.kpi.details')}}"><button class="btn btn-primary btn-sm">Details</button></a></td>
                                </tr>
                                <tr>
                                    <td><b>Jena Gaines</b></td>
                                    <td>Office Manager</td>
                                    <td style="text-align: center;">3</td>
                                    <td style="text-align: center;" ><a href="{{route('client.kpi.details')}}"><button class="btn btn-primary btn-sm">Details</button></a></td>
                                </tr>
                                <tr>
                                    <td><b>Quinn Flynn</b></td>
                                    <td>Support Lead</td>
                                    <td style="text-align: center;">3</td>
                                    <td style="text-align: center;" ><a href="{{route('client.kpi.details')}}"><button class="btn btn-primary btn-sm">Details</button></a></td>
                                </tr>
                                <tr>
                                    <td><b>Charde Marshall</b></td>
                                    <td>Regional Director</td>
                                    <td style="text-align: center;">3</td>
                                    <td style="text-align: center;" ><a href="{{route('client.kpi.details')}}"><button class="btn btn-primary btn-sm">Details</button></a></td>
                                </tr>
                                <tr>
                                    <td><b>Haley Kennedy</b></td>
                                    <td>Senior Marketing Designer</td>
                                    <td style="text-align: center;">3</td>
                                    <td style="text-align: center;" ><a href="{{route('client.kpi.details')}}"><button class="btn btn-primary btn-sm">Details</button></a></td>
                                </tr>
                                <tr>
                                    <td><b>Tatyana Fitzpatrick</b></td>
                                    <td>Regional Director</td>
                                    <td style="text-align: center;">3</td>
                                    <td style="text-align: center;" ><a href="{{route('client.kpi.details')}}"><button class="btn btn-primary btn-sm">Details</button></a></td>
                                </tr>
                                <tr>
                                    <td><b>Michael Silva</b></td>
                                    <td>Marketing Designer</td>
                                    <td style="text-align: center;">3</td>
                                    <td style="text-align: center;" ><a href="{{route('client.kpi.details')}}"><button class="btn btn-primary btn-sm">Details</button></a></td>
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
    $(document).ready(function () {
        $('#dataTable').DataTable({
            responsive: true,
        });
    });
</script>
@endsection
