<?php

namespace App\Http\Livewire\Patient\PrescriptionComponent;

use App\Models\Prescription;
use App\Traits\WithFilters;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class PatientPrescriptionViewComponent extends Component
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
        view('livewire.patient.prescription-component.patient-prescription-view-component', [
            'prescriptions' => $this->rows
        ]);
    }

    public function getRowsProperty() { return 
        $this->rowsQuery->paginate($this->paginateValue);
    }

    public function getRowsQueryProperty()
    {
        return Prescription::search($this->search)
                ->select(['id', 'medication', 'note', 'updated_at', 'patient_id', 'doctor_id'])
                ->where('patient_id', Auth::user()->patient->id)
                ->with([
                    'doctor:id,user_id',
                    'doctor.user:id,name'
                ])
                ->when(!empty($this->search), function($query) {
                    return $query->orWhereHas('doctor.user', function($query) {
                                return $query->where('name', 'LIKE', '%'.$this->search.'%');
                    });
                })
                ->latest();
    }

    public function updatedPaginateValue() { $this->resetPage(); }
}
