<?php

namespace App\Http\Livewire\CategoryComponent;

use App\Models\Category;
use Livewire\Component;

class CategoryViewComponent extends Component
{
    public function render() { return 
        view('livewire.category-component.category-view-component', [
            'categories' => $this->rows
        ]);
    }

    public function getRowsProperty(){ return
        Category::latest()->get();
    }
}
