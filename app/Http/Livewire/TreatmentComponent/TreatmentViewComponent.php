<?php

namespace App\Http\Livewire\TreatmentComponent;

use App\Models\Treatment;
use App\Traits\WithFilters;
use Livewire\Component;
use Livewire\WithPagination;

class TreatmentViewComponent extends Component
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
        view('livewire.treatment-component.treatment-view-component', [
            'treatments' => $this->rows
        ]);
    }
    
    public function getRowsProperty() { return 
        $this->rowsQuery->paginate($this->paginateValue);
    }

    public function getRowsQueryProperty()
    {
        return Treatment::search($this->search)
                ->when(!empty($this->search), function($query) {
                    return $query->orWhereHas('category', function($query) {
                            return $query->where('name', 'LIKE', '%'.$this->search.'%');
                    });
                })
                ->latest();
    }

    public function updatedPaginateValue() { $this->resetPage(); }
}
