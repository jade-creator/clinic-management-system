<div class="px-3 px-sm-4">
    <x-table title="Appointments" placeholder="ID, remarks, name">
        <x-slot name="button">
            <a href="{{ route('patient.appointments.add') }}">
                <button class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>    
                    <span class="d-none d-md-inline-block">Add Appointment</span>
                </button>
            </a>
        </x-slot>

        <x-slot name="filter">
            <div class="col-lg-6 col-md-auto mb-2 mb-lg-0">
                <select name="statuses" id="statuses" class="custom-select" wire:model="status">
                    <option value="">-- select status --</option>
                    @forelse ($this->statuses as $status)
                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                    @empty
                        <option value="">N/A</option>   
                    @endforelse
                </select>
            </div>

            <div class="col-lg-6 col-md-auto mb-2 mb-lg-0">
                <select name="byDate" id="byDate" class="custom-select" wire:model="byDate">
                    <option value="">-- select schedule --</option>
                    <option value="today">Today</option>
                    <option value="upcoming">Upcoming</option>   
                </select>
            </div>
        </x-slot>

        @include('partials.alerts')

        <div name="slot">
            <table class="table table-hover table-bordered table-light">
                <thead>
                    <tr>
                        <th class="text-left" scope="col">ID</th>
                        <th class="text-left" scope="col">Schedule</th>
                        <th class="text-left" scope="col">Status</th>
                        <th class="text-left" scope="col">Remarks</th>
                        <th class="text-left" scope="col">Doctor Name</th>
                        <th class="text-center" scope="col">Option</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($appointments as $appointment)
                        <tr>
                            <td class="text-left" scope="row">{{ $appointment->id }}</td>
                            <td class="text-left">{{ \Carbon\Carbon::parse($appointment->scheduled_at)->format('Y-m-d g:ia') }}</td>
                            <td class="text-left">{{ $appointment->status->name }}</td>
                            <td class="text-left">{{ $appointment->remarks }}</td>
                            <td class="text-left">{{ $appointment->doctor->user->name ?? 'N/A' }}</td>
                            <td class="text-center">
                                <a href="{{ route('patient.appointments.edit', $appointment) }}" class="text-decoration-none">
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
                            <td scope="row" colspan="6" class="text-center">No appointments found.</td>
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