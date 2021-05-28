<x-table title="Patients" placeholder="Sample">
    <x-slot name="button">
    </x-slot>

    <x-slot name="filter">
    </x-slot>

    <div name="slot">
        <table class="table table-hover table-bordered table-light">
            <thead>
                <tr>
                    <th class="text-left" scope="col">Patient ID</th>
                    <th class="text-left" scope="col">Name</th>
                    <th class="text-left" scope="col">Phone</th>
                    <th class="text-center" scope="col">Due Balance</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($patients as $patient)
                    <tr>
                        <td class="text-left" scope="row">{{ $patient->id }}</td>
                        <td class="text-left">{{ $patient->user->name }}</td>
                        <td class="text-left">{{ $patient->user->profile->phone_number ?? 'N/A' }}</td>
                        <td class="text-center">{{ $patient->payments->sum('due') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td scope="row" colspan="4">No patients found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        <div>
             {{ $patients->links('pagination::bootstrap-4') }}
        </div>
    </div>
</x-table>
