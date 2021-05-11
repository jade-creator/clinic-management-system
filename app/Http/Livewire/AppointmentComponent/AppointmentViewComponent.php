<?php

namespace App\Http\Livewire\AppointmentComponent;

use App\Models\Appointment;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AppointmentViewComponent extends Component
{
    public $status = '';
    public $byDate = '';

    public function render() 
    { 
        return view('livewire.appointment-component.appointment-view-component', [
            'appointments' => $this->rows
        ]);
    }

    public function getRowsProperty() 
    {
        $user = Auth::user()->load('patient:id,user_id');
        $patientId = $user->patient->id;
        $appointments = Appointment::where('patient_id', $patientId)->with(['status', 'doctor'])
                        ->when(!empty($this->status), 
                            fn ($query) => $query->where('status_id', $this->status))
                        ->when(!empty($this->byDate), 
                            fn ($query) => $query->whereDate('scheduled_at', $this->byDate, now()))
                        ->orderBy('scheduled_at', 'DESC')
                        ->get();

        return $appointments;
    }

    public function getStatusesProperty(){ return
        Status::get();
    }
}
