<div>
    <!--LIVEWIRE Target-->

    <div>
        <div class="form-group">
            <label for="exampleFormControlSelect1"><b>Business Categories :</b></label>
            <select name="category" wire:model="selectedCategory" class="form-control" required="">
                <option hidden>Choose a categories</option>
                @foreach($category as $bc)
                <option value='{{ $bc->id }}'>{{ $bc->category }}</option>
                @endforeach
            </select>
        </div>
    </div>

    @if($so != null)
    <div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label><b>Aspect :</b></label>
                    <select name="Aspect" wire:model="selectedAspect"class="form-control" required="">
                        <option value='All'>  All</option>
                        <option value='Proses Bisnis'>  Proses Bisnis</option>
                        <option value='Pelanggan'>  Pelanggan</option>
                        <option value='Keuangan'>  Keuangan</option>
                        <option value='SDM'>  SDM</option>
                        <option value='IT'>  IT</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="form-group">
            <label><b>Strategic Objective Library:</b></label>
            <select name="SO" wire:model="selectedSo"class="form-control" size="10" required="">
                @foreach($so as $so)
                <option value='{{ $so->id }}-{{ $so->so }}'> - {{ $so->so }}</option>
                @endforeach
                <option value='0'> - Other</option>

            </select>
        </div>
    </div>
    @endif

    @if($selectedSo == '0')
    <div>
        <div class="form-group">
            <label><b>Custom Strategic Objective :</b></label>
            <input name="so_custom" type="text" class="form-control" required="">
        </div>
    </div>
    @endif

    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
</div>
