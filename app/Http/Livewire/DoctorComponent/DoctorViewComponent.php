<?php

namespace App\Http\Livewire\DoctorComponent;

use App\Models\Doctor;
use App\Traits\WithFilters;
use Livewire\Component;
use Livewire\WithPagination;

class DoctorViewComponent extends Component
{
    use WithPagination, WithFilters;

    protected $paginationTheme = 'bootstrap';
    public $paginateValue = 10;

    protected $queryString = [
        'search' => ['except' => '']
    ];

    protected $updatesQueryString = [
        'search'
    ];

    public function render() { return 
        view('livewire.doctor-component.doctor-view-component', [
            'doctors' => $this->rows
        ]);
    }

    public function getRowsProperty() { return 
        $this->rowsQuery->paginate($this->paginateValue);
    }

    public function getRowsQueryProperty()
    {
        return Doctor::search($this->search)
                ->select(['id', 'user_id'])
                ->with([
                    'user:id,name',
                    'prescriptions:id,doctor_id',
                    'appointments' => fn($query) => $query->select(['id','doctor_id','status_id'])
                                                        ->where('status_id', 4)
                ])
                ->when(!empty($this->search), function($query) {
                    return $query->orWhereHas('user', function($query) {
                        return $query->where('name', 'LIKE', '%'.$this->search.'%');
                    });
                })
                ->latest();
    }

    public function updatedPaginateValue() { $this->resetPage(); }
}
