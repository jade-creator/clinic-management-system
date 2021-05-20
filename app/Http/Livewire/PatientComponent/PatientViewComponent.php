<?php

namespace App\Http\Livewire\PatientComponent;

use App\Models\Patient;
use Livewire\Component;

class PatientViewComponent extends Component
{
    public function render() { return 
        view('livewire.patient-component.patient-view-component', [
            'patients' => $this->rows
        ]);
    }

    public function getRowsProperty() { return
        Patient::with(['user', 'user.profile', 'payments'])->latest()->get();
    }
}
