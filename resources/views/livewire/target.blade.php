<div>
    <!--LIVEWIRE Target-->

    <div>
        <div class="form-group">
            <label for="exampleFormControlSelect1"><b>Business Categories :</b></label>
            <select name="category" wire:model="selectedCategory" class="form-control" required="">
                <option hidden>Choose a categories</option>
                @foreach($category as $bc)
                <option value='{{ $bc->id }}-{{ $bc->category }}'>{{ $bc->category }}</option>
                @endforeach
            </select>
        </div>
    </div>

    @if (!is_null($selectedCategory))
    <div>
        <div class="form-group">
            <label><b>Strategic Objective Library:</b></label>
            <select name="SO" wire:model="selectedSo"class="form-control" size="10" required="">
                @if ($so != null)

                @foreach($so as $so)
                <option value='{{ $so->id }}-{{ $so->so }}'> - {{ $so->so }}</option>
                @endforeach
                <option value="0"">- Other</option>

                @else
                <option value='' disabled="">No Data</option>
                @endif
            </select>
        </div>
    </div>
    @endif


    @if (!is_null($selectedSo))
    @if ($selectedSo == 0)
    <div>
        <div class="form-group">
            <label><b>Custom Strategic Objective :</b></label>
            <input name="so_custom" type="text" class="form-control" required="">
        </div>
    </div>
    @endif
    @endif



    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
</div>
