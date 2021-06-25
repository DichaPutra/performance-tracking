<div>

    <!--LIVEWIRE Target KPI-->

    <div>
        <div class="form-group">
            <label for="exampleFormControlSelect1"><b>Strategic Objective :</b></label>
            <select name="id_target_so" wire:model="selectedSo" class="form-control" required="">
                <option hidden>Choose a categories</option>
                @foreach($so as $so)
                <option value='{{ $so->id }}'>{{ $so->so }}</option>
                @endforeach
            </select>
        </div>
    </div>

    @if ($selectedSo != null)
    <div>
        <div class="form-group">
            <label><b>KPI Library :</b></label>
            <select name="id_kpi_library" wire:model="selectedKpi"class="form-control" size="5" >
                @if ($kpi != null && $kpi != 'nokpilibrary' )

                @foreach($kpi as $kpi)
                <option value='{{ $kpi->id }}-{{ $kpi->kpi }}'> - {{ $kpi->kpi }}</option>
                @endforeach
                <option value="0"">- Other</option>

                @else
                <option value='' disabled="">No Data</option>
                @endif
            </select>
        </div>
    </div>
    @endif

    @if ($selectedKpi == '0' || $kpi == 'nokpilibrary')
    <div>
        <div class="form-group">
            <label><b>Custom KPI :</b></label>
            <input name="customKpi" type="text" class="form-control" required="" placeholder="Input your custom KPI description here..."><br>
            <div class="row">
                <div class="col-md-6">
                    <label><b>Measurement Unit :</b></label>
                    <select name="measurement" class="form-control">
                        <option value=" " hidden>select...</option>
                        <option value="rating">Rating</option>
                        <option value="rangking">Rangking</option>
                        <option value="absolute number">Absolute Number</option>
                        <option value="index">Index</option>
                        <option value="percentages">Percentages</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label><b>Polarization :</b></label>
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
                    <input name="target" type="number" class="form-control" required="" placeholder="Input your target here...">
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-6">
                    <label><b>Weight :</b></label>
                    <div class="input-group mb-3">
                        <input name="weight" type="number" class="form-control" min="0" max="100" placeholder="KPI Weight 1 - 100">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">%</span>
                        </div>
                    </div>
                </div>
            </div>
            <!--            <div class="col-auto">
                            <label class="sr-only" for="inlineFormInputGroup">Username</label>
                        </div>-->
        </div>
    </div>

    @endif

    @if ($selectedKpi != NULL  && $selectedKpi != '0')
    <div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label><b>Measurement Unit :</b></label>
                    <input name="" value="{{$kpidata->measurement}}" type="text" class="form-control" readonly="">
                    <input name="measurement" value="{{$kpidata->measurement}}" type="hidden" class="form-control" readonly="">
                </div>
                <div class="col-md-6">
                    <label><b>Polarization :</b></label>
                    <input name="" value="{{$kpidata->polarization}}" type="text" class="form-control" readonly="">
                    <input name="polarization" value="{{$kpidata->polarization}}" type="hidden" class="form-control" readonly="">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label><b>Unit / Satuan :</b></label>
                    <input name="unit" type="text" value="{{$kpidata->unit}}" class="form-control" readonly="">
                </div>
                <div class="col-md-6">
                    <label><b>Target :</b></label>
                    <input name="target" type="number" class="form-control" required="" placeholder="Input your target here...">
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-6">
                    <label><b>Weight :</b></label>
                    <div class="input-group mb-3">
                        <input name="weight" type="number" class="form-control" min="0" max="100" placeholder="KPI Weight 1 - 100">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    {{-- The whole world belongs to you. --}}
</div>
