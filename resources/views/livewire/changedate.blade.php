<div>
    <div class="row">
        <div class="col-md-6">
            <label><b>Tahun :</b></label>
            <div class="input-group mb-3">
                <select name="tahun" wire:model="selectedtahun" class="form-control" required="">
                    <option value=" " hidden>select...</option>
                    @foreach ($alltahun as $allth)
                    <option value="{{$allth->tahun}}" >{{$allth->tahun}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @if ($selectedtahun != null)
        <div class="col-md-6">
            <label><b>Bulan :</b></label>
            <div class="input-group mb-3">
                <select name="bulan" class="form-control" required="">
                    <option value=" " hidden>select...</option>
                    @foreach($allbulan as $bln)
                    <option value="{{$bln->bulan}}">{{date('F', mktime(0, 0, 0, $bln->bulan, 10))}}</option>
                    @endforeach

<!--                    @for($i = 1; $i <= 12; $i++)
                    <option value="{{$i}}">{{date('F', mktime(0, 0, 0, $i, 10))}}</option>
                    @endfor-->
                </select>

            </div>
        </div>
        @endif
    </div>
</div>
