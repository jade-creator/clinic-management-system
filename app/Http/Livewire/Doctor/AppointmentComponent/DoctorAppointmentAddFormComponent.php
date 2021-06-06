<?php

namespace App\Http\Livewire\Doctor\AppointmentComponent;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DoctorAppointmentAddFormComponent extends Component
{
    public Appointment $appointment;
    public $patient_name;

    public function render() { return 
        view('livewire.doctor.appointment-component.doctor-appointment-add-form-component');
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
            'appointment.status_id' => ['required', 'integer'],
        ];
    }

    public function create()
    {
        $this->validate();
        $this->appointment->save();

        session()->flash('message', 'Appointment created successfully.');
        return redirect(route('appointments.view'));
    }

    public function updatedAppointmentPatientId() { return
        $this->patient_name = $this->appointment->patient_id;
    }

    public function updatedPatientName() { return
        $this->appointment->patient_id = $this->patient_name;
    }

    public function getPatientsProperty() { return
        Patient::with('user:id,name')->get();
    }

    public function getDoctorProperty()
    {
        $user = Auth::user()->load('doctor:id,user_id');
        return $user->doctor;
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
