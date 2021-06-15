<div>

    <!--LIVEWIRE Target KPI-->

    <div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Strategic Objective :</label>
            <select name="category" wire:model="selectedSo" class="form-control" required="">
                <option hidden>Choose a categories</option>
                @foreach($so as $so)
                <option value='{{ $so->id }}'>{{ $so->so }}</option>
                @endforeach
            </select>
        </div>
    </div>

    @if ($selectedSo != NULL)
    <div>
        <div class="form-group">
            <label>KPI :</label>
            <select name="SO" wire:model="selectedKpi"class="form-control" size="5" required="">
                @if ($kpi != null)

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

    @if ($selectedKpi != NULL)
    <div>
        <div class="form-group">
            <label>Target :</label>
            <input name="target" type="number" class="form-control" required="">
        </div>
    </div>
    @endif
    {{-- The whole world belongs to you. --}}
</div>
