<?php

namespace App\Http\Livewire\CategoryComponent;

use App\Models\Category;
use App\Traits\WithFilters;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryViewComponent extends Component
{
    use WithPagination, WithFilters;

    protected $paginationTheme = 'bootstrap';
    public $paginateValue = 10;

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

    public function getRowsProperty() { return 
        $this->rowsQuery->paginate($this->paginateValue);
    }

    public function getRowsQueryProperty()
    {
        return Category::search($this->search)
                ->latest();
    }

    public function updatedPaginateValue() { $this->resetPage(); }
}
