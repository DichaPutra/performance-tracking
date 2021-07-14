<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Activatetarget extends Component {

    public $datakpi;
    public $data;
    public $tahun;
    public $weight = array();

    public function render()
    {
        return view('livewire.activatetarget');
    }

    public function updatedweight()
    {
        
    }

}
