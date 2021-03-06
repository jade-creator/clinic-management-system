<?php

namespace App\Http\Livewire\PatientComponent;

use App\Models\Patient;
use App\Traits\WithFilters;
use Livewire\Component;
use Livewire\WithPagination;

class PatientViewComponent extends Component
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
        view('livewire.patient-component.patient-view-component', [
            'patients' => $this->rows
        ]);
    }

    public function getRowsProperty() { return 
        $this->rowsQuery->paginate($this->paginateValue);
    }

    public function getRowsQueryProperty()
    {
        return Patient::search($this->search)
                ->with(['user.profile', 'payments'])
                ->when(!empty($this->search), function($query) {
                    return $query->orWhereHas('user', function($query) {
                                return $query->where('name', 'LIKE', '%'.$this->search.'%');
                            })
                            ->orWhereHas('user.profile', function($query) {
                                return $query->where('phone_number', 'LIKE', '%'.$this->search.'%');
                            });
                })
                ->latest();
    }

    public function updatedPaginateValue() { $this->resetPage(); }
}