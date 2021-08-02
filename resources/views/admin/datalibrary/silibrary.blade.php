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
            <a href="{{route('admin.datalibrary.kpilibrary', ['idso'=>$dataso->id])}}" style="margin-right: 15px;"class="btn btn-sm btn-primary "><i class="fas fa-chevron-left"></i></a>
            <h6 class="m-0 font-weight-bold text-primary">Strategic Initiative Library</h6>
        </div>

        <!-- Modal Add SI-->
        <div class="modal fade bd-example-modal-lg" id="SIadd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Strategic Initiative Library </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{route('admin.datalibrary.addsi')}}">
                        @csrf
                        <input name="id_kpi_library" type="hidden" value="{{$datakpi->id}}">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12" style="margin-bottom: 20px;">
                                    <label>Strategic Initiative :</label>
                                    <textarea name="si" class="form-control"></textarea>
                                </div><br>
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
            <button style="margin-bottom: 10px;"class="btn btn-md btn-primary float-right"data-bs-toggle="modal" data-bs-target="#SIadd">
                <i class="fas fa-plus"></i>
            </button>

            <div class="row">
                <div class="col-md-6">
                    <label>KPI :</label>
                    <textarea class="form-control" readonly="">{{$datakpi->kpi}}</textarea>
                </div>
            </div><br>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="background-color: #F8F9FC;">
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th style="text-align: center; ">Strategic Initiative</th>
                            <th style="text-align: center; width: 10%;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datasi as $datasi)
                        <tr>
                            <td style="text-align: center; ">{{$loop->iteration}}</td>
                            <td>{{$datasi->si}}</td>
                            <td style="text-align: center;">
                                <form method="post" action="{{route('admin.datalibrary.deletesi')}}">
                                    @csrf
                                    <input name="idsi" type="hidden" value="{{$datasi->id}}">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this SI ? ');">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
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
