<?php

namespace App\Http\Livewire\Patient\HistoryComponent;

use App\Models\History;
use App\Traits\WithFilters;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class PatientHistoryViewComponent extends Component
{
    use WithPagination, WithFilters;

    protected $paginationTheme = 'bootstrap';
    public $paginateValue = 10;

    public function render() { return 
        view('livewire.patient.history-component.patient-history-view-component', [
            'histories' => $this->rows
        ]);
    }

    public $queryString = [
        'search' => ['except' => '']
    ];

    public $updatesQueryString = [ 
        'search'
    ];  

    public function getRowsProperty() { return
        $this->rowsQuery->paginate($this->paginateValue);
    }

    public function getRowsQueryProperty()
    {
        return History::search($this->search)
                ->select(['id', 'date', 'description', 'note', 'patient_id'])
                ->where('patient_id', Auth::user()->patient->id)
                ->latest();
    }

    public function updatedPaginateValue() { $this->resetPage(); }
}
