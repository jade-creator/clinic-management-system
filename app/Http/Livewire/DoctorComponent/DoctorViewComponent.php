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
        return Doctor::whereHas('user', function($query) {
                    return $query
                            ->where('id', 'LIKE', '%'.$this->search.'%')
                            ->orWhere('name', 'LIKE', '%'.$this->search.'%');
                })
                ->with([
                    'appointments' => fn($query) => $query->where('status_id', 4),
                    'prescriptions' 
                ])
                ->latest();
    }

    public function updatedPaginateValue() { $this->resetPage(); }
}
