<div class="px-3 px-sm-4">
    <x-table title="Payments" placeholder="ID">
        <x-slot name="button">
            <a href="{{ route('patient.payment.pdf') }}" target="_blank">
                <button class="btn btn-primary">Print Invoice</button>
            </a>
        </x-slot>

        <div class="container-fluid">
            <div>
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="card text-white bg-primary">
                            <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="text-value-lg">₱ {{ $payments->sum('grand_total') }}</div>
                                    <div class="mb-2">Total Bill Amount</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card text-white bg-primary">
                            <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="text-value-lg">₱ {{ $this->deposits }}</div>
                                    <div class="mb-2">Total Deposit Amount</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="card text-white bg-primary">
                            <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="text-value-lg">₱ {{ $payments->sum('due') }}</div>
                                    <div class="mb-2">Due Amount</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <x-slot name="filter">
        </x-slot>

        <div name="slot" class="table-responsive">
            <table class="table table-hover table-striped table-light">
                <thead>
                    <tr>
                        <th class="text-left" scope="col">Payment ID</th>
                        <th class="text-left" scope="col">DateTime</th>
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
                            <td class="text-left">{{ $payment->created_at }}</td>
                            <td class="text-center">{{ $payment->sub_total }}</td>
                            <td class="text-left">{{ $payment->isPercent ? 'Percent' : 'Amount' }}</td>
                            <td class="text-center">{{ $payment->discount ?? 'N/A' }}</td>
                            <td class="text-center">{{ $payment->grand_total }}</td>
                            <td class="text-center">{{ $payment->deposits->sum('amount_deposit') }}</td>
                            <td class="text-center">{{ $payment->due }}</td>
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
</div>