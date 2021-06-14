<?php

namespace App\Http\Livewire\ReceptionistComponent;

use App\Models\Receptionist;
use App\Traits\WithFilters;
use Livewire\Component;
use Livewire\WithPagination;

class ReceptionistViewComponent extends Component
{
    use WithPagination, WithFilters;

    protected $paginationTheme = 'bootstrap';
    public $paginateValue = 10;

    protected $queryString = [
        'search' => ['except' => '']
    ];

    protected $updatesQueryString = [
        'search'
    ];  

    public function render() { return 
        view('livewire.receptionist-component.receptionist-view-component', [
            'receptionists' => $this->rows
        ]);
    }

    public function getRowsProperty() { return 
        $this->rowsQuery->paginate($this->paginateValue);
    }

    public function getRowsQueryProperty()
    {
        return Receptionist::search($this->search)
                ->with('user')
                ->when(!empty($this->search), function($query) {
                    return $query->orWhereHas('user', function($query) {
                                return $query->where('name', 'LIKE', '%'.$this->search.'%');
                            });
                })
                ->latest();
    }

    public function updatedPaginateValue() { $this->resetPage(); }
}