<?php

namespace App\Http\Livewire\AppointmentComponent;

use App\Models\Appointment;
use App\Models\Status;
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
        return Appointment::with(['patient', 'patient.user', 'status', 'doctor', 'doctor.user'])
                ->when(!empty($this->status), 
                    fn ($query) => $query->where('status_id', $this->status))
                ->when(!empty($this->byDate), 
                    fn ($query) => $query->whereDate('scheduled_at', $this->byDate, now()))
                ->orderBy('scheduled_at', 'ASC')
                ->get();
    }

    public function getStatusesProperty(){ return
        Status::get();
    }
}
