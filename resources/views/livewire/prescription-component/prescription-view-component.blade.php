<div class="px-3 px-sm-4">
    <x-table title="Prescriptions" placeholder="ID, name, medication, note">
        <x-slot name="button">
            @if (auth()->user()->role->name == 'admin')
                <a href="{{ route('prescriptions.add') }}">
                    <button class="btn btn-primary">Add Prescription</button>
                </a>
            @endif

            @if (auth()->user()->role->name == 'doctor')
                <a href="{{ route('doctor.prescriptions.add') }}">
                    <button class="btn btn-primary">Add Prescription</button>
                </a>
            @endif
        </x-slot>

        <x-slot name="filter">
        </x-slot>

        @include('partials.alerts')

        <div name="slot">
            <table class="table table-hover table-bordered table-light">
                <thead>
                    <tr>
                        <th class="text-left" scope="col">Patient ID</th>
                        <th class="text-left" scope="col">Patient Name</th>
                        <th class="text-left" scope="col">Medication</th>
                        <th class="text-left" scope="col">Note</th>
                        <th class="text-center" scope="col">Doctor ID</th>
                        <th class="text-left" scope="col">Doctor Name</th>
                        @if (auth()->user()->role->name == 'doctor' || auth()->user()->role->name == 'admin')
                            <th class="text-center" scope="col">Option</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($prescriptions as $prescription)
                        <tr>
                            <td class="text-left" scope="row">{{ $prescription->patient->id }}</td>
                            <td class="text-left">{{ $prescription->patient->user->name }}</td>
                            <td class="text-left">{{ $prescription->medication }}</td>
                            <td class="text-left">{{ $prescription->note }}</td>
                            <td class="text-center">{{ $prescription->doctor->id }}</td>
                            <td class="text-left">{{ $prescription->doctor->user->name }}</td>
                            @if (auth()->user()->role->name == 'doctor' || auth()->user()->role->name == 'admin')
                                <td class="text-center">
                                    <a class="text-decoration-none" href="{{ route('prescriptions.edit', $prescription) }}">
                                        <button class="btn text-success rounded-circle p-1 mx-1" data-toggle="tooltip" data-placement="top" title="Details">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                                <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line>
                                            </svg>
                                        </button>
                                    </a>
                                    <button class="btn text-danger rounded-circle p-1 mx-1" data-toggle="tooltip" data-placement="top" title="Delete" wire:click="destroy({{ $prescription }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <line x1="4" y1="7" x2="20" y2="7"></line>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                        </svg>
                                    </button>
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td scope="row" colspan="9" class="text-center">No prescriptions found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            
            <div>
                {{ $prescriptions->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </x-table>
</div>