<div>

    <!--LIVEWIRE Target KPI-->

    <div>
        <div class="form-group">
            <label for="exampleFormControlSelect1"><b>Strategic Objective :</b></label>
            <select name="id_target_so" wire:model="selectedSo" class="form-control" required>
                <option hidden>Choose a categories</option>
                @foreach($so as $so)
                <option value='{{ $so->id }}'>{{ $so->so }}</option>
                @endforeach
            </select>
        </div>
    </div>

    @if ($selectedSo)
    @if ($isCustomKpi == null)
    <div>
        <div class="form-group">
            <label><b>KPI Library :</b></label>  
            <div>
                <button wire:click="customKPI" class="btn btn-sm btn-secondary" style="margin-bottom: 5px;">Custom KPI</button>
            </div>
            <select name="id_kpi_library" wire:model="selectedKpi"class="form-control" size="5" required>
                @foreach($kpi as $kpi)
                <option value='{{ $kpi->id }}-{{ $kpi->kpi }}'> - {{ $kpi->kpi }}</option>
                @endforeach
                <!--<option value="0"">- Other</option>-->
            </select>
        </div>
    </div>
    @endif
    @endif

    @if ($isCustomKpi)
    <div>
        <div class="form-group">
            <label><b>Custom KPI :</b></label>
            <input name="customKpi" type="text" class="form-control" required="" placeholder="Input your custom KPI description here..."><br>

            <div class="row">
                <div class="col-md-6">
                    <label><b>Measurement Unit :</b></label>
                    <select name="measurement" class="form-control">
                        <option value=" " hidden>select...</option>
                        <option value="percentages">Percentages</option>
                        <option value="absolute number">Absolute Number</option>
                        <option value="index">Index</option>
                        <option value="rating">Rating</option>
                        <!--<option value="rangking">Rangking</option>-->
                    </select>
                </div>

                <div class="col-md-6">
                    <label><b>Aim to :</b></label>
                    <select name="polarization" class="form-control">
                        <option value=" " hidden>select...</option>
                        <option value="maximize">Maximize</option>
                        <option value="minimize">Minimize</option>
                    </select>
                </div>
            </div> 
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label><b>Unit / Satuan :</b></label>
                    <input name="unit" type="text" value="" class="form-control" placeholder="Input your unit here...">
                </div>
                <div class="col-md-6">
                    <label><b>Target :</b></label>
                    <input name="target" min="1" type="number" class="form-control" required="" placeholder="Input your target here...">
                </div>
            </div><br>
            <div class="row">

                <div class="col-md-6">
                    <label><b>Timeframe Target :</b></label>
                    <div class="input-group mb-3">
                        <select name="timeframe" class="form-control" required>
                            <option value="" hidden>select...</option>
                            <option value="bulanan">Bulanan</option>
                            <option value="triwulan">Triwulan</option>
                            <!--<option value="quartal">Quartal</option>-->
                            <option value="semester">Semester</option>
                            <option value="tahunan">Tahunan</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if ($selectedKpi != NULL  && $isCustomKpi != '1')
    <div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <label><b>Formula :</b></label>
                    <textarea class="form-control" readonly="">{{$kpidata->formula}}</textarea>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-6">
                    <label><b>Measurement Unit :</b></label>
                    <input name="" value="{{$kpidata->measurement}}" type="text" class="form-control" readonly="">
                    <input name="measurement" value="{{$kpidata->measurement}}" type="hidden" class="form-control" required="" readonly="">
                </div>
                <div class="col-md-6">
                    <label><b>Aim to :</b></label>
                    <input name="" value="{{$kpidata->polarization}}" type="text" class="form-control" readonly="">
                    <input name="polarization" value="{{$kpidata->polarization}}" type="hidden" class="form-control" required="" readonly="">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label><b>Unit / Satuan :</b></label>
                    <input name="unit" type="text" value="{{$kpidata->unit}}" class="form-control" required="" readonly="">
                </div>
                <div class="col-md-6">
                    <label><b>Target :</b></label>
                    <input name="target" type="number" min="1" class="form-control"  placeholder="Input your target here..." required="">
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-6">
                    <label><b>Timeframe Target :</b></label>
                    <div class="input-group mb-3">
                        <select name="timeframe" class="form-control" required>
                            <option value="" hidden>select...</option>
                            <option value="bulanan">Bulanan</option>
                            <option value="triwulan">Triwulan</option>
                            <!--<option value="quartal">Quartal</option>-->
                            <option value="semester">Semester</option>
                            <option value="tahunan">Tahunan</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        @endif
        {{-- The whole world belongs to you. --}}
    </div>
