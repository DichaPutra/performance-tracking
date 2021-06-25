@extends('layouts.app2')

@include('client.otherelement')

@section('head')
<?php $page = 'personnel' ?>
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Personnel</li>
        </ol>
    </nav><br>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-user-alt "></i>  Personnel</h1>
        <a href="{{route('client.personnel.addpersonnel')}}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-user-plus fa-sm text-white-50"></i>  Add Personnel
        </a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4 animated--grow-in">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Personnel</h6>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <!--Success Message-->
                    @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('message') }}
                    </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead style="background-color: #F8F9FC;">
                                <tr>
                                    <th>Level</th>
                                    <th>Position</th>
                                    <th>PIC Name</th>
                                    <th></th>
                                </tr>
                            </thead>
<!--                            <tfoot style="background-color: #F8F9FC;">
                                <tr>
                                    <th>Level</th>
                                    <th>Position</th>
                                    <th>PIC Name</th>
                                    <th></th>
                                </tr>
                            </tfoot>-->
                            <tbody>
                                @foreach($user as $user)
                                <tr>
                                    <td style="background-color: {{color($user->level)}};">{{levelName($user->level)}}</td>
                                    <td>{{$user->position}}</td>
                                    <td>{{$user->name}}</td>
                                    <td><a href="{{route('client.personnel.detailpersonnel', ['idpersonnel'=>$user->id])}}"><button class="btn btn-primary btn-sm">Details</button></a></td>
                                </tr>
                                @endforeach                            
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
