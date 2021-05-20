<?php

namespace App\Http\Livewire\PaymentComponent;

use App\Models\Deposit;
use App\Models\Patient;
use App\Models\Payment;
use App\Models\Treatment;
use App\Services\CollectItems;
use Livewire\Component;

class PaymentEditFormComponent extends Component
{
    public Payment $payment;
    public Deposit $deposit;
    public $items, $collectionTreatments, $patient_name, $treatment_id, $quantity;

    public function render() { return 
        view('livewire.payment-component.payment-edit-form-component');
    }

    public function mount() 
    {
        $this->deposit = $this->payment->deposits->first();
        $this->collectionTreatments = $this->treatments;

        $this->fill([
            'payment.isPercent' => 0,
            'payment.discount' => 0,
            'deposit.isCash' => 0,
            'items' => $this->payment->treatments->toArray(),
            'patient_name' => $this->payment->patient->id,
            'treatment_id' => '',
            'quantity' => 0
        ]);
    }

    public function rules() {
        return [
            'payment.patient_id' => ['required', 'integer'],
            'payment.sub_total' => ['required', 'integer'],
            'payment.isPercent' => ['required', 'integer'],
            'payment.discount' => ['required', 'integer', 'min:0'],
            'payment.grand_total' => ['required'],
            'deposit.date_deposit' => ['required', 'date', 'after_or_equal:today'],
            'deposit.amount_deposit' => ['required', 'integer'],
            'deposit.isCash' => ['required', 'integer'],
        ];  
    }

    public function messages() {
        return [
            'payment.isPercent.required_unless' => 'This field is required unless discount value is not define.',
            'payment.discount.required_unless' => 'This field is required unless type of discount is not chosen.'
        ];
    }

    public function addItem() 
    {
        $this->validate([
            'treatment_id' => ['required'],
            'quantity' => ['required', 'numeric', 'min:1']
        ]);

        if (!empty($this->items) && (new CollectItems())->in_deep_array($this->treatment_id, $this->items)) {
            return \Debugbar::info([
                'info' => 'the item is already added.'
            ]);
        }

        $selectedItem = $this->collectionTreatments->filter(function($item) {
            return $item->id == $this->treatment_id;  
        })->first();

        $this->items[] = [
            'id' => $selectedItem->id,
            'name' => $selectedItem->name,
            'quantity' => $this->quantity,
            'amount' => ($this->quantity * $selectedItem->selling_price),
        ];

        $this->updatedItems();
    }

    public function computedTotal()
    {
        if ($this->payment->isPercent) {
            $percentage = $this->payment->discount / 100;
            $compute = $percentage * $this->payment->sub_total;
            return $this->payment->sub_total - $compute;
        }

        return $this->payment->sub_total - $this->payment->discount;
    }

    public function updatedItems() 
    {
        $running_total = 0;

        foreach ($this->items as $item) {
            $running_total += $item['amount'];
        }

        $this->payment->sub_total = $running_total;

        $this->payment->grand_total = $this->computedTotal();
    }

    public function updatedPaymentPatientId() { return
        $this->patient_name = $this->payment->patient_id;
    }

    public function updatedPatientName() { return
        $this->payment->patient_id = $this->patient_name;
    }

    public function getPatientsProperty() { return
        Patient::with('user')->get();
    }

    public function getTreatmentsProperty() { return
        Treatment::all();
    }
}
