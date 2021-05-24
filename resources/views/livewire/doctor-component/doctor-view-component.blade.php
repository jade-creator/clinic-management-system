<div>
    <table>
        <thead>
            <tr>
                <th>Doctor ID</th>
                <th>Doctor Name</th>
                <th>Total Number of Appointments Completed</th>
                <th>Total Number of Prescriptions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($doctors as $doctor)
                <tr>
                    <td>{{ $doctor->id }}</td>
                    <td>{{ $doctor->user->name }}</td>
                    <td>{{ $doctor->appointments->count() }}</td>
                    <td>{{ $doctor->prescriptions->count() }}</td>
                    <td>
                        {{-- <a href="{{ route('categories.edit', $category) }}">
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
