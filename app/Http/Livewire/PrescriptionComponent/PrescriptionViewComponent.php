<?php

namespace App\Http\Livewire\PrescriptionComponent;

use App\Models\Prescription;
use App\Traits\WithFilters;
use Livewire\Component;

class PrescriptionViewComponent extends Component
{
    use WithFilters;

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
    
    public function getRowsProperty() 
    { 
        return Prescription::search($this->search)
                ->with(['patient', 'patient.user', 'doctor', 'doctor.user'])
                ->latest()
                ->get();
    }
}
