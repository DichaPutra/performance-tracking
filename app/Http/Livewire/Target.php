<?php

namespace App\Http\Livewire;

use App\Models\business_categories;
use App\Models\so_library;
use Livewire\Component;

class Target extends Component {

    public $category;
    public $selectedCategory;
    public $so;
    public $selectedSo;

    public function mount() {
        $this->category = business_categories::all();
    }

    public function render() {
        return view('livewire.target');
    }

    public function updatedSelectedCategory($category) {
        if (so_library::where('id_business_categories', $category)->exists()) {
            $this->so = so_library::where('id_business_categories', $category)->get();
        } else {
            $this->so = null;
        }
//        if (!$this->so) {
//            $this->selectedCategory == NULL;
//        }
    }

}
