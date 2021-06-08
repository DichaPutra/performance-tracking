<div>
    <!--LIVEWIRE Target-->
    <div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Business Categories :</label>
            <select name="Category" wire:model="selectedCategory" class="form-control">
                <option value=''>Choose a categories</option>
                @foreach($categories as $bc)
                <option value='{{ $bc->id }}'>{{ $bc->category }}</option>
                @endforeach
            </select>
        </div>
    </div>

    @if (!is_null($selectedCategory))
    <div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Strategic Objective :</label>
            <select name="Category" wire:model="selectedCategory"class="form-control" size="10">
                @foreach($so as $so)
                <option value='{{ $so->id }}'>{{ $so->so }}</option>
                @endforeach
            </select>
        </div>
    </div>
    @endif
    
    @if (!is_null($selectedSo))
    {{$selectedSo}}
    @endif
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
</div>
