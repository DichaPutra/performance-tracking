<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\target_so;
use App\Models\target_kpi;
use App\Models\kpi_library;

class Targetkpi extends Component {

    public $id_personnel;
    public $so; //series object of SO
    public $selectedSo; // ID 
    public $kpi; // series object of KPI 
    public $selectedKpi; // ID
    public $kpidata;
    public $tahun;
    public $isCustomKpi; // 1 = yes 

    public function mount()
    {
        $this->so = target_so::where('id_user', $this->id_personnel)->where('periode_th', $this->tahun)->get();
    }

    public function render()
    {
        return view('livewire.targetkpi');
    }

    public function updatedSelectedSo()
    {

        $this->selectedKpi = null;
        $this->isCustomKpi = null;

        // ambil id_so_library data dari tabel target_so
        $selectedso = target_so::where('id', $this->selectedSo)->first();
        $idsolibrary = $selectedso->id_so_library;

        $this->kpi = kpi_library::where('id_so_library', $idsolibrary)->get();
//        
//        if (!is_null($idsolibrary)) {
//            $this->kpi = kpi_library::where('id_so_library', $idsolibrary)->get();
//        } else {
//            $this->kpi = 'nokpilibrary';
//        }
//        $this->selectedKpi = null;
    }

    public function updatedSelectedKpi()
    {
        $this->kpidata = kpi_library::where('id', $this->selectedKpi)->first();
    }

    public function customKPI()
    {
        $this->isCustomKpi = 1;
    }

}
