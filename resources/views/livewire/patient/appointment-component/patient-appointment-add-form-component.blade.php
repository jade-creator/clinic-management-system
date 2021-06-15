<div class="px-3 px-sm-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Appointment Details</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('patient.appointments.view') }}">
                <button type="button" class="btn btn-sm btn-light border-2 border-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list" width="22" height="22" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="9" y1="6" x2="20" y2="6"></line>
                        <line x1="9" y1="12" x2="20" y2="12"></line>
                        <line x1="9" y1="18" x2="20" y2="18"></line>
                        <line x1="5" y1="6" x2="5" y2="6.01"></line>
                        <line x1="5" y1="12" x2="5" y2="12.01"></line>
                        <line x1="5" y1="18" x2="5" y2="18.01"></line>
                    </svg>
                    <span class="d-none d-md-inline-block">View List</span>
                </button>
            </a>
        </div>
    </div>
    <form method="post" wire:submit.prevent="create">
        <div class="form-group">
            <label for="name">My Name</label>
            <input type="text" disabled class="form-control" id="name" name="name" required autofocus wire:model.defer="patientName">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="schedule">Schedule</label>
                <input type="datetime-local"  class="form-control @error('appointment.scheduled_at') is-invalid @enderror" id="schedule" name="schedule" required autofocus wire:model.defer="appointment.scheduled_at" wire:loading.attr="disabled">
                @error('appointment.scheduled_at')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div> 
            <div class="form-group col-md-6">
                <label for="status_id">Status</label>
                <select id="status_id" name="status_id" class="form-control @error('appointment.status_id') is-invalid @enderror" required autofocus wire:model.defer="appointment.status_id" wire:loading.attr="disabled">
                    @forelse ($this->statuses as $status)
                        @if ($loop->first)
                            <option value="{{ $status->id }}" selected>{{ $status->name }}</option>
                        @endif
                    @empty
                        <option value="">No records</option>
                    @endforelse
                </select>
                @error('appointment.status_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="remarks">Remarks</label>
            <textarea class="form-control @error('appointment.remarks') is-invalid @enderror" id="remarks" name="remarks" placeholder="lorem ipsum..." required autofocus wire:model.defer="appointment.remarks"  wire:loading.attr="disabled"></textarea>
            @error('appointment.remarks')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group text-right">
            <button class="btn px-5 btn-primary" type="submit" wire:loading.attr="disabled">Save</button>
        </div>
    </form>
</div>
