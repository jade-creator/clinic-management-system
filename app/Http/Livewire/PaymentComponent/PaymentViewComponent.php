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
        return Payment::with('patient.user')
                 ->latest();
    }

    public function updatedPaginateValue() { $this->resetPage(); }
}
