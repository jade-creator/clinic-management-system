<?php

namespace App\Http\Livewire\AppointmentComponent;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Status;
use Carbon\Carbon;
use Livewire\Component;

class AppointmentEditFormComponent extends Component
{
    public Appointment $appointment;
    public $patient_name;
    public $doctor_name;

    public function render() { return 
        view('livewire.appointment-component.appointment-edit-form-component');
    }

    public function mount()
    {
        $this->fill([
            'patient_name' => $this->appointment->patient_id,
            'doctor_name' => $this->appointment->doctor_id ?? '',
            'appointment.scheduled_at' => Carbon::parse($this->appointment->scheduled_at)->format('Y-m-d\TH:i')
        ]);
    }

    public function rules()
    {
        return [
            'appointment.scheduled_at' => ['required', 'date'],
            'appointment.remarks' => ['nullable', 'string'],
            'appointment.patient_id' => ['required', 'integer'],
            'appointment.doctor_id' => ['required', 'integer'],
            'appointment.status_id' => ['required', 'integer'],
        ];
    }

    public function update()
    {
        $this->validate();
        $this->appointment->update();

        session()->flash('message', 'Appointment updated successfully.');
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
        Patient::with('user:id,name')->get();
    }

    public function getDoctorsProperty() { return
        Doctor::with('user:id,name')->get();
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
