<?php

namespace App\Http\Livewire\PrescriptionComponent;

use App\Models\Prescription;
use App\Traits\WithFilters;
use Livewire\Component;
use Livewire\WithPagination;

class PrescriptionViewComponent extends Component
{
    use WithPagination, WithFilters;

    protected $paginationTheme = 'bootstrap';
    public $paginateValue = 10;

    public $queryString = [
        'search' => ['except' => '']
    ];

    public $updatesQueryString = [
        'search'
    ];  

    public function render() { return 
        view('livewire.prescription-component.prescription-view-component', [
            'prescriptions' => $this->rows
        ]);
    }

    public function getRowsProperty() { return 
        $this->rowsQuery->paginate($this->paginateValue);
    }

    public function getRowsQueryProperty()
    {
        return Prescription::search($this->search)
                ->select(['id', 'medication', 'note', 'updated_at', 'patient_id', 'doctor_id'])
                ->with([
                    'patient:id,user_id',
                    'patient.user:id,name',
                    'doctor:id,user_id',
                    'doctor.user:id,name'
                ])
                ->when(!empty($this->search), function($query) {
                    return $query->orWhereHas('patient.user', function($query) {
                                return $query->where('name', 'LIKE', '%'.$this->search.'%');
                            })
                            ->orWhereHas('doctor.user', function($query) {
                                return $query->where('name', 'LIKE', '%'.$this->search.'%');
                    });
                })
                ->latest();
    }

    public function restore(int $prescription_id)
    {
        $prescription = Prescription::withTrashed()->find($prescription_id);

        if ($prescription && $prescription->trashed()) {
            $prescription->restore();
        } else {
            abort(403);
        }

        session()->flash('message', 'Prescription restored successfully.');
        return redirect(route('prescriptions.view'));
    }

    public function destroy(Prescription $prescription)
    {
        $prescription->delete();

        session()->flash('message', 'Prescription deleted successfully. <a href="'.route('prescriptions.restore', $prescription->id).'">Ooops! Undo</a>');
        return redirect(route('prescriptions.view'));
    }

    public function updatedPaginateValue() { $this->resetPage(); }
}
