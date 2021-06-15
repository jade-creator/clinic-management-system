<div class="px-3 px-sm-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Case History</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('histories.view') }}">
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

    <div>
        <p>Last Updated: {{ $this->history->updated_at->diffForHumans() }}</p>
    </div>

    <form method="post" wire:submit.prevent="update">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="patient_id">Patient ID</label>
                <select id="patient_id" name="patient_id" class="form-control @error('history.patient_id') is-invalid @enderror" required autofocus wire:model="history.patient_id" wire:loading.attr="disabled">
                    <option value="">Choose Patient ID</option>
                    @forelse ($this->patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->id }}</option>
                    @empty
                        <option value="">N/A</option>
                    @endforelse
                </select>
                @error('history.patient_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="patient_name">Patient Name</label>
                <select id="patient_name" name="patient_name" class="form-control" required autofocus wire:model="patient_name" wire:loading.attr="disabled">
                    <option value="">Choose Patient Name</option>
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
            <textarea id="description" name="description" class="form-control @error('history.description') is-invalid @enderror" placeholder="..." required autofocus wire:model.defer="history.description" wire:loading.attr="disabled"></textarea>
            @error('history.description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="note">Note</label>
            <textarea id="note" name="note" class="form-control @error('history.note') is-invalid @enderror" placeholder="..." required autofocus wire:model.defer="history.note" wire:loading.attr="disabled"></textarea>
            @error('history.note')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group text-right">
            <button class="btn px-5 btn-primary" type="submit" wire:loading.attr="disabled">Update</button>
        </div>
    </form>
</div>