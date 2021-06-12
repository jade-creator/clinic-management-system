<?php

namespace App\Http\Livewire\PaymentComponent;

use App\Models\Payment;
use App\Traits\WithFilters;
use Livewire\Component;
use Livewire\WithPagination;

class PaymentViewComponent extends Component
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
        view('livewire.payment-component.payment-view-component', [
            'payments' => $this->rows   
        ]);
    }

    public function getRowsProperty() { return 
        $this->rowsQuery->paginate($this->paginateValue);
    }

    public function getRowsQueryProperty()
    {
        return Payment::search($this->search)
                ->with('patient.user')
                ->when(!empty($this->search), function($query) {
                    return $query
                        ->orWhere('patient_id', 'LIKE', '%'.$this->search.'%')
                        ->orWhereHas('patient.user', function($query) {
                            return $query->where('name', 'LIKE', '%'.$this->search.'%');
                        });
                })
                ->latest();
    }

    public function updatedPaginateValue() { $this->resetPage(); }
}
