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
            <li class="breadcrumb-item active" aria-current="page">Library</li>
            <li class="breadcrumb-item active" aria-current="page">Data Library</li>
            <li class="breadcrumb-item active" aria-current="page">KPI Library</li>
        </ol>
    </nav><br>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-book"></i> Data Library</h1>
    </div>

    @if ( (session('success')))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ session('success') }}
    </div>
    @endif

    <!--Card 2-->
    <div class="card shadow mb-4 animated--grow-in">
        <!-- Card Header - Dropdown -->
        <div class="card-header d-flex flex-row align-items-center">
            <a href="{{route('admin.datalibrary.datalibrary', ['bc'=>$dataso->id_business_categories])}}" style="margin-right: 15px;"class="btn btn-sm btn-primary "><i class="fas fa-chevron-left"></i></a>
            <h6 class="m-0 font-weight-bold text-primary">KPI Library</h6>
        </div>

        <!-- Modal Add KPI-->
        <div class="modal fade bd-example-modal-lg" id="KPIadd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add KPI Library </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{route('admin.datalibrary.addkpi')}}">
                        @csrf
                        <input name="id_so_library" type="hidden" value="{{$dataso->id}}">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12" style="margin-bottom: 20px;">
                                    <label>KPI :</label>
                                    <textarea name="kpi" class="form-control"></textarea>
                                </div><br>

                                <div class="col-md-6">
                                    <label>Unit/Satuan :</label>
                                    <input name="unit" type="text" class="form-control">
                                </div>
                                <div class="col-md-6" style="margin-bottom: 20px;">
                                    <label>Measurement :</label>
                                    <select name="measurement" class="form-control">
                                        <!--rangking, absolute number, index, percentages-->
                                        <option hidden="">Select...</option>
                                        <option value="percentages">percentages</option>
                                        <option value="rangking">rangking</option>
                                        <option value="absolute number">absolute number</option>
                                        <option value="index">index</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label>Polarization :</label>
                                    <select name="polarization" class="form-control">
                                        <option hidden="">Select...</option>
                                        <option value="maximize">maximize</option>
                                        <option value="minimize">minimize</option>
                                    </select>
                                </div>
                            </div>
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
            <button style="margin-bottom: 10px;"class="btn btn-md btn-primary float-right"data-bs-toggle="modal" data-bs-target="#KPIadd">
                <i class="fas fa-plus"></i>
            </button>

            <div class="row">
                <div class="col-md-6">
                    <label>Strategic Objective :</label>
                    <textarea class="form-control" readonly="">{{$dataso->so}}</textarea>
                </div>
            </div><br>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="background-color: #F8F9FC;">
                        <tr>
                            <th style="text-align: center; ">KPI</th>
                            <th style="text-align: center; width: 15%;">Unit/Satuan</th>
                            <th style="text-align: center; width: 15%;">Polarization</th>
                            <th style="text-align: center; width: 10%;">SI Library</th>
                            <th style="text-align: center; width: 10%;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datakpi as $datakpi)
                        <tr>
                            <td>{{$datakpi->kpi}}</td>
                            <td style="text-align: center;">{{$datakpi->unit}}</td>
                            <td style="text-align: center;">{{$datakpi->polarization}}</td>
                            <td style="text-align: center;">{{getSiLibraryCount($datakpi->id)}}</td>
                            <td style="text-align: center;">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.datalibrary.silibrary',['idso'=>$dataso->id, 'idkpi'=>$datakpi->id])}}">Detail</a>
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
//    $(document).ready(function () {
//        $('#dataTable').DataTable();
//    });
</script>
@endsection
