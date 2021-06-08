<?php

namespace App\Http\Livewire;

use App\Models\business_categories;
use App\Models\so_library;
use Livewire\Component;

class Target extends Component {

    public $categories;
    public $so;
    public $selectedCategory = NULL;
    public $selectedSo = NULL;

    public function mount() {
        $this->categories = business_categories::all();
        $this->so = collect();
    }

    public function render() {
        return view('livewire.target');
    }

    public function updatedSelectedCategory($category) {
        $this->so = so_library::where('id_business_categories',$category)->get();
        $this->selectedSo = NULL;
    }

}
