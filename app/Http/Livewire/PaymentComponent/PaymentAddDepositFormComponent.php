<?php

namespace App\Http\Livewire\PaymentComponent;

use App\Models\Deposit;
use App\Models\Payment;
use Livewire\Component;

class PaymentAddDepositFormComponent extends Component
{
    public Deposit $deposit;
    public $paymentId;
    public $grand_total;
    public $due;

    public function rules() 
    { 
        return [
            'deposit.date_deposit' => [ 'required', 'date'],
            'deposit.amount_deposit' => [ 'required', 'integer', 'lte:due', 'min:100'],
            'deposit.isCash' => [ 'required', 'integer'],
            'deposit.payment_id' => [ 'required', 'integer'],
        ];
    }

    public function mount()
    {
        $this->fill([ 
            'deposit' => new Deposit(),
            'deposit.payment_id' => $this->paymentId 
        ]);

        $this->updatedDepositPaymentId($this->paymentId);
    }

    public function render() { return 
        view('livewire.payment-component.payment-add-deposit-form-component');
    }

    public function create() 
    {
        $this->validate();

        try {
            $this->deposit->save();

            $payment = $this->payments->find($this->deposit->payment_id);
            $payment->due = $this->due - $this->deposit->amount_deposit;
            $payment->save();
            session()->flash('message', 'Deposit added successfully.');
        } catch (\Exception $e) {
            session()->flash('danger', 'Creating deposit failed.');
        }

        return redirect(route('payments.view'));
    }

    public function getPaymentsProperty() { return
        Payment::get(['id', 'grand_total', 'due']);
    }

    public function updatedDepositPaymentId($value) {
        $payment = $this->payments->find($value);   
        
        $this->fill([
            'grand_total' => $payment->grand_total,
            'due' => $payment->due
        ]);
    }    
}
