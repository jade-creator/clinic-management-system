<?php

namespace App\Http\Livewire\PrescriptionComponent;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Prescription;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PrescriptionAddFormComponent extends Component
{
    public Prescription $prescription;
    public $doctor_name;
    public $patient_name;
    
    public function render() { return 
        view('livewire.prescription-component.prescription-add-form-component');
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
        
        try {
            $this->prescription->save();
            session()->flash('message', 'Prescription created successfully.');
        } catch (\Exception $e) {
            session()->flash('message', 'Creating prescription failed.');
        }

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
        Patient::with(['user:id,name'])->get(['id', 'user_id']);
    }

    public function getDoctorsProperty()
    {
        return Doctor::with('user:id,name')
                ->get(['id', 'user_id']);
    }
}