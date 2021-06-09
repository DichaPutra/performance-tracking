<div>
    <!--LIVEWIRE Target-->
    <form method="POST" action="{{route('client.target.addso')}}">
        @csrf
        <div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Business Categories :</label>
                <select name="category" wire:model="selectedCategory" class="form-control" required="">
                    @if (is_null($selectedCategory))<option value=''>Choose a categories</option>@endif
                    @foreach($categories as $bc)
                    <option value='{{ $bc->id }}-{{ $bc->category }}'>{{ $bc->category }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        @if (!is_null($selectedCategory))
        <div>
            <div class="form-group">
                <label>Strategic Objective :</label>
                <select name="SO" wire:model="selectedSo"class="form-control" size="10" required="">
                    @foreach($so as $so)
                    <option value='{{ $so->id }}-{{ $so->so }}'> - {{ $so->so }}</option>
                    @endforeach
                    <option value="0"">- Other</option>
                </select>
            </div>
        </div>
        @endif

        @if (!is_null($selectedSo))
        @if ($selectedSo == 0)
        <div>
            <div class="form-group">
                <label>Custom Strategic Objective :</label>
                <input name="so_custom" type="text" class="form-control" required="">
            </div>
        </div>
        @endif
        @endif

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="Add">
        </div>
    </form>

    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
</div>
