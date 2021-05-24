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
                <th>Patient ID</th>
                <th>Patient Name</th>
                <th>Schedule</th>
                <th>Status</th>
                <th>Remarks</th>
                <th>Doctor ID</th>
                <th>Doctor Name</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->patient->id }}</td>
                    <td>{{ $appointment->patient->user->name }}</td>
                    <td>{{ $appointment->scheduled_at }}</td>
                    <td>{{ $appointment->status->name }}</td>
                    <td>{{ $appointment->remarks }}</td>
                    <td>{{ $appointment->doctor->id ?? 'N/A' }}</td>
                    <td>{{ $appointment->doctor->user->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('appointment.edit', $appointment)}}">
                            <button>Edit</button>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>No appointments</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
