<div>
    <!--Livewire addInitiative-->
    <div>
        <div class="form-group">
            <label for="exampleFormControlSelect1"><b>Strategic Initiative Library :</b></label>
            <select name="id_si_library" wire:model="selectedsi" class="form-control" required="">
                <option hidden>Choose a strategic initiative library</option>
                @foreach($si as $si)
                <option value='{{ $si->id }}'>- {{ $si->si }}</option>
                @endforeach
                <option value='0'>- Other</option>
            </select>
        </div>
    </div>

    @if ($selectedsi == '0')
    <div>
        <div class="form-group">
            <label><b>Custom Strategic Initiative :</b></label>
            <input name="customsi" type="text" class="form-control" required="" placeholder="Input your custom Strategic Initiative here..."><br>
        </div>
    </div>

    @endif

    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
</div>
