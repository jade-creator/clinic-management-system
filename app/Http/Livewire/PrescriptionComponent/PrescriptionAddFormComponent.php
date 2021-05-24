<?php

namespace App\Http\Livewire\PrescriptionComponent;

use App\Models\Patient;
use App\Models\Prescription;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PrescriptionAddFormComponent extends Component
{
    public Prescription $prescription;
    public $patient_name;
    
    public function render() { return 
        view('livewire.prescription-component.prescription-add-form-component', [
            'patients' => $this->patients
        ]);
    }

    public function mount() {
        $this->prescription = new Prescription();
    }

    public function rules() {
        return [
            'prescription.medication' => ['required', 'string'],
            'prescription.note' => ['required', 'string'],
            'prescription.patient_id' => ['required', 'integer'],
            'prescription.doctor_id' => ['required', 'integer'],
        ];
    }

    public function create() {
        $this->validate();
        $this->prescription->save();
    }

    public function updatedPrescriptionPatientId() { return
        $this->patient_name = $this->prescription->patient_id;
    }

    public function updatedPatientName() { return
        $this->prescription->patient_id = $this->patient_name;
    }

    public function getPatientsProperty() { return
        Patient::get();
    }

    public function getDoctorProperty()
    {
        $user = Auth::user()->load('doctor:id,user_id');
        return $user->doctor;
    }
}