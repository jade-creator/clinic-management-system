<?php

namespace App\Http\Livewire\PaymentComponent;

use App\Models\Payment;
use Livewire\Component;

class PaymentViewComponent extends Component
{
    public function render() { return 
        view('livewire.payment-component.payment-view-component', [
            'payments' => $this->rows   
        ]);
    }

    public function mount()
    {
        \Debugbar::info($this->rows);
    }

    public function getRowsProperty() { return
        Payment::with([ 'patient', 'patient.user', 'deposits'])->get();
    }
}
