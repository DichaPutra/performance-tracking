<div>

    <!--LIVEWIRE Target KPI-->

    <div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Strategic Objective :</label>
            <select name="so" wire:model="selectedSo" class="form-control" required="">
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
            <label>KPI Library :</label>
            <select name="kpi" wire:model="selectedKpi"class="form-control" size="5" required="">
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
            <label>Custom KPI :</label>
            <input name="customKpi" type="text" class="form-control" required=""><br>
            <div class="row">
                <div class="col-md-6">
                    <label>Target :</label>
                    <input name="target" type="number" class="form-control" required="">
                </div>
                <div class="col-md-6">
                    <label>Measurement Unit :</label>
                    <select class="form-control">
                        <option value=" " hidden>select...</option>
                        <option value="rating">Rating</option>
                        <option value="rangking">Rangking</option>
                        <option value="absolute number">Absolute Number</option>
                        <option value="index">Index</option>
                        <option value="percentages">Percentages</option>
                    </select>

                    <!--<input name="measurementUnit" type="text" class="form-control" required="">-->
                </div>
            </div>
        </div>
    </div>

    @endif

    @if ($selectedKpi != NULL  && $selectedKpi != '0')
    <div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label>Target :</label>
                    <input name="target" type="number" class="form-control" required="">
                </div>
                <div class="col-md-6">
                    <label>Measurement Unit :</label>
                    <input name="target" value="{{$kpidata->measurement}}" type="text" class="form-control" readonly="">
                </div>
            </div>
        </div>
    </div>
    @endif
    {{-- The whole world belongs to you. --}}
</div>
