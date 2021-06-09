<?php

namespace App\Http\Livewire\Patient\AppointmentComponent;

use App\Models\Appointment;
use App\Models\Status;
use App\Traits\WithFilters;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class PatientAppointmentViewComponent extends Component
{
    use WithPagination, WithFilters;

    protected $paginationTheme = 'bootstrap';
    public $paginateValue = 10;
    public $status = '';
    public $byDate = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => ''],
        'byDate' => ['except' => '']
    ];

    protected $updatesQueryString = [
        'search',
        'status',
        'byDate'
    ];

    public function render() { return 
        view('livewire.patient.appointment-component.patient-appointment-view-component', [
            'appointments' => $this->rows
        ]);
    }

    public function getRowsProperty() { return 
        $this->rowsQuery->paginate($this->paginateValue);
    }   

    public function getRowsQueryProperty()
    {
        $user = Auth::user()->load('patient:id,user_id');
        $patientId = $user->patient->id;
        
        return Appointment::search($this->search)
                    ->select(['id', 'scheduled_at', 'remarks', 'updated_at', 'patient_id', 'doctor_id', 'status_id'])
                    ->where('patient_id', $patientId)
                    ->when(!empty($this->search), function($query) {
                        return $query->orWhereHas('doctor.user', function($query) {
                            return $query->where('name', 'LIKE', '%'.$this->search.'%');
                        });
                    })
                    ->with('status:id,name')
                    ->when(!empty($this->status), 
                        fn ($query) => $query->where('status_id', $this->status))
                    ->when(!empty($this->byDate), 
                        fn ($query) => $query->whereDate('scheduled_at', $this->byDate == 'today' ? '=' : '>', now()));
    }

    public function getStatusesProperty(){ return
        Status::get(['id', 'name']);
    }

    public function updatedPaginateValue() { $this->resetPage(); }
}
