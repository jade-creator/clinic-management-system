<div class="px-3 px-sm-4">
    <x-table title="Patients" placeholder="ID, name, phone">
        <x-slot name="button">
        </x-slot>

        <x-slot name="filter">
        </x-slot>

        <div name="slot" class="table-responsive">
            <table class="table table-hover table-bordered table-light">
                <thead>
                    <tr>
                        <th class="text-left" scope="col">Patient ID</th>
                        <th class="text-left" scope="col">Name</th>
                        <th class="text-left" scope="col">Phone</th>
                        <th class="text-center" scope="col">Due Balance</th>
                        <th class="text-left" scope="col">Option</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($patients as $patient)
                        <tr>
                            <td class="text-left" scope="row">{{ $patient->id ?? 'N/A' }}</td>
                            <td class="text-left">{{ $patient->user->name ?? 'N/A' }}</td>
                            <td class="text-left">{{ $patient->user->profile->phone_number ?? 'N/A' }}</td>
                            <td class="text-center">{{ $patient->payments->sum('due') ?? 'N/A' }}</td>
                            <td class="text-left">
                                <a class="text-decoration-none" href="{{ route('users.view', ['search' => $patient->user->name]) }}">
                                    <button class="btn text-info rounded-circle p-1 mx-1" data-toggle="tooltip" data-placement="top" title="View Profile">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                        </svg>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td scope="row" colspan="4" class="text-center">No patients found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            
            <div>
                {{ $patients->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </x-table>
</div>