<?php

namespace App\Http\Livewire\Patient\AppointmentComponent;

use App\Models\Appointment;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PatientAppointmentAddFormComponent extends Component
{
    public Appointment $appointment;
    public $patientId;
    public $patientName;

    public function render() { return 
        view('livewire.patient.appointment-component.patient-appointment-add-form-component');
    }

    public function mount() 
    { 
        $user = Auth::user()->load('patient:id,user_id');

        $this->fill([
            'appointment' => new Appointment(),
            'patientName' => $user->name,
            'patientId' => $user->patient->id,
        ]);
    }

    public function rules()
    {
        return [
            'appointment.scheduled_at' => ['required', 'date', 'after:today'],
            'appointment.remarks' => ['nullable', 'string'],
            'appointment.status_id' => ['required', 'integer']
        ];
    }

    public function getStatusesProperty(){ return
        Status::get(['id', 'name']);
    }

    public function create()
    {
        $this->validate();
        $this->appointment->patient_id = $this->patientId;
        $this->appointment->save();

        session()->flash('message', 'Appointment created successfully.');
        return redirect(route('patient.appointments.view'));
    }
}
