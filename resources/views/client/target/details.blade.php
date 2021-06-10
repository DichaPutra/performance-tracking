@extends('layouts.app2')

@include('client.otherelement')

@section('head')
<?php $page = 'target' ?>
@endsection

@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Target</li>
            <li class="breadcrumb-item active" aria-current="page">Details</li>
        </ol>
    </nav><br>

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4 animated--grow-in">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Details</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Level</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control " name="name" value="{{levelName($data->level)}}" required="" autocomplete="name" autofocus="" disabled="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="position" class="col-md-4 col-form-label text-md-right">Position</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" list="pos" value="{{$data->position}}" disabled="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">PIC Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control " name="name" value="{{$data->name}}" required="" autocomplete="name" autofocus="" disabled="">
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
                                <label for="position" class="col-md-4 col-form-label text-md-right">Number of SO</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" list="pos" value="{{getCountSO($data->id)}}" disabled="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="position" class="col-md-4 col-form-label text-md-right">Number of KPI</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" list="pos" value="15" disabled="">
                                </div>
                            </div>
                        </div>
                    </div><br>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Strategic Objective</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">KPI</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <!-- ========= Tab 1 Strategic Objective =========== -->
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <br>

                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;"> </h6>
                                <h5 class="m-0 font-weight-bold text-primary" style="text-align: center;">Strategic Objective</h5>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalAdd">
                                    <i class="fas fa-plus"></i>
                                </button>

                                <!-- Modal Add-->
                                <div class="modal fade bd-example-modal-lg" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Strategic Objective </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- **** Form Add SO **** -->

                                                <form method="POST" action="{{route('client.target.addso')}}">
                                                    @csrf
                                                    <input type="hidden" name="userid" value="{{$data->id}}">

                                                    @livewire('target', ['userid'=>$data->id])

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <input type="submit" class="btn btn-primary" value="Add">
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Card Body -->
                            <div class="card-body">
                                <!--Success Message--> 
                                @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ session('success') }}
                                </div>
                                @endif

                                <!-- Content Row -->
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead style="background-color: #F8F9FC;">
                                            <tr>
                                                <th style="width: 10%; text-align: center;">No</th>
                                                <th>Strategic Objective</th>
                                                <th style="width: 20%;">Operation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dataso as $so)
                                            <tr>
                                                <td style="text-align: center;">{{ $loop->iteration }}</td>
                                                <td>{{$so->so}}</td>
                                                <td style="text-align: center;"><a href="#" onclick="return confirm('All KPI related data will be deleted, Are you sure you want to delete this Strategic Objective? ');"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a></td>
                                            </tr>  
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Content Row -->
<!--                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead style="background-color: #F8F9FC;">
                                            <tr>
                                                <th style="width: 10%; text-align: center;">No</th>
                                                <th style="width: 20%;">Strategic Objective</th>
                                                <th>Description</th>
                                                <th>Operation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="text-align: center;">1</td>
                                                <td>Peningkatan Company Value</td>
                                                <td>Manajemen dari waktu ke waktu terus berusaha untuk meningkatkan kinerja perusahaan untuk meningkatkan nilai perusahaan sehingga harapan dari pemegang saham dan seluruh stakeholder yang lain dapat dipenuhi</td>
                                                <td style="text-align: center;"><a href="#" onclick="return confirm('All KPI related data will be deleted, Are you sure you want to delete this Strategic Objective? ');"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">2</td>
                                                <td>Optimalisasi Cash Flow</td>
                                                <td>Dalam mengelola perusahaan maka faktor cash flow menjadi kunci utama dalam keberlangsungan bisnis. Perusahaan boleh jadi memperoleh laba, namun jika tidak ada cash flow maka kegiatan usaha dapat berhenti. Cash flow yang baik dapat menjaga kepercayaan perusahaan terhadap pihak yang berkepentingan (kreditor, pemegang saham, karyawan) dengan selalu menjaga komitmen pembayaran tepat pada waktunya</td>
                                                <td style="text-align: center;"><a href="#" onclick="return confirm('All KPI related data will be deleted, Are you sure you want to delete this Strategic Objective? ');"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">3</td>
                                                <td>Efisiensi dan efektivitas biaya</td>
                                                <td>Cerminan dari upaya manajemen dalam melakukan efisiensi biaya dan efektivitas biaya yang tercermin dari ukuran-ukuran keuangan yang dapat menggambarkan pertumbuhan biaya yang dapat dikendalikan dengan baik</td>
                                                <td style="text-align: center;"><a href="#" onclick="return confirm('All KPI related data will be deleted, Are you sure you want to delete this Strategic Objective? ');"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">4</td>
                                                <td>Peningkatan Profit</td>
                                                <td>Upaya manajemen dalam meningkatkan tingkat keuntungan</td>
                                                <td style="text-align: center;"><a href="#" onclick="return confirm('All KPI related data will be deleted, Are you sure you want to delete this Strategic Objective? ');"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center;">5</td>
                                                <td>Peningkatan Total Pendapatan</td>
                                                <td>Upaya manajemen dalam meningkatkan tingkat pendapatan dari seluruh usaha yang dilakukan oleh perusahaan baik berupa hasil penjualan seluruh produk serta pendapatan jasa.</td>
                                                <td style="text-align: center;"><a href="#" onclick="return confirm('All KPI related data will be deleted, Are you sure you want to delete this Strategic Objective? ');"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></a></td>
                                            </tr>                           
                                        </tbody>
                                    </table>
                                </div>-->
                            </div>


                        </div>
                        <!--end of tab 1-->


                        <!-- ========== Tab 2 KPI ========== -->
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <br>
                            <!-- Card Header - Dropdown -->
                            <div class="card-header">
                                <h5 class="m-0 font-weight-bold text-primary" style="text-align: center;">KPI</h5>
                            </div><br>
                            <!--KPI per SO-->
                            <div id="accordion">
                                <!--Card 1-->
                                <div class="card">
                                    <!--Accordion head-->
                                    <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" style="background-color: #FEE599">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <b>Objective :</b> Peningkatan Company Value
                                            </button>
                                            <button class="btn btn-sm btn-primary float-right" data-bs-toggle="modal" data-bs-target="#modalAdd1"><i class="fas fa-plus"></i></button>
                                        </h5>
                                    </div>

                                    <!-- Modal Add-->
                                    <div class="modal fade bd-example-modal-lg" id="modalAdd1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add KPI </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- **** Form Add SO **** -->
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Strategic Objective :</label>
                                                        <input type="text" value="Peningkatan Company Value" class="form-control" readonly="">
                                                    </div><br>

                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect2">Key Performance Indicator :</label>
                                                        <select class="form-control" id="exampleFormControlSelect2" size="10">
                                                            <option>Peningkatan Company Value</option>
                                                            <option>Optimalisasi Cash Flow</option>
                                                            <option>Efisiensi dan efektivitas biaya</option>
                                                            <option>Peningkatan Profit</option>
                                                            <option>Peningkatan Total Pendapatan</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Content Collabse--> 
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead style="background-color: #F8F9FC;">
                                                        <tr>
                                                            <th style="text-align: center;">No</th>
                                                            <th>KPI</th>
                                                            <th>Unit of Measurement</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="text-align: center;">1</td>
                                                            <td>Return on Equity (ROE) - Tingkat pengembalian atas modal yang telah ditanamkan</td>
                                                            <td style="text-align: center;">%</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="text-align: center;">2</td>
                                                            <td>Return on Investment (ROI) - Tingkat pengembalian atas investasi yang telah ditanamkan</td>
                                                            <td style="text-align: center;">%</td>
                                                        </tr> 
                                                        <tr>
                                                            <td style="text-align: center;">3</td>
                                                            <td>Tingkat Kesehatan (Standar BUMN) - Kinerja berdasarkan atas sekumpulan indikator Keuangan,  Operasional dan Administratif sesuai standard yang ditentukan oleh BUMN. Indikator Keuangan  meliputi ROE, ROI, CASH RATIO, Current Ratio, Collection Periode, Perputaran Persediaan, Perputaran Total Asset, Rasio Modal Sendiri thd Total Aktiv Sedangkan indikator operasional adalah berkaitan dengan produktivitas tanaman, rendemen, % produk berkualitas tinggi serta penjualan langsung.</td>
                                                            <td style="text-align: center;">Score</td>
                                                        </tr> 
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Card 2-->
                                <div class="card">
                                    <!--Accordion head-->
                                    <div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" style="background-color: #FEE599">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                <b>Objective :</b> Optimalisasi Cash Flow
                                            </button>
                                            <button class="btn btn-sm btn-primary float-right"><i class="fas fa-plus"></i></button>
                                        </h5>
                                    </div>
                                    <!--Content Collabse--> 
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead style="background-color: #F8F9FC;">
                                                        <tr>
                                                            <th style="text-align: center;">No</th>
                                                            <th>KPI</th>
                                                            <th>Unit of Measurement</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="text-align: center;">1</td>
                                                            <td>Cash Rasio - Kemampuan perusahaan dalam menyediakan uang tunai atau setara kas dibandingkan dengan tingkat kewajiban lancar (kurang dari setahun)</td>
                                                            <td style="text-align: center;">%</td>
                                                        </tr> 
                                                        <tr>
                                                            <td style="text-align: center;">2</td>
                                                            <td>Current Ratio - Kemampuan perusahaan dalam menjaga aktiva lancar sehingga  kewajiban lancar (kurang dari setahun) selalu dapat terpenuhi </td>
                                                            <td style="text-align: center;">%</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                        <!--end of tab 2-->
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
        $('#dataTable').DataTable({
            "paging": false,
            "searching": false,
        });
    });
</script>
@endsection
