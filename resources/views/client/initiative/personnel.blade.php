@extends('layouts.app2')

@include('client.otherelement')<!--berisikan function di view-->

@section('head')
<?php $page = 'initiative' ?>
@endsection

@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Initiative</li>
        </ol>
    </nav><br>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-lightbulb"></i>  Initiative</h1>
    </div>  

    <!--Content-->
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

                    <div class="row">
                        <form action="{{ route('client.initiative.personnel') }}" method="GET" class="float-right" style="width: 30%; margin-bottom: 50px;">
                            <label>periode :</label> 
                            <select name='tahun' onchange='if (this.value != <?php echo $tahun; ?>) {
                                        this.form.submit();
                                    }' class="form-control">
                                @for ($i = 2; $i > 0; $i--)
                                <option @if ($tahun == date('Y') - $i) selected @endif> {{ date('Y') - $i }}</option>
                                @endfor
                                <option @if ($tahun == date('Y')) selected @endif>{{ date('Y') }}</option>
                                @for ($i = 1; $i < 4; $i++)
                                <option @if ($tahun == date('Y') + $i) selected @endif>{{ date('Y') + $i }}</option>
                                @endfor
                            </select>
                        </form>
                    </div>

                    <div class="row">
                        <h5 class="m-0 font-weight-bold text-primary" style="text-align: center;">Strategic Initiative </h5>
                        <h7 class="m-0 font-weight-bold text-primary" style="text-align: center;">Periode th {{$tahun}}</h7>
                    </div> <br><br>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead style="background-color: #F8F9FC;">
                                <tr>
                                    <th>Level</th>      
                                    <th>Level Name</th>
                                    <th>PIC Name</th>
                                    <th style="text-align: center; width: 10%">KPI</th>
                                    <th style="text-align: center; width: 10%">Strategic Initiative</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $user )
                                <tr>
                                    <td style="background-color: {{color($user->level)}};">{{levelName($user->level)}}</td>
                                    <td>{{$user->level_name}}</td>
                                    <td>{{$user->name}}</td>
                                    <td style="text-align:center; width: 10%;">{{getCountKPI($user->id,$tahun)}}</td>
                                    <td style="text-align:center; width: 10%;">{{getCountSIbyUser($user->id, $tahun)}}</td>
                                    <td style="text-align: center;">
                                        @if (getCountKPI($user->id,$tahun) != 0)
                                        <a href="{{route('client.initiative.kpi', ['idpersonnel'=>$user->id, 'tahun'=>$tahun])}}">
                                            <button class="btn btn-primary btn-sm">Details</button>
                                        </a>
                                        @endif
                                    </td>
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
<!--<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>-->
@endsection
