<?php

namespace App\Http\Livewire\AppointmentComponent;

use App\Models\Status;
use Livewire\Component;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class AppointmentAddFormComponent extends Component
{
    public Appointment $appointment;
    public $patientId;
    public $patientName;

    public function render() { return 
        view('livewire.appointment-component.appointment-add-form-component');
    }

    public function mount() 
    { 
        $this->appointment = new Appointment();
        $user = Auth::user()->load('patient:id,user_id');
        $this->patientName = $user->name;
        $this->patientId = $user->patient->id;
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
    }
}
