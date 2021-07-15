<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\active_target_kpi;

class Changedate extends Component {

    public $alltahun;
    public $selectedtahun;
    public $allbulan;

    public function mount()
    {
        
    }

    public function render()
    {
        return view('livewire.changedate');
    }

    public function updatedSelectedTahun()
    {
        $this->alltahun = active_target_kpi::groupby('tahun')
                ->select('tahun')
                ->where('id_user', Auth::user()->id)
                ->get();
        $this->allbulan = active_target_kpi::groupby('bulan')
                ->select('bulan')
                ->where('id_user', Auth::user()->id)
                ->where('tahun', $this->selectedtahun)
                ->get();
    }

}
