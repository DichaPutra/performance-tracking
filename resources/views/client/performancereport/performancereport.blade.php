@extends('layouts.app2')

@include('client.otherelement')
<!--berisikan function di view-->

@section('head')
<?php $page = 'performancereport' ?>
@endsection

@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Performance Report</li>
        </ol>
    </nav><br>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-chalkboard-teacher"></i>  Performance Report</h1>
    </div>  

    <!--Content-->
    <div class="row">

        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4 animated--grow-in">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Performance Report</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">

                    <div class="row">
                        <form action="{{ route('client.performancereport') }}" method="GET" class="float-right" style="width: 30%; margin-bottom: 50px;">
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
                        <h5 class="m-0 font-weight-bold text-primary" style="text-align: center;">Performance Report </h5>
                        <h7 class="m-0 font-weight-bold text-primary" style="text-align: center;">Periode th {{$tahun}}</h7>
                    </div> <br><br>


                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead style="background-color: #F8F9FC;">
                                <tr>
                                    <th style="text-align: center;">Level</th>      
                                    <th style="text-align: center;">Position</th>
                                    <th style="text-align: center;">PIC Name</th>
                                    <th style="text-align: center;">Range Periode</th>
                                    <th style="text-align: center;">Performance</th>
                                    <th style="text-align: center;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $user)
                                <tr>
                                    <td style="background-color: {{ color($user->level) }};">
                                        {{ levelName($user->level) }}</td>

                                    <td>{{ $user->level_name }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td style="text-align:center;"><small>{{ getRangePeriod($user->id, $tahun) }}</small></td>
                                    <td style="text-align:center;">
                                        @if (getPeriodePerformance($user->id, $tahun)=='n/a')
                                        n/a
                                        @elseif(getPeriodePerformance($user->id, $tahun)>100)
                                        <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: {{getPeriodePerformance($user->id, $tahun)}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{getPeriodePerformance($user->id, $tahun)}}%</div>
                                        </div>
                                        @elseif(getPeriodePerformance($user->id, $tahun)>75)
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{getPeriodePerformance($user->id, $tahun)}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{getPeriodePerformance($user->id, $tahun)}}%</div>
                                        </div>
                                        @elseif(getPeriodePerformance($user->id, $tahun)>50)
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: {{getPeriodePerformance($user->id, $tahun)}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{getPeriodePerformance($user->id, $tahun)}}%</div>
                                        </div>
                                        @elseif (getPeriodePerformance($user->id, $tahun)<50)
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: {{getPeriodePerformance($user->id, $tahun)}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{getPeriodePerformance($user->id, $tahun)}}%</div>
                                        </div>
                                        @endif
                                    </td>
                                    <td style="text-align:center;"><a href="{{route('client.performancereport.details', ['user_id'=>$user->id, 'periode_th'=>$tahun])}}"><button class="btn btn-primary btn-sm">Details</button></a></td>
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
//    var progressBarColor;
//
//    var someValueToCheck = 5;
//
//    if (someValueToCheck >= 10)
//        progressBarColor = "#A52A2A";
//    else if (someValueToCheck >= 5)
//        progressBarColor = "#00FFFF";
//    else
//        progressBarColor = "#00008B";
//
//    $("#progressbar").css('background-color', progressBarColor);


    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>
@endsection
