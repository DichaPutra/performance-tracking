<div>
    <!--Livewire addInitiative-->
    <div>
        <div class="form-group">
            <label for="exampleFormControlSelect1"><b>Strategic Initiative Library :</b></label>
            <select name="id_target_so" wire:model="selectedSo" class="form-control" required="">
                <option hidden>Choose a categories</option>
                @foreach($si as $si)
                <option value='{{ $si->id }}'>{{ $si->si }}</option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
</div>
