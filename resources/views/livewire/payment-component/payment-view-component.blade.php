<x-table title="Payments" placeholder="Sample">
    <x-slot name="button">
        <div>
            <a href="{{ route('payments.add') }}">
                <button class="btn btn-primary">Add Payment</button>
            </a>
            <a href="{{ route('deposits.add') }}">
                <button class="btn btn-light border-secondary">Deposit</button>
            </a>
        </div>
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
                    <th class="text-center" scope="col">Option</th>
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
                        <td class="text-center">
                            <a href="{{ route('payments.deposit.add', $payment->id) }}">
                                <button class="btn text-secondary rounded-circle p-1 mx-1" data-toggle="tooltip" data-placement="top" title="Deposit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <rect x="3" y="5" width="18" height="14" rx="3"></rect>
                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                        <line x1="7" y1="15" x2="7.01" y2="15"></line>
                                        <line x1="11" y1="15" x2="13" y2="15"></line>
                                     </svg>
                                </button>
                            </a>
                        </td>

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

