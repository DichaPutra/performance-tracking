@extends('layouts.app2')

@section('head')
<?php $page = 'personil' ?>
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Personil</li>
            @if($edit == 1)
            <li class="breadcrumb-item active" aria-current="page"> Edit</li>
            @else
            <li class="breadcrumb-item active" aria-current="page"> Details</li>
            @endif
        </ol>
    </nav><br>

    <!-- Page Heading -->
    <!--    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-user-alt"></i> Details</h1>
        </div>-->

    <!-- Content Row -->
    <div class="card shadow mb-4 animated--grow-in">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            
            @if($edit == 0)
            <h6 class="m-0 font-weight-bold text-primary">Details</h6>
            <div class="float-right">
                <a href="{{route('client.personil.editpersonil')}}"><button class="btn btn-sm btn-primary">Edit</button></a>
                <a href="#" onclick="return confirm('All personnel related data will be deleted, Are you sure you want to delete this personnel? ');" ><button class="btn btn-sm btn-danger">Delete</button></a>
            </div>
            @else
            <h6 class="m-0 font-weight-bold text-primary">Edit</h6>
            @endif
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    @if($edit == 0)
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control " name="name" value="Charde Marshall" required="" autocomplete="name" autofocus="" disabled="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control " name="email" value="chardemarshall@mail.com" required="" autocomplete="email" disabled="">
                        </div>
                    </div>
                    @endif

                    @if($edit == 1)
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control " name="name" value="Charde Marshall" required="" autocomplete="name" autofocus="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control " name="email" value="chardemarshall@mail.com" required="" autocomplete="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control " name="password" required="" autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required="" autocomplete="new-password">
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="position" class="col-md-4 col-form-label text-md-right">Position</label>
                        <div class="col-md-6">
                            @if($edit==1)
                            <input type="text" class="form-control" list="pos" value="Regional Director">
                            @else
                            <input type="text" class="form-control" list="pos" value="Regional Director" disabled="">
                            @endif
                            <datalist id="pos">
                                <option value="Finance">
                                <option value="Production">
                                <option value="Marketing">
                                <option value="Purchasing">
                                <option value="Inventory">
                            </datalist>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Company Name</label>
                        <div class="col-md-6">
                            <input name="companyname"type="text" class="form-control" value="PT Bintang Jaya Abadi" readonly="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Company  Address</label>
                        <div class="col-md-6">
                            <textarea class="form-control" rows="4" readonly="">Jl. Pati Unus No.33, RT.7/RW.8, Kuningan, Gunung, Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12120</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            @if($edit == 1)
            <div class="float-right">
                <a href="{{ URL::previous() }}"><button type="button" class="btn btn-secondary">Cancel</button></a>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
            @else
            <div class="float-right">
                <a href="{{ route('client.personil') }}"><button type="button" class="btn btn-secondary">Back</button></a>
            </div>
            @endif
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>
@endsection
