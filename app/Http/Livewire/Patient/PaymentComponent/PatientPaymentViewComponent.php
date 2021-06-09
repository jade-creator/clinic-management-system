<?php

namespace App\Http\Livewire\Patient\PaymentComponent;

use App\Models\Deposit;
use App\Models\Payment;
use App\Traits\WithFilters;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class PatientPaymentViewComponent extends Component
{
    use WithPagination, WithFilters;

    protected $listeners = ['getIds'];
    protected $paginationTheme = 'bootstrap';
    public $paginateValue = 10;

    public $queryString = [
        'search' => ['except' => '']
    ];

    public $updatesQueryString = [
        'search'
    ]; 

    public function render() { return 
        view('livewire.patient.payment-component.patient-payment-view-component', [
            'payments' => $this->rows   
        ]); 
    }
    
    public function dehydrate()
    {
        Session::forget('payments');

        $paymentIds = $this->getIds();

        Session::push('payments', $paymentIds);
    }
 
    public function getRowsProperty() { return 
        $this->rowsQuery->paginate($this->paginateValue); 
    } 
 
    public function getRowsQueryProperty() 
    { 
        return Payment::search($this->search)
                ->where('patient_id', Auth::user()->patient->id)
                ->latest();
    }

    public function getDepositsProperty() 
    { 
        return Deposit::select(['id', 'amount_deposit'])
                ->whereIn('payment_id', $this->getIds())
                ->sum('amount_deposit');
    }

    public function getIds() { return
        $this->rowsQuery->pluck('id')->toArray();
    }

    public function updatedPaginateValue() { $this->resetPage(); }
}
