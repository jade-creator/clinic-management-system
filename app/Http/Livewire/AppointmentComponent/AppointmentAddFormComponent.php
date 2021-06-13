<?php

namespace App\Http\Livewire\AppointmentComponent;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Status;
use Livewire\Component;

class AppointmentAddFormComponent extends Component
{
    public Appointment $appointment;
    public $patient_name;
    public $doctor_name;

    public function render() { return 
        view('livewire.appointment-component.appointment-add-form-component');
    }

    public function mount()
    {
        $this->appointment = new Appointment();
    }

    public function rules()
    {
        return [
            'appointment.scheduled_at' => ['required', 'date', 'after:today'],
            'appointment.remarks' => ['nullable', 'string'],
            'appointment.patient_id' => ['required', 'integer'],
            'appointment.doctor_id' => ['required', 'integer'],
            'appointment.status_id' => ['required', 'integer']
        ];
    }

    public function create()
    {
        $this->validate();
        
        try {
            $this->appointment->save();
            session()->flash('message', 'Appointment created successfully.');
        } catch (\Exception $e) {
            session()->flash('danger', 'Creating appointment failed.');
        }

        return redirect(route('appointments.view'));
    }

    public function updatedAppointmentPatientId() { return
        $this->patient_name = $this->appointment->patient_id;
    }

    public function updatedPatientName() { return
        $this->appointment->patient_id = $this->patient_name;
    }

    public function updatedAppointmentDoctorId() { return
        $this->doctor_name = $this->appointment->doctor_id;
    }

    public function updatedDoctorName() { return
        $this->appointment->doctor_id = $this->doctor_name;
    }

    public function getPatientsProperty() { return
        Patient::with('user:id,name')->get(['id', 'user_id']);
    }

    public function getDoctorsProperty() { return
        Doctor::with('user:id,name')->get(['id', 'user_id']);
    }

    public function getStatusesProperty() { return
        Status::get(['id', 'name']);
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
