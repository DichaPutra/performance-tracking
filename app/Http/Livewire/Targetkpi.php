<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\target_so;

class Targetkpi extends Component {

    public $id_personnel;
    public $so;
    
    public $selectedCategory;
    public $selectedSo;

    public function mount() {
        $this->so = target_so::where('id_user', $this->id_personnel)->get();
    }

    public function render() {
        return view('livewire.targetkpi');
    }

//    public function updatedSelectedCategory($category) {
//        if (so_library::where('id_business_categories', $category)->exists()) {
//            $this->so = so_library::where('id_business_categories', $category)->get();
//        } else {
//            $this->so = null;
//        }
//    }

}
