<x-table title="Prescriptions" placeholder="Sample">
    <x-slot name="button">
        <a href="{{ route('prescriptions.add') }}">
            <button class="btn btn-primary">Add Prescription</button>
        </a>
    </x-slot>

    <x-slot name="filter">
    </x-slot>

    <div name="slot">
        <table class="table table-hover table-bordered table-light">
            <thead>
                <tr>
                    <th class="text-left" scope="col">Patient ID</th>
                    <th class="text-left" scope="col">Patient Name</th>
                    <th class="text-left" scope="col">Medication</th>
                    <th class="text-left" scope="col">Note</th>
                    <th class="text-left" scope="col">Doctor ID</th>
                    <th class="text-left" scope="col">Doctor Name</th>
                    <th class="text-center" scope="col">Option</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($prescriptions as $prescription)
                    <tr>
                        <td class="text-left" scope="row">{{ $prescription->patient->id }}</td>
                        <td class="text-left">{{ $prescription->patient->user->name }}</td>
                        <td class="text-left">{{ $prescription->medication }}</td>
                        <td class="text-left">{{ $prescription->note }}</td>
                        <td class="text-left">{{ $prescription->doctor->id }}</td>
                        <td class="text-left">{{ $prescription->doctor->user->name }}</td>
                        <td class="text-center">
                            <a href="{{ route('prescriptions.edit', $prescription) }}">
                                <button class="btn text-success rounded-circle p-1 mx-1" data-toggle="tooltip" data-placement="top" title="Details">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                        <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line>
                                     </svg>
                                </button>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">No prescriptions found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        <div>
             {{ $prescriptions->links('pagination::bootstrap-4') }}
        </div>
    </div>
</x-table>


