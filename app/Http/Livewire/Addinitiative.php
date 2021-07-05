<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\si_library;

class Addinitiative extends Component {

    public $id_user;
    public $id_target_kpi;
    public $id_kpi_library;
    public $si; //series of data si by $id_kpi_library

    public function mount()
    {
        $this->si = si_library::where('id_kpi_library', $this->id_kpi_library)->get();
    }

    public function render()
    {
        return view('livewire.addinitiative');
    }

}
