@extends('layouts.app2')

@section('head')
<?php $page = 'capaian' ?>
@endsection

@section('content')
<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">

            <div class="card shadow mb-4 animated--grow-in">

                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Capaian</h6>

                    <select class="form-control form-control-sm float-right" style="width: 20%;">
                        @for ($i = date('n'); $i > 0; $i--)

                        <!--                        <option>February</option>
                                                <option>March</option>
                                                <option>April</option>-->
                        <option selected="" value="{{$i}}">May</option>
                        @endfor
                    </select>

                </div>

                <!-- Card Body -->
                <div class="card-body">

                    <br>
                    <!-- Card Header - Dropdown -->
                    <div class="card-header">
                        <h5 class="m-0 font-weight-bold text-primary" style="text-align: center;">KPI</h5>
                    </div><br>


                    <!--KPI Table-->
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead style="background-color: #F8F9FC;">
                            <tr>
                                <th style="width: 8%; text-align: center;">No</th>
                                <th style="width: 52%;">KPI</th>
                                <th>Target</th>
                                <th>Actual</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: center;">1</td>
                                <td>
                                    <b>Return on Equity (ROE)</b><br>
                                    Tingkat pengembalian atas modal yang telah ditanamkan
                                </td>
                                <td>60%</td>
                                <td><input type="text" class="form-control"></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">2</td>
                                <td>
                                    <b>Return on Investment (ROI)</b><br>
                                    Tingkat pengembalian atas investasi yang telah ditanamkan
                                </td>
                                <td>60%</td>
                                <td><input type="text" class="form-control"></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">3</td>
                                <td><b>Tingkat Kesehatan (Standar BUMN)</b><br>
                                    Kinerja berdasarkan atas sekumpulan indikator Keuangan, Operasional dan Administratif sesuai standard yang ditentukan oleh BUMN. Indikator Keuangan meliputi ROE, ROI, CASH RATIO, Current Ratio, Collection Periode, Perputaran Persediaan, Perputaran Total Asset, Rasio Modal Sendiri thd Total Aktiv Sedangkan indikator operasional adalah berkaitan dengan produktivitas tanaman, rendemen, % produk berkualitas tinggi serta penjualan langsung.
                                </td>
                                <td>60%</td>
                                <td><input type="text" class="form-control"></td>
                            </tr>                          
                        </tbody>
                    </table>

                    <!--<button></button>-->
                    <button class="btn btn-primary float-right">Save</button>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable({
            "paging": false,
            "searching": false,
        });
    });
</script>
@endsection
