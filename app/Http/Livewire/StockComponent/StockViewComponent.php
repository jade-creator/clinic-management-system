<?php

namespace App\Http\Livewire\StockComponent;

use App\Models\Stock;
use App\Traits\WithFilters;
use Livewire\Component;
use Livewire\WithPagination;

class StockViewComponent extends Component
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
        view('livewire.stock-component.stock-view-component', [
            'stocks' => $this->rows
        ]);
    }

    public function getRowsProperty() { return 
        $this->rowsQuery->paginate($this->paginateValue);
    }

    public function getRowsQueryProperty()
    {
        return Stock::search($this->search)
                ->when(!empty($this->search), function($query) {
                    return $query->orWhereHas('treatment', function($query) {
                            return $query->where('name', 'LIKE', '%'.$this->search.'%');
                    });
                })
                ->latest();
    }

    public function updatedPaginateValue() { $this->resetPage(); }
}
