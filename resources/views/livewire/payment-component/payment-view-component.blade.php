<div>
    <table>
        <thead>
            <tr>
                <th>Invoice ID</th>
                <th>Patient ID</th>
                <th>Patient Name</th>
                <th>Date</th>
                <th>Sub Total</th>
                <th>Discount Type</th>
                <th>Discount</th>
                <th>Grand Total</th>
                <th>Paid Amount</th>
                <th>Due</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($payments as $payment)
                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->patient->id }}</td>
                    <td>{{ $payment->patient->user->name }}</td>
                    <td>{{ $payment->created_at }}</td>
                    <td>{{ $payment->sub_total }}</td>
                    <td>{{ $payment->isPercent ? 'Percent' : 'Amount' }}</td>
                    <td>{{ $payment->discount ?? 'N/A'  }}</td>
                    <td>{{ $payment->grand_total  }}</td>
                    <td>{{ $payment->deposits->sum('amount_deposit')  }}</td>
                    <td>{{ $payment->due  }}</td>
                    <td>
                        {{-- <a href="{{ route('payments.edit', $payment) }}">
                            <button type="submit">Edit</button>
                        </a> --}}
                    </td>
                </tr>
            @empty
                <tr>
                    <td>No categories</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
