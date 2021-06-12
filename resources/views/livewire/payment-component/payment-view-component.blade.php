<x-table title="Payments" placeholder="Sample">
    <x-slot name="button">
        <a href="{{ route('payments.add') }}">
            <button class="btn btn-primary">Add Payment</button>
        </a>
    </x-slot>

    <x-slot name="filter">
    </x-slot>

    <div name="slot">
        <table class="table table-hover table-bordered table-light">
            <thead>
                <tr>
                    <th class="text-left" scope="col">Invoice ID</th>
                    <th class="text-left" scope="col">Patient ID</th>
                    <th class="text-left" scope="col">Patient Name</th>
                    <th class="text-left" scope="col">Date</th>
                    <th class="text-center" scope="col">Sub Total</th>
                    <th class="text-left" scope="col">Discount Type</th>
                    <th class="text-center" scope="col">Discount</th>
                    <th class="text-center" scope="col">Grand Total</th>
                    <th class="text-center" scope="col">Paid Amount</th>
                    <th class="text-center" scope="col">Due</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($payments as $payment)
                    <tr>
                        <td class="text-left" scope="row">{{ $payment->id }}</td>
                        <td class="text-left">{{ $payment->patient->id }}</td>
                        <td class="text-left">{{ $payment->patient->user->name }}</td>
                        <td class="text-left">{{ $payment->created_at }}</td>
                        <td class="text-center">{{ $payment->sub_total }}</td>
                        <td class="text-left">{{ $payment->isPercent ? 'Percent' : 'Amount' }}</td>
                        <td class="text-center">{{ $payment->discount ?? 'N/A'  }}</td>
                        <td class="text-center">{{ $payment->grand_total  }}</td>
                        <td class="text-center">{{ $payment->deposits->sum('amount_deposit')  }}</td>
                        <td class="text-center">{{ $payment->due  }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center">No payments found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        <div>
             {{ $payments->links('pagination::bootstrap-4') }}
        </div>
    </div>
</x-table>

