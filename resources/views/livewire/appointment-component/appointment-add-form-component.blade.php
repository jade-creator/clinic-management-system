<div class="">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Appointment Details</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            This week
        </button>
        </div>
    </div>
    <form method="post" wire:submit.prevent="create">
        <div class="form-group">
            <label for="name">My Name</label>
            <input type="text" disabled class="form-control" id="name" name="name" required autofocus wire:model.defer="patientName">
        </div>
        {{-- <div class="form-row">
            <div class="form-group col">
                <label for="doctor_id">Doctor's ID</label>
                <select disabled id="doctor_id" name="doctor_id" class="form-control" required>
                    <option value="">N/A</option>
                </select>
            </div>
            <div class="form-group col">
                <label for="doctor_name,">Doctor's Name</label>
                <input type="text" disabled class="form-control" id="doctor_name" name="doctor_name" placeholder="N/A" required>
            </div>
        </div> --}}
        <div class="form-row">
            <div class="form-group col">
                <label for="schedule">Schedule</label>
                <input type="datetime-local"  class="form-control @error('appointment.scheduled_at') is-invalid @enderror" id="schedule" name="schedule" required autofocus wire:model.defer="appointment.scheduled_at" wire:loading.attr="disabled">
                @error('appointment.scheduled_at')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div> 
            <div class="form-group col">
                <label for="status_id">Status</label>
                <select id="status_id" name="status_id" class="form-control" required autofocus wire:model.defer="appointment.status_id" wire:loading.attr="disabled">
                    @forelse ($this->statuses as $status)
                        @if ($loop->first)
                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                        @endif
                    @empty
                        <option value="">No records</option>
                    @endforelse
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="remarks">Remarks</label>
            <textarea class="form-control" id="remarks" name="remarks" placeholder="lorem ipsum..." required autofocus wire:model.defer="appointment.remarks"  wire:loading.attr="disabled"></textarea>
        </div>
        <button class="btn btn-primary" type="submit" wire:loading.attr="disabled">SAVE</button>
    </form>
</div>
