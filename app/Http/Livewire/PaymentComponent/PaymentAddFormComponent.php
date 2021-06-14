<?php

namespace App\Http\Livewire\PaymentComponent;

use App\Models\Deposit;
use App\Models\Patient;
use App\Models\Payment;
use App\Models\Treatment;
use App\Services\CollectItems;
use Livewire\Component;

class PaymentAddFormComponent extends Component
{
    public Payment $payment;
    public Deposit $deposit;
    public $items, $collectionTreatments, $patient_name, $treatment_id, $quantity;

    protected $listeners = ['removeItem'];

    public function render() { return 
        view('livewire.payment-component.payment-add-form-component');
    }
    
    public function mount() {
        $this->payment = new Payment();
        $this->deposit = new Deposit();
        $this->collectionTreatments = $this->treatments;

        $this->fill([
            'payment.isPercent' => 0,
            'payment.discount' => 0,
            'deposit.isCash' => 0,
            'items' => [],
            'patient_name' => '',
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
            return $this->dispatchBrowserEvent('swal:modal', [ 
                'type' => 'error',
                'title' => 'Item already added',
                'text' => '',
            ]);
        }

        $treatment = Treatment::select(['id'])
                        ->with('stock:id,quantity,treatment_id')
                        ->find($this->treatment_id);

        if ($this->quantity > $treatment->stock->quantity) {
            return $this->dispatchBrowserEvent('swal:modal', [ 
                'type' => 'error',
                'title' => 'Sorry, stock is not enough',
                'text' => '',
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

    public function removeConfirm($itemIndex) {
        $this->dispatchBrowserEvent('swal:confirm', [ 
            'type' => 'warning',
            'title' => 'Are you sure?',
            'text' => '',
            'id' => $itemIndex,
        ]);
    }

    public function removeItem($itemIndex)
    {   
        unset($this->items[$itemIndex]);
        $this->items = array_values($this->items);

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

    public function create()
    {
        $this->validate();

        try {
            $items = (new CollectItems())->array_columns($this->items, 'quantity,amount', 'id');

            $this->payment->due = $this->payment->grand_total - $this->deposit->amount_deposit;
            $this->payment->save();
            $this->payment->treatments()->attach($items);
            $this->payment->deposits()->save($this->deposit);
            session()->flash('message', 'Payment created successfully.');
        } catch (\Exception $e) {
            session()->flash('danger', 'Creating payment failed.');
        }

        return redirect(route('payments.view'));
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

    public function updatedPaymentIsPercent() 
    {
        $this->payment->discount = 0;

        $this->payment->grand_total = $this->computedTotal();
    }

    public function updatedPaymentDiscount($value) 
    {
        $this->validateOnly('payment.discount');

        return $this->payment->grand_total = $this->computedTotal();
    }

    public function updatedPaymentPatientId() { return
        $this->patient_name = $this->payment->patient_id;
    }

    public function updatedPatientName() { return
        $this->payment->patient_id = $this->patient_name;
    }

    public function getPatientsProperty() { return
        Patient::with('user:id,name')->get(['id', 'user_id']);
    }

    public function getTreatmentsProperty() { return
        Treatment::has('stock')->get(['id', 'name']);
    }
}