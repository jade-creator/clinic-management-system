<?php

namespace App\Http\Livewire\PrescriptionComponent;

use App\Models\Prescription;
use Livewire\Component;

class PrescriptionViewComponent extends Component
{
    public function render() { return 
        view('livewire.prescription-component.prescription-view-component', [
            'prescriptions' => $this->rows
        ]);
    }
    
    public function getRowsProperty() { return
        Prescription::with(['patient', 'patient.user', 'doctor', 'doctor.user'])->latest()->get();
    }
}
