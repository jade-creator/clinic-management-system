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
                ->with([
                    'patient:id,user_id',
                    'patient.user:id,name',
                    'doctor:id,user_id',
                    'doctor.user:id,name',
                    'status:id,name'
                ])
                ->when(!empty($this->search), function($query) {
                    return $query->orWhereHas('patient.user', function($query) {
                                return $query->where('name', 'LIKE', '%'.$this->search.'%');
                            })
                            ->orWhereHas('doctor.user', function($query) {
                                return $query->where('name', 'LIKE', '%'.$this->search.'%');
                            });
                })
                ->when(!empty($this->status), 
                    fn ($query) => $query->where('status_id', $this->status))
                ->when(!empty($this->byDate), 
                    fn ($query) => $query->whereDate('scheduled_at', $this->byDate == 'today' ? '=' : '>', now()))
                ->orderBy('scheduled_at', 'ASC');
    }

    public function restore(int $appointment_id)
    {
        $appointment = Appointment::withTrashed()->find($appointment_id);

        if ($appointment && $appointment->trashed()) {
            $appointment->restore();
        } else {
            abort(403);
        }

        session()->flash('message', 'Appointment restored successfully.');
        return redirect(route('appointments.view'));
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        session()->flash('message', 'Appointment deleted successfully. <a href="'.route('appointments.restore', $appointment->id).'">Ooops! Undo</a>');
        return redirect(route('appointments.view'));
    }

    public function getStatusesProperty(){ return
        Status::get(['id', 'name']);
    }

    public function updatedPaginateValue() { $this->resetPage(); }

    public function updatedStatus() { $this->resetPage(); }

    public function updatedByDate() { $this->resetPage(); }
}