<div class="">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Case History</h1>
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
    <form method="post" wire:submit.prevent="update">
        <div class="form-row">
            <div class="form-group col">
                <label for="patient_id">Patient ID</label>
                <select id="patient_id" name="patient_id" class="form-control" required autofocus wire:model="history.patient_id" wire:loading.attr="disabled">
                    <option value="">-- choose patient id --</option>
                    @forelse ($this->patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->id }}</option>
                    @empty
                        <option value="">N/A</option>
                    @endforelse
                </select>
            </div>
            <div class="form-group col">
                <label for="patient_name">Patient Name</label>
                <select id="patient_name" name="patient_name" class="form-control" required autofocus wire:model="patient_name" wire:loading.attr="disabled">
                    <option value="">-- choose patient name --</option>
                    @forelse ($this->patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->user->name }}</option>
                    @empty
                        <option value="">N/A</option>
                    @endforelse
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input id="date" name="date" type="date" class="form-control @error('history.date') is-invalid @enderror" required autofocus wire:model.defer="history.date" wire:loading.attr="disabled">
            @error('history.date')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div> 
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" placeholder="lorem ipsum..." required autofocus wire:model.defer="history.description" wire:loading.attr="disabled"></textarea>
        </div>
        <div class="form-group">
            <label for="note">Note</label>
            <textarea id="note" name="note" class="form-control" placeholder="lorem ipsum..." required autofocus wire:model.defer="history.note" wire:loading.attr="disabled"></textarea>
        </div>
        <button class="btn btn-primary" type="submit" wire:loading.attr="disabled">SAVE</button>
    </form>
</div>
