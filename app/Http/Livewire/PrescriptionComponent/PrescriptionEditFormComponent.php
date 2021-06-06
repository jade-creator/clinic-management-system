<?php

namespace App\Http\Livewire\PrescriptionComponent;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Prescription;
use Livewire\Component;

class PrescriptionEditFormComponent extends Component
{
    public Prescription $prescription;
    public $patient_name;
    public $doctor_name;

    public function render() { return 
        view('livewire.prescription-component.prescription-edit-form-component');
    }

    public function mount() {
        $this->fill([
            'patient_name' => $this->prescription->patient->id,
            'doctor_name' => $this->prescription->doctor->id
        ]);
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
        $this->prescription->update();

        session()->flash('message', 'Prescription updated successfully.');
        return redirect(route('prescriptions.view'));
    }

    public function updatedPrescriptionPatientId() { return
        $this->patient_name = $this->prescription->patient_id;
    }

    public function updatedPatientName() { return
        $this->prescription->patient_id = $this->patient_name;
    }

    public function updatedPrescriptionDoctorId() { return
        $this->doctor_name = $this->prescription->doctor_id;
    }

    public function updatedDoctorName() { return
        $this->prescription->doctor_id = $this->doctor_name;
    }

    public function getPatientsProperty() { return
        Patient::with('user:id,name')->get(['id','user_id']);
    }

    public function getDoctorsProperty() { return
        Doctor::with('user:id,name')->get(['id','user_id']);
    }
}
