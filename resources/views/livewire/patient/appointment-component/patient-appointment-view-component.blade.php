<div>
    <section>
        <select name="statuses" id="statuses" wire:model="status">
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
        </select>
    </section>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Schedule</th>
                <th>Status</th>
                <th>Remarks</th>
                <th>Doctor</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->id }}</td>
                    <td>{{ $appointment->scheduled_at }}</td>
                    <td>{{ $appointment->status->name }}</td>
                    <td>{{ $appointment->remarks }}</td>
                    <td>{{ $appointment->doctor->name ?? 'N/A' }}</td>
                </tr>
            @empty
                <tr>
                    <td>No appointments</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
