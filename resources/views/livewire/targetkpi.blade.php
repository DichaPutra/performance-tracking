<div>

    <!--LIVEWIRE Target KPI-->

    <div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Strategic Objective :</label>
            <select name="category" wire:model="selectedCategory" class="form-control" required="">
                <option hidden>Choose a categories</option>
                @foreach($so as $so)
                <option value='{{ $so->id }}'>{{ $so->so }}</option>
                @endforeach
            </select>
        </div>
    </div>
    {{-- The whole world belongs to you. --}}
</div>
