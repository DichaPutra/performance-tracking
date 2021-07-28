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
            <li class="breadcrumb-item active" aria-current="page">Data Library</li>
        </ol>
    </nav><br>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-book"></i> Data Library</h1>
        <!--        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
                </a>-->
    </div>

    <!--Card 1-->
    <div class="card shadow mb-4 animated--grow-in">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Library</h6>
        </div>

        <!-- Card Body -->
        <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                    <label > Business Categories :</label>
                    <form method="get" action="{{route('admin.datalibrary.datalibrary')}}">
                        <select class="form-control">
                            @foreach ($businesscategories as $bc)
                            <option value="{{$bc->id}}">{{$bc->category}}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div><br><br>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="background-color: #F8F9FC;">
                        <tr>
                            <!--<th style="text-align: center; width: 5%;" >No</th>-->
                            <th style="text-align: center;">Bisnis</th>
                            <th style="text-align: center;">Strategic Objective</th>
                            <th style="text-align: center;">KPI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($solibrary as $so)
                        <tr>
                            <!--<td>{{$loop->iteration}}</td>-->
                            <td>{{$so->bisnis}}</td>
                            <td>{{$so->so}}</td>
                            <td style="text-align: center;">
                                {{getKpiLibraryCount($so->id)}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> 
    </div>

</div>
@endsection

@section('script')
<script>
    window.setTimeout(function () {
        $(".alert-success").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 3000);
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>
@endsection
