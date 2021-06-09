<?php

namespace App\Http\Livewire\Patient\AppointmentComponent;

use App\Models\Appointment;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PatientAppointmentEditFormComponent extends Component
{
    public Appointment $appointment;
    public $patientId;
    public $patientName;

    public function render() { return 
        view('livewire.patient.appointment-component.patient-appointment-edit-form-component', [
            'status' => $this->appointment->status
        ]);
    }

    public function mount() 
    { 
        $user = Auth::user()->load('patient:id,user_id');

        $this->fill([
            'patientName' => $user->name,
            'patientId' => $user->patient->id,
            'appointment.scheduled_at' => Carbon::parse($this->appointment->scheduled_at)->format('Y-m-d\TH:i')
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

    public function create()
    {
        $this->validate();
        $this->appointment->update();

        session()->flash('message', 'Appointment updated successfully.');
        return redirect(route('patient.appointments.view'));
    }
}
