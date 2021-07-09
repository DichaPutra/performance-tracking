<?php

namespace App\Http\Livewire;

use App\Models\business_categories;
use App\Models\so_library;
use Livewire\Component;

class Target extends Component {

    public $category;
    public $selectedCategory;
    public $so = null;
    public $selectedSo = null;
    public $selectedAspect = null;

    public function mount()
    {
        $this->category = business_categories::all();
    }

    public function render()
    {
        return view('livewire.target');
    }

    public function updatedSelectedCategory()
    {
        $this->selectedAspect = null;
        $this->so = so_library::where('id_business_categories', $this->selectedCategory)->get();
    }

    public function updatedSelectedAspect()
    {
        if ($this->selectedAspect == 'All')
        {
            $this->so = so_library::where('id_business_categories', $this->selectedCategory)->get();
        }
        else
        {
            $this->so = so_library::where('id_business_categories', $this->selectedCategory)->where('aspect', $this->selectedAspect)->get();
        }
    }

}
