<div>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Patient ID</th>
                <th>Patient Name</th>
                <th>Description</th>
                <th>Note</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($histories as $history)
                <tr>
                    <td>{{ $history->date }}</td>
                    <td>{{ $history->patient_id }}</td>
                    <td>{{ $history->patient->user->name }}</td>
                    <td>{{ $history->description }}</td>
                    <td>{{ $history->note }}</td>
                    <td>
                        <a href="{{ route( 'histories.edit', $history ) }}">
                            <button class="btn btn-primary">Edit</button>
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
