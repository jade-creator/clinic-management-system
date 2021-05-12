<div>
    <table>
        <thead>
            <tr>
                <th>Patient ID</th>
                <th>Patient Name</th>
                <th>Medication</th>
                <th>Note</th>
                <th>Doctor ID</th>
                <th>Doctor Name</th>
                <th>Created Date</th>
                <th>Updated Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($prescriptions as $prescription)
                <tr>
                    <td>{{ $prescription->patient->id }}</td>
                    <td>{{ $prescription->patient->user->name }}</td>
                    <td>{{ $prescription->medication }}</td>
                    <td>{{ $prescription->note }}</td>
                    <td>{{ $prescription->doctor->id }}</td>
                    <td>{{ $prescription->doctor->user->name }}</td>
                    <td>{{ $prescription->created_at }}</td>
                    <td>{{ $prescription->updated_at }}</td>
                    <td>
                        <a href="{{ route('prescriptions.edit', $prescription)}}">
                            <button>Edit</button>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>No prescriptions</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
