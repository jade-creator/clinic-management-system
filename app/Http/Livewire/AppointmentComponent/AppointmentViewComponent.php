<?php

namespace App\Http\Livewire\AppointmentComponent;

use App\Models\Appointment;
use App\Models\Status;
use App\Traits\WithFilters;
use Livewire\Component;
use Livewire\WithPagination;

class AppointmentViewComponent extends Component
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

    public function render() 
    { 
        return view('livewire.appointment-component.appointment-view-component', [
            'appointments' => $this->rows
        ]);
    }

    public function getRowsProperty() { return 
        $this->rowsQuery->paginate($this->paginateValue);
    }

    public function getRowsQueryProperty()
    {
        return Appointment::search($this->search)
                ->with(['patient.user', 'status', 'doctor', 'doctor.user'])
                ->when(!empty($this->status), 
                    fn ($query) => $query->where('status_id', $this->status))
                ->when(!empty($this->byDate), 
                    fn ($query) => $query->whereDate('scheduled_at', $this->byDate == 'today' ? '=' : '>', now()))
                ->orderBy('scheduled_at', 'ASC');
    }

    public function getStatusesProperty(){ return
        Status::get();
    }

    public function updatedPaginateValue() { $this->resetPage(); }
}
