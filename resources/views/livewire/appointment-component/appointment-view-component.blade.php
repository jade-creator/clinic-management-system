<x-table title="Appointments" placeholder="Sample">
    <x-slot name="button">
        <a href="#">
            <button class="btn btn-primary">Add Appointment</button>
        </a>
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
                    <th class="text-center" scope="col">Option</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($appointments as $appointment)
                    <tr>
                        <td class="text-center" scope="row">{{ $appointment->patient->id }}</td>
                        <td class="text-left">{{ $appointment->patient->user->name }}</td>
                        <td class="text-center">{{ $appointment->scheduled_at }}</td>
                        <td class="text-left">{{ $appointment->status->name }}</td>
                        <td class="text-center">{{ $appointment->remarks }}</td>
                        <td class="text-center">{{ $appointment->doctor->id ?? 'N/A' }}</td>
                        <td class="text-left">{{ $appointment->doctor->user->name ?? 'N/A' }}</td>
                        <td class="text-center">
                            <button class="btn text-info rounded-circle p-1 mx-1" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                </svg>
                            </button>
                            <button class="btn text-success rounded-circle p-1 mx-1" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stethoscope" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M6 4h-1a2 2 0 0 0 -2 2v3.5h0a5.5 5.5 0 0 0 11 0v-3.5a2 2 0 0 0 -2 -2h-1"></path>
                                    <path d="M8 15a6 6 0 1 0 12 0v-3"></path>
                                    <path d="M11 3v2"></path>
                                    <path d="M6 3v2"></path>
                                    <circle cx="20" cy="10" r="2"></circle>
                                </svg>
                            </button>
                            <button class="btn text-dark rounded-circle p-1 mx-1" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report-medical" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                                    <rect x="9" y="3" width="6" height="4" rx="2"></rect>
                                    <line x1="10" y1="14" x2="14" y2="14"></line>
                                    <line x1="12" y1="12" x2="12" y2="16"></line>
                                 </svg>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td scope="row" colspan="8">No appointments found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        <div>
             {{ $appointments->links('pagination::bootstrap-4') }}
        </div>
    </div>
</x-table>