<?php

namespace App\Http\Livewire;

use App\Models\business_categories;
use App\Models\so_library;
use Livewire\Component;

class Target extends Component {

    public $category;
    public $selectedCategory;
    public $bisnis;
    public $selectedBisnis = null;
    public $aspect;
    public $selectedAspect = null;
    public $so = null;
    public $selectedSo = null;

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
        $this->selectedBisnis = null;
        $this->selectedAspect = null;
        $this->bisnis = so_library::groupBy('bisnis')->select('bisnis')->where('id_business_categories', $this->selectedCategory)->get();
        $this->so = so_library::where('id_business_categories', $this->selectedCategory)->orderBy('so')->get();
    }

    public function updatedSelectedBisnis()
    {

        $this->bisnis = so_library::groupBy('bisnis')->select('bisnis')->where('id_business_categories', $this->selectedCategory)->get();
        if ($this->selectedBisnis == 'All')
        {
            $this->so = so_library::where('id_business_categories', $this->selectedCategory)->get();
        }
        else
        {
            $this->aspect = so_library::groupBy('aspect')
                    ->select('aspect')
                    ->where('id_business_categories', $this->selectedCategory)
                    ->where('bisnis', $this->selectedBisnis)
                    ->get();
            $this->so = so_library::where('id_business_categories', $this->selectedCategory)->where('bisnis', $this->selectedBisnis)->orderBy('so')->get();
        }
    }

    public function updatedSelectedAspect()
    {
        $this->bisnis = so_library::groupBy('bisnis')->select('bisnis')->where('id_business_categories', $this->selectedCategory)->get();
        $this->aspect = so_library::groupBy('aspect')
                ->select('aspect')
                ->where('id_business_categories', $this->selectedCategory)
                ->where('bisnis', $this->selectedBisnis)
                ->get();
        if ($this->selectedAspect == 'All')
        {
            $this->so = so_library::where('id_business_categories', $this->selectedCategory)->where('bisnis', $this->selectedBisnis)->orderBy('so')->get();
        }
        else
        {
            $this->so = so_library::where('id_business_categories', $this->selectedCategory)->where('bisnis', $this->selectedBisnis)->where('Aspect', $this->selectedAspect)->orderBy('so')->get();
        }
    }

    public function updatedSelectedSo()
    {
        $this->bisnis = so_library::groupBy('bisnis')->select('bisnis')->where('id_business_categories', $this->selectedCategory)->get();
        $this->aspect = so_library::groupBy('aspect')
                ->select('aspect')
                ->where('id_business_categories', $this->selectedCategory)
                ->where('bisnis', $this->selectedBisnis)
                ->get();
    }

}
