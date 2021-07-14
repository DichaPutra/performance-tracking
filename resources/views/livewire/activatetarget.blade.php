<div>
    <!--Message--> 
    <div class="alert alert-primary" style="height: 10%;" role="alert">
        <div class="row">
            <div class="col-md-12">
                Harap lengkapi data berikut sebelum melanjutkan :
                <ul style="margin-right: 15px;">
                    <li>Starting Period</li>
                    <li>Weight</li>
                </ul>
            </div>
        </div>
    </div><br>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Starting Period : </label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control " name="name" value="1" required="" autocomplete="name" autofocus="" disabled="">
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead style="background-color: #F8F9FC;">
                <tr>
                    <th>No </th>
                    <th>Strategic Objective</th>
                    <th>KPI</th>
                    <th>Timeframe</th>
                    <th>Target</th>
                    <th style="width: 20%">Weight</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datakpi as $kpi)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        {{$kpi->so}}
                        @if($kpi->id_so_library == null)
                        <span class="badge badge-secondary float-right"><i class="fa fa-user"></i> </span>
                        @endif
                    </td>
                    <td>
                        {{$kpi->kpi}}
                        @if($kpi->id_kpi_library == null)
                        <span class="badge badge-secondary float-right"><i class="fa fa-user"></i> </span>
                        @endif
                    </td>
                    <td>{{$kpi->timeframe_target}}</td>
                    <td>
                        @if($kpi->unit == 'Rp' || $kpi->unit == 'rp' || $kpi->unit == 'RP')
                        Rp {{ $kpi->target}},-
                        @else 
                        {{ $kpi->target}} {{$kpi->unit}}
                        @endif
                    </td>
                    <td>
                        <div class="input-group mb-3">
                            <input name="weight[]" wire:model='weight[]' type="number" class="form-control" min="0" max="100" placeholder=" 1 - 100 %" required="">
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="5" style="text-align: center;"><b>Total Weight</b></td>
                    <td>
                        <input type="hidden" name="totalWeightHidden" id="totalWeightHidden">
                        <input type="text" name="totalWeight" id="totalWeight" disabled=""> 
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <hr>
    <div class="row">
        <div class="col-md-10">
            ....
        </div>
        <div class="col-md-2">
            <div class="float-right">
                <a href="{{route('client.target.details', ['idpersonnel'=>$data->id, 'tahun'=>$tahun])}}" class="btn btn-sm btn-secondary ">Cancel</a>
                <input type="submit" class=" btn btn-primary btn-sm" value="Activate">
            </div>
        </div>
    </div>

</div>
