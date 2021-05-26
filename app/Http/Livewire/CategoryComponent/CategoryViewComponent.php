<?php

namespace App\Http\Livewire\CategoryComponent;

use App\Models\Category;
use App\Traits\WithFilters;
use Livewire\Component;

class CategoryViewComponent extends Component
{
    use WithFilters;

    public $queryString = [
        'search' => ['except' => '']
    ];

    public $updatesQueryString = [
        'search'
    ];  

    public function render() { return 
        view('livewire.category-component.category-view-component', [
            'categories' => $this->rows
        ]);
    }

    public function getRowsProperty()
    { 
        return Category::search($this->search)
                ->latest()
                ->get();
    }
}
