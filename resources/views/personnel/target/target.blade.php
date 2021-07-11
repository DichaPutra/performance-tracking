@extends('layouts.app2')

@section('head')
<?php $page = 'target' ?>
@endsection

@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <!--        <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Target Tahunan</li>
                    <li class="breadcrumb-item active" aria-current="page">Details</li>
                </ol>-->
    </nav>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-bullseye"></i> Target</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">

            <div class="card shadow mb-4 animated--grow-in">
                <!--Card Header - Dropdown--> 
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Target</h6>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <br>
                    <!-- Card Header - Dropdown -->
                    <div class="card-header">
                        <h5 class="m-0 font-weight-bold text-primary" style="text-align: center;">Target KPI {{date('Y')}}</h5>
                    </div><br>


                    <!--KPI Table-->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead style="background-color: #F8F9FC;">
                                <tr>
                                    <th style="width: 8%; text-align: center;">No</th>
                                    <th>Strategic Objective</th>
                                    <th>KPI</th>
                                    <th>Weight</th>
                                    <th>Timeframe </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datatarget as $dat)
                                <tr>
                                    <td style="text-align: center;">{{$loop->iteration}}</td>
                                    <td>{{$dat->so}}</td>
                                    <td>{{$dat->kpi}}</td>
                                    <td>{{$dat->weight}}%</td>
                                    <td>{{$dat->timeframe_target}}</td>
                                </tr>                       
                                @endforeach
                            </tbody>
                        </table>
                    </div>>
                    <br>

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
            "paging": false,
            "searching": false,
        });
    });
</script>
@endsection
