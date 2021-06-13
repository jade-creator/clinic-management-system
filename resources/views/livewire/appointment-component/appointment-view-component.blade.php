<div class="px-3 px-sm-4">
    <x-table title="Appointments" placeholder="Sample">
        <x-slot name="button">
            @if (auth()->user()->role->name == 'receptionist')
                <a href="{{ route('appointments.add') }}">
                    <button class="btn btn-primary">Add Appointment</button>
                </a>
            @endif

            @if (auth()->user()->role->name == 'doctor')
                <a href="{{ route('doctor.appointments.add') }}">
                    <button class="btn btn-primary">Add Appointment</button>
                </a>
            @endif
        </x-slot>

        <x-slot name="filter">
            <select name="statuses" id="statuses" class="custom-select mx-1" wire:model="status">
                <option value="">-- select status --</option>
                @forelse ($this->statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                @empty
                    <option value="">N/A</option>   
                @endforelse
            </select>

            <select name="byDate" id="byDate" class="custom-select mx-1" wire:model="byDate">
                <option value="">-- select schedule --</option>
                <option value="today">Today</option>
                <option value="upcoming">Upcoming</option>   
            </select>
        </x-slot>

        @include('partials.alerts')

        <div name="slot">
            <table class="table table-hover table-bordered table-light">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">Patient ID</th>
                        <th class="text-left" scope="col">Patient Name</th>
                        <th class="text-center" scope="col">Schedule</th>
                        <th class="text-left" scope="col">Status</th>
                        <th class="text-center" scope="col">Remarks</th>
                        <th class="text-center" scope="col">Doctor ID</th>
                        <th class="text-left" scope="col">Doctor Name</th>
                        <th class="text-left" scope="col">Option</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($appointments as $appointment)
                        <tr>
                            <td class="text-center" scope="row">{{ $appointment->patient->id }}</td>
                            <td class="text-left">{{ $appointment->patient->user->name }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($appointment->scheduled_at)->format('Y-m-d g:ia') }}</td>
                            <td class="text-left">{{ $appointment->status->name }}</td>
                            <td class="text-center">{{ $appointment->remarks }}</td>
                            <td class="text-center">{{ $appointment->doctor->id ?? 'N/A' }}</td>
                            <td class="text-left">{{ $appointment->doctor->user->name ?? 'N/A' }}</td>
                            <td class="text-left">
                                <a class="text-decoration-none" href="{{ route('appointments.edit', $appointment) }}">
                                    <button class="btn text-success rounded-circle p-1 mx-1" data-toggle="tooltip" data-placement="top" title="Details">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                            <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line>
                                        </svg>
                                    </button>
                                </a>
                                <button class="btn text-danger rounded-circle p-1 mx-1" data-toggle="tooltip" data-placement="top" title="Delete" wire:click="destroy({{ $appointment }})">
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
                        </tr>
                    @empty
                        <tr>
                            <td scope="row" colspan="8" class="text-center">No appointments found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            
            <div>
                {{ $appointments->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </x-table>
</div>