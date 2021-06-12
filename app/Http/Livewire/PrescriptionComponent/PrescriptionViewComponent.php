<?php

namespace App\Http\Livewire\PrescriptionComponent;

use App\Models\Prescription;
use App\Traits\WithFilters;
use Livewire\Component;
use Livewire\WithPagination;

class PrescriptionViewComponent extends Component
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
        view('livewire.prescription-component.prescription-view-component', [
            'prescriptions' => $this->rows
        ]);
    }

    public function getRowsProperty() { return 
        $this->rowsQuery->paginate($this->paginateValue);
    }

    public function getRowsQueryProperty()
    {
        return Prescription::search($this->search)
                ->when(!empty($this->search), function($query) {
                    return $query
                        ->orWhereHas('patient.user', function($query) {
                            return $query->where('name', 'LIKE', '%'.$this->search.'%');
                        })
                        ->orWhereHas('doctor.user', function($query) {
                            return $query->where('name', 'LIKE', '%'.$this->search.'%');
                    });
                })
                ->latest();
    }

    public function updatedPaginateValue() { $this->resetPage(); }
}
