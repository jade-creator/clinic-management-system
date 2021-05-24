<?php

namespace App\Http\Livewire\DoctorComponent;

use App\Models\Doctor;
use Livewire\Component;

class DoctorViewComponent extends Component
{
    public function render() { return 
        view('livewire.doctor-component.doctor-view-component', [
            'doctors' => $this->rows
        ]);
    }

    public function getRowsProperty() 
    { 
        return Doctor::with([
                'user', 
                'appointments' => fn($query) => $query->where('status_id', 4),
                'prescriptions' ])
                ->latest()
                ->get();
    }
}
