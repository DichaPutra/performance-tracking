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

    @if ( (session('success')))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ session('success') }}
    </div>
    @endif


    <!--Card 1-->
    <div class="card shadow mb-4 animated--grow-in">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Business Categories</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <label> Business Categories :</label>
                    <form method="get" action="{{route('admin.datalibrary.datalibrary')}}">
                        <select name="bc" class="form-control" onchange='this.form.submit();'>
                            <option hidden="">Select Business Categories</option>
                            @foreach ($businesscategories as $bc)
                            <option value="{{$bc->id}}" @if ($selectedbc == $bc->id) selected @endif>{{$bc->category}}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div><br><br>
        </div>
    </div>

    @if ($selectedbc != null)
    <!--Card 2-->
    <div class="card shadow mb-4 animated--grow-in">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Strategic Objective Library</h6>
            <button class="btn btn-md btn-primary float-right"data-bs-toggle="modal" data-bs-target="#SOAdd"><i class="fas fa-plus"></i></button>
        </div>

        <!-- Modal Add SO-->
        <div class="modal fade bd-example-modal-lg" id="SOAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Strategic Objective </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{route('admin.datalibrary.addso')}}">
                        @csrf
                        <div class="modal-body">
                            <input name="id_business_categories" type="hidden" value="{{$selectedbc}}">
                            <label> Bisnis :</label>
                            <select name="bisnis" class="form-control">
                                @foreach ($bisnis as $bisnis)
                                <option value="{{$bisnis->bisnis}}">{{$bisnis->bisnis}}</option>
                                @endforeach
                            </select><br>
                            <label> Aspect :</label>
                            <select name="aspect" class="form-control">
                                <option value="Keuangan">Keuangan</option>
                                <option value="Kualitas">Kualitas</option>
                                <option value="Produktivitas">Produktivitas</option>
                                <option value="Waktu">Waktu</option>
                            </select><br>
                            <label>Strategic Objective :</label>
                            <textarea name="so" class="form-control" rows="2"></textarea>

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

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="background-color: #F8F9FC;">
                        <tr>
                            <!--<th style="text-align: center; width: 5%;" >No</th>-->
                            <th style="text-align: center;">Bisnis</th>
                            <th style="text-align: center;">Aspect</th>
                            <th style="text-align: center;">Strategic Objective</th>
                            <th style="text-align: center; width: 15%;">KPI</th>
                            <th style="text-align: center;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($solibrary as $so)
                        <tr>
                            <!--<td>{{$loop->iteration}}</td>-->
                            <td style="text-align: center;">{{$so->bisnis}}</td>
                            <td>{{$so->aspect}}</td>
                            <td>{{$so->so}}</td>
                            <td style="text-align: center;">
                                {{getKpiLibraryCount($so->id)}}
                            </td>
                            <td style="text-align: center;">
                                <a class="btn btn-primary btn-sm" href="">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> 
    </div>
    @endif

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
