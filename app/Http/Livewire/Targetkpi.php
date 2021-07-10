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

    public function mount() {
        $this->so = target_so::where('id_user', $this->id_personnel)->where('periode_th', $this->tahun)->get();
    }

    public function render() {
        return view('livewire.targetkpi');
    }

    public function updatedSelectedSo() {
        
        // ambil id_so_library data dari tabel target_so
        $targetso = target_so::where('id', $this->selectedSo)->first();
        $idsolibrary = $targetso->id_so_library;
        
        if (!is_null($idsolibrary)) {
            $this->kpi = kpi_library::where('id_so_library', $idsolibrary)->get();
        } else {
            $this->kpi = 'nokpilibrary';
        }
        $this->selectedKpi = null;
    }

    public function updatedSelectedKpi() {
        $this->kpidata = kpi_library::where('id', $this->selectedKpi)->first();
    }

//    public function updatedSelectedCategory($category) {
//        if (so_library::where('id_business_categories', $category)->exists()) {
//            $this->so = so_library::where('id_business_categories', $category)->get();
//        } else {
//            $this->so = null;
//        }
//    }
}
