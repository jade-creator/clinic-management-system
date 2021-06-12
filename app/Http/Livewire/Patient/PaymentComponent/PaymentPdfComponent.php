<?php

namespace App\Http\Livewire\Patient\PaymentComponent;

use App\Models\Deposit;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
// use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class PaymentPdfComponent extends Component
{
    public Payment $payments;
    public $buyer;

    public function render() 
    {
        return <<<'blade'
            <div>sad</div>
        blade;
    }

    public function getIds() { return
        Session::get('payments');
    }

    public function getPayments()
    {
        $paymentIds = $this->getIds();

        return Payment::find($paymentIds[0]);
    }

    public function getDeposits() 
    { 
        $paymentIds = $this->getIds();

        return Deposit::select(['id', 'amount_deposit'])
                ->whereIn('payment_id', $paymentIds[0])
                ->sum('amount_deposit');
    }

    public function show()
    {
        $items = [];
        $payments = $this->getPayments();
        $user = Auth::user();

        $client = new Party([
            'name'          => 'Clinic Management System',
            'phone'         => '(520) 318-9486',
            'address'       => 'Ortigas, Pasig City',
            'custom_fields' => [
                'note'        => 'IDDQD',
                'business id' => '365#GG',
            ],
        ]);

        $customer = new Party([
            'name'          => $user->name,
            'address'       => $user->profile->address,
            'custom_fields' => [
                'patient id' => $user->patient->id,
                'email' => $user->email,
                'phone' => $user->profile->phone_number,
            ],
        ]);

        foreach ($payments as $payment) {
            array_push($items, (new InvoiceItem())->title($payment->id)
                                    ->quantity(0)
                                    ->pricePerUnit($payment->sub_total)
                                    ->subTotalPrice($payment->grand_total) );
        }

        $notes = [
            'N/A',
            'Total Deposit Amount: ₱ '.$this->getDeposits(),
            'Due Amount: ₱ '.$payments->sum('due'),
        ];

        $notes = implode("<br>", $notes);

        $invoice = Invoice::make()
                    ->seller($client)
                    ->buyer($customer)
                    ->dateFormat('m/d/Y')
                    ->addItems($items)
                    ->totalAmount($payments->sum('grand_total'))
                    ->currencySymbol('₱')
                    ->currencyCode('PHP')
                    ->currencyFormat('{SYMBOL}{VALUE}')
                    ->currencyThousandsSeparator('.')
                    ->currencyDecimalPoint(',')
                    ->notes($notes);

        return $invoice->stream();
    }
}
