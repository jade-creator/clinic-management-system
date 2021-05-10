<div>
    <table>
        <thead>
            <tr>
                <th>Treatment ID</th>
                <th>Treatment Name</th>
                <th>Quantity</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($stocks as $stock)
                <tr>
                    <td>{{ $stock->treatment->id }}</td>
                    <td>{{ $stock->treatment->name }}</td>
                    <td>{{ $stock->quantity }}</td>
                    <td>{{ $stock->updated_at }}</td>
                    <td>
                        <a href="{{ route('stocks.edit', $stock) }}">
                            <button type="submit">Edit</button>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>No treatments</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
