@extends('layouts.app2')

@include('client.otherelement')<!--berisikan function di view-->

@section('head')
<?php $page = 'initiative' ?>

<style>
    .scroll {
        max-height: 440px;
        overflow-y: auto;
    }
</style>


@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Initiative</li>
            <li class="breadcrumb-item active" aria-current="page">KPI</li>
            <li class="breadcrumb-item active" aria-current="page">Action Plan</li>
        </ol>
    </nav><br>

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">

            <!--Card 1-->
            <div class="card shadow mb-4 animated--grow-in">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center">
                    <a href="{{route('client.initiative.kpi', ['idpersonnel'=>$data->id,'tahun'=>$tahun])}}" style="margin-right: 15px;"class="btn btn-sm btn-primary "><i class="fas fa-chevron-left"></i></a><br>
                    <h6 class="m-0 font-weight-bold text-primary">Details</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">

                    @if ( (session('success')))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('success') }}
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Level</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control " name="name" value="{{levelName($data->level)}}" required="" autocomplete="name" autofocus="" disabled="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Level Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control " name="name" value="{{$data->level_name}}" required="" autocomplete="name" autofocus="" disabled="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">PIC Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control " name="name" value="{{$data->name}}" required="" autocomplete="name" autofocus="" disabled="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="position" class="col-md-4 col-form-label text-md-right">Position</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" list="pos" value="{{$data->position}}" disabled="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control " name="email" value="{{$data->email}}" required="" autocomplete="email" disabled="">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="position" class="col-md-4 col-form-label text-md-right">Periode
                                    Target</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" list="pos" value="{{ $tahun }}"
                                           disabled="">
                                </div>
                            </div>
                            <!--                            <div class="form-group row">
                                                            <label for="position" class="col-md-4 col-form-label text-md-right">Number of SO</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" list="pos"
                                                                       value="{{ getCountSO($data->id, $tahun) }}" disabled="">
                                                            </div>
                                                        </div>-->
                            <div class="form-group row">
                                <label for="position" class="col-md-4 col-form-label text-md-right">Number of
                                    KPI</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" list="pos"
                                           value="{{ getCountKPI($data->id, $tahun) }}" disabled="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <!--Card 2-->
                    <div class="card shadow mb-4 animated--grow-in">
                        <!-- Card Header - Dropdown -->
                        <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Action Plan</h6>
                            <button class="btn btn-sm btn-primary float-right" data-bs-toggle="modal" data-bs-target="#modalAdd"><i class="fas fa-plus"></i></button>
                        </div>

                        <!-- Modal Add-->
                        <div class="modal fade bd-example-modal-lg" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form
                                        <form action="{{route('client.initiative.addactionplan')}}" method="post">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Action Plan </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- **** Form Add SO **** -->
                                                <input name="id_user"type="hidden" value="{{$data->id}}">
                                                <input name="id_target_si"type="hidden" value="{{$datasi->id}}">
                                                <input name="tahun"type="hidden" value="{{$tahun}}">
                                                <input name="idkpiselected" type="hidden" value="{{$datakpiselected->id}}">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Action Plan :</label>
                                                    <textarea name="actionplan"class="form-control" rows="2"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <input class="btn btn-primary"type="submit" value="Add">
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Strategic Objective :</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" readonly="">{{$datakpiselected->so}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >KPI :</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" readonly="">{{$datakpiselected->kpi}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label >Strategic Initiative :</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" readonly="">{{$datasi->si}}</textarea>
                                </div>

                            </div>

                            <div class="row">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead style="background-color: #F8F9FC;">
                                        <tr>
                                            <th style="text-align: center; width: 10%">No</th>
                                            <th>Action Plan</th>
                                            <th style="text-align: center; width: 10%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($actionplan as $actionplan)
                                        <tr>
                                            <td style="text-align: center;">{{$loop->iteration}}</td>
                                            <td>{{$actionplan->actionplan}}</td>
                                            <td style="text-align: center; width: 10%">
                                                <form method="post" action="{{route('client.initiative.deleteactionplan')}}">
                                                    @csrf
                                                    <input name="id_user"type="hidden" value="{{$data->id}}">
                                                    <input name="id_target_si"type="hidden" value="{{$datasi->id}}">
                                                    <input name="tahun"type="hidden" value="{{$tahun}}">
                                                    <input name="idkpiselected" type="hidden" value="{{$datakpiselected->id}}">
                                                    <input name="idactionplan"type="hidden" value="{{$actionplan->id}}">
                                                    <button type="submit"class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Action Plan ?');">
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
<!--                <div class="col-md-4">
                    Card 3
                    <div class="card shadow mb-4 animated--grow-in" data-spy="scroll" style="height: 710px">
                        <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Comments</h6>
                        </div>

                        <div class="row">
                            <div class="container">
                                <div class="text-justify">
                                    <div class="well">
                                        <br>
                                        <h4>What is on your mind?</h4>
                                        <textarea class="form-control" rows="2"></textarea>
                                        <a href="#" class="btn btn-primary btn-sm float-right" style="margin-top: 10px">Submit</a>

                                        <div class="input-group">
                                            <textarea class="form-control" rows="3"></textarea>
                                            <span class="input-group-btn" >     
                                                <a href="#" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-comment"></span> Add Comment</a>
                                            </span>
                                        </div>
                                        <hr>
                                        <div class="scroll">
                                            <ul data-brackets-id="12674" id="sortable" class="list-unstyled ui-sortable">
                                                <strong class="pull-left primary-font">James | Company</strong>
                                                <small class="pull-right text-muted">
                                                    <span class="glyphicon glyphicon-time"></span>7 mins ago</small>
                                                </br>
                                                <li class="ui-state-default">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </li>

                                                <hr>

                                                <strong class="pull-left primary-font">Taylor | Production</strong>
                                                <small class="pull-right text-muted">
                                                    <span class="glyphicon glyphicon-time"></span>14 mins ago</small>
                                                </br>
                                                <li class="ui-state-default">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>

                                                <hr>

                                                <strong class="pull-left primary-font">Taylor | Production</strong>
                                                <small class="pull-right text-muted">
                                                    <span class="glyphicon glyphicon-time"></span>14 mins ago</small>
                                                </br>
                                                <li class="ui-state-default">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>

                                                <hr>

                                                <strong class="pull-left primary-font">Taylor | Production</strong>
                                                <small class="pull-right text-muted">
                                                    <span class="glyphicon glyphicon-time"></span>14 mins ago</small>
                                                </br>
                                                <li class="ui-state-default">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>

                                                <hr>

                                                <strong class="pull-left primary-font">Taylor | Production</strong>
                                                <small class="pull-right text-muted">
                                                    <span class="glyphicon glyphicon-time"></span>14 mins ago</small>
                                                </br>
                                                <li class="ui-state-default">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>

                                                <strong class="pull-left primary-font">James | Company</strong>
                                                <small class="pull-right text-muted">
                                                    <span class="glyphicon glyphicon-time"></span>7 mins ago</small>
                                                </br>
                                                <li class="ui-state-default">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </li>

                                                <hr>

                                                <strong class="pull-left primary-font">Taylor | Production</strong>
                                                <small class="pull-right text-muted">
                                                    <span class="glyphicon glyphicon-time"></span>14 mins ago</small>
                                                </br>
                                                <li class="ui-state-default">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>

                                                <hr>                                                <strong class="pull-left primary-font">James | Company</strong>
                                                <small class="pull-right text-muted">
                                                    <span class="glyphicon glyphicon-time"></span>7 mins ago</small>
                                                </br>
                                                <li class="ui-state-default">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </li>

                                                <hr>

                                                <strong class="pull-left primary-font">Taylor | Production</strong>
                                                <small class="pull-right text-muted">
                                                    <span class="glyphicon glyphicon-time"></span>14 mins ago</small>
                                                </br>
                                                <li class="ui-state-default">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>

                                                <hr>                                                <strong class="pull-left primary-font">James | Company</strong>
                                                <small class="pull-right text-muted">
                                                    <span class="glyphicon glyphicon-time"></span>7 mins ago</small>
                                                </br>
                                                <li class="ui-state-default">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </li>

                                                <hr>

                                                <strong class="pull-left primary-font">Taylor | Production</strong>
                                                <small class="pull-right text-muted">
                                                    <span class="glyphicon glyphicon-time"></span>14 mins ago</small>
                                                </br>
                                                <li class="ui-state-default">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>

                                                <hr>                                                <strong class="pull-left primary-font">James | Company</strong>
                                                <small class="pull-right text-muted">
                                                    <span class="glyphicon glyphicon-time"></span>7 mins ago</small>
                                                </br>
                                                <li class="ui-state-default">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </li>

                                                <hr>

                                                <strong class="pull-left primary-font">Taylor | Production</strong>
                                                <small class="pull-right text-muted">
                                                    <span class="glyphicon glyphicon-time"></span>14 mins ago</small>
                                                </br>
                                                <li class="ui-state-default">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>

                                                <hr>                                                <strong class="pull-left primary-font">James | Company</strong>
                                                <small class="pull-right text-muted">
                                                    <span class="glyphicon glyphicon-time"></span>7 mins ago</small>
                                                </br>
                                                <li class="ui-state-default">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </li>

                                                <hr>

                                                <strong class="pull-left primary-font">Taylor | Production</strong>
                                                <small class="pull-right text-muted">
                                                    <span class="glyphicon glyphicon-time"></span>14 mins ago</small>
                                                </br>
                                                <li class="ui-state-default">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>

                                                <hr>                                                <strong class="pull-left primary-font">James | Company</strong>
                                                <small class="pull-right text-muted">
                                                    <span class="glyphicon glyphicon-time"></span>7 mins ago</small>
                                                </br>
                                                <li class="ui-state-default">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </li>

                                                <hr>

                                                <strong class="pull-left primary-font">Taylor | Production</strong>
                                                <small class="pull-right text-muted">
                                                    <span class="glyphicon glyphicon-time"></span>14 mins ago</small>
                                                </br>
                                                <li class="ui-state-default">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>

                                                <hr>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->

            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
</div>

@endsection

@section('script')
<script>
    window.setTimeout(function () {
        $(".alert-success").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 1500);
</script>

<!--        <script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>-->
@endsection
