<div>
    <table>
        <thead>
            <tr>
                <th>Patient ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Due Balance</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($patients as $patient)
                <tr>
                    <td>{{ $patient->id }}</td>
                    <td>{{ $patient->user->name }}</td>
                    <td>{{ $patient->user->profile->phone_number }}</td>
                    <td>{{ $patient->payments->sum('due') }}</td>
                    {{-- <td>
                        <a href="{{ route('categories.edit', $category) }}">
                            <button type="submit">Edit</button>
                        </a>
                    </td> --}}
                </tr>
            @empty
                <tr>
                    <td>No categories</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
