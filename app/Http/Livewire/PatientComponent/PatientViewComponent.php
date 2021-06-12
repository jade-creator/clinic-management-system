<?php

namespace App\Http\Livewire\PatientComponent;

use App\Models\Patient;
use App\Traits\WithFilters;
use Livewire\Component;
use Livewire\WithPagination;

class PatientViewComponent extends Component
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
        view('livewire.patient-component.patient-view-component', [
            'patients' => $this->rows
        ]);
    }

    public function getRowsProperty() { return 
        $this->rowsQuery->paginate($this->paginateValue);
    }

    public function getRowsQueryProperty()
    {
        return Patient::with(['user.profile', 'payments'])
                ->latest();
    }

    public function updatedPaginateValue() { $this->resetPage(); }
}
