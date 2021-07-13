@extends('layouts.app2')

@include('client.otherelement')
<!--berisikan function di view-->

@section('head')
<?php $page = 'target'; ?>
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
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-bullseye"></i> Target</h1>
    </div>

    <!--Content-->
    <div class="row">

        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4 animated--grow-in">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">List personnel</h6>
                </div>

                <!-- Card Body -->
                <div class="card-body">

                    <!--Success Message--> 
                    @if ( (session('success')))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('success') }}
                    </div>
                    @endif

                    <form action="{{ route('client.target') }}" method="GET" class="float-right" style="width: 30%; margin-bottom: 50px;">
                        <label>periode th :</label> 
                        <select name='tahun' onchange='if (this.value != <?php echo $tahun; ?>) {
                                    this.form.submit();
                                }' class="form-control">
                            <option @if ($tahun == date('Y')) selected @endif>{{ date('Y') }}</option>
                            @for ($i = 1; $i < 5; $i++)
                            <option @if ($tahun == date('Y') + $i) selected @endif>{{ date('Y') + $i }}</option>
                            @endfor
                        </select>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead style="background-color: #F8F9FC;">
                                <tr>
                                    <th style="width: 15%;">Level</th>
                                    <th style="width: 15%;">Level Name</th>
                                    <th>PIC Name</th>
                                    <th style="text-align: center;width: 10%;">Strategic Objective</th>
                                    <th style="text-align: center;width: 10%;">KPI</th>
                                    <th style="text-align: center;width: 10%;">Status</th>
                                    <th style="width: 8%;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $user)
                                <tr>
                                    <td style="background-color: {{ color($user->level) }};">
                                        {{ levelName($user->level) }}</td>
                                    <td>{{ $user->level_name }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td style="text-align:center;">{{ getCountSO($user->id, $tahun) }}</td>
                                    <td style="text-align:center;">{{ getCountKPI($user->id, $tahun) }}</td>
                                    <td style="text-align:center;">
                                        <div @if (getStatusTarget($user->id, $tahun) == 'Not Active') style="color: red;" @else style="color: green;" @endif>
                                              {{ getStatusTarget($user->id, $tahun) }}
                                    </div>
                                </td>
                                <td style="text-align: center;width: 8%;">
                                    @if (getStatusTarget($user->id, $tahun) == 'Not Active')
                                    <a href="{{ route('client.target.details', ['idpersonnel' => $user->id, 'tahun' => $tahun]) }}">
                                        <button class="btn btn-primary btn-sm">Details</button>
                                    </a>
                                    @else
                                    <a href="{{ route('client.target.check', ['idpersonnel' => $user->id, 'tahun' => $tahun]) }}">
                                        <button class="btn btn-success btn-sm">Check</button>
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
