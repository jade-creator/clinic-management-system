<div>
    <section>
        {{-- <select name="statuses" id="statuses" wire:model="status">
            <option value="">All</option>
            @forelse ($this->statuses as $status)
                <option value="{{ $status->id }}">{{ $status->name }}</option>
            @empty
                <option value="">N/A</option>   
            @endforelse
        </select>
        <select name="byDate" id="byDate" wire:model="byDate">
            <option value="">All</option>
            <option value="=">Today</option>
            <option value=">">Upcoming</option>   
        </select> --}}
    </section>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Purchase Price</th>
                <th>Selling Price</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($treatments as $treatment)
                <tr>
                    <td>{{ $treatment->name }}</td>
                    <td>{{ $treatment->description }}</td>
                    <td>{{ $treatment->purchase_price }}</td>
                    <td>{{ $treatment->selling_price }}</td>
                    <td>{{ $treatment->category->category }}</td>
                    <td>
                        <a href="{{ route('treatments.edit', $treatment) }}">
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
