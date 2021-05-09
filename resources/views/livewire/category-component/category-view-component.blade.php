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
                <th>ID</th>
                <th>Category</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->category }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category) }}">
                            <button type="submit">Edit</button>
                        </a>
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
