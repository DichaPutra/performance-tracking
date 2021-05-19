@extends('layouts.app2')

@section('head')
<?php $page = 'target' ?>
@endsection

@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Target</li>
        </ol>
    </nav><br>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-bullseye"></i>  Target</h1>
    </div>  

    <!--Content-->
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
                                    <th>Level</th>      
                                    <th>Position</th>
                                    <th>PIC Name</th>
                                    <th>Strategic Objective</th>
                                    <th>KPI</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot style="background-color: #F8F9FC;">
                                <tr>
                                    <th>Level</th>
                                    <th>Position</th>
                                    <th>PIC Name</th>
                                    <th>Strategic Objective</th>
                                    <th>KPI</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td style="background-color: #BDD7EE;">0. Corporate</td>
                                    <td>Corporate</td>
                                    <td>Tiger Nixon</td>
                                    <td style="text-align:center;">5</td>
                                    <td style="text-align:center;">15</td>
                                    <td><a href="{{route('client.target.details')}}"><button class="btn btn-primary btn-sm">Details</button></a></td>
                                </tr>
                                <tr>
                                    <td style="background-color: #FEE599;">1. Division</td>
                                    <td>Finance</td>
                                    <td>Garrett Winters</td>
                                    <td style="text-align:center;">3</td>
                                    <td style="text-align:center;">12</td>
                                    <td><a href="{{route('client.target.details')}}"><button class="btn btn-primary btn-sm">Details</button></a></td>
                                </tr>
                                <tr>
                                    <td style="background-color: #FEE599;">1. Division</td>
                                    <td>Production</td>
                                    <td>Jena Gaines</td>
                                    <td style="text-align:center;">2</td>
                                    <td style="text-align:center;">8</td>
                                    <td><a href="{{route('client.target.details')}}"><button class="btn btn-primary btn-sm">Details</button></a></td>
                                </tr>
                                <tr>
                                    <td style="background-color: #FEE599;">1. Division</td>
                                    <td>Marketing</td>
                                    <td>Haley Kennedy</td>
                                    <td style="text-align:center;">4</td>
                                    <td style="text-align:center;">13</td>
                                    <td><a href="{{route('client.target.details')}}"><button class="btn btn-primary btn-sm">Details</button></a></td>
                                </tr>
                                <tr>
                                    <td style="background-color: #FEE599;">1. Division</td>
                                    <td>Inventory</td>
                                    <td>Michael Silva</td>
                                    <td style="text-align:center;">4</td>
                                    <td style="text-align:center;">13</td>
                                    <td><a href="{{route('client.target.details')}}"><button class="btn btn-primary btn-sm">Details</button></a></td>
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
        $('#dataTable').DataTable();
    });
</script>
@endsection
