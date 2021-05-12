<div class="">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Prescription Details</h1>
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
        <div class="form-row">
            <div class="form-group col">
                <label for="patient_id">Patient ID</label>
                <select class="form-control @error('patient_id') is-invalid @enderror" name="patient_id" id="patient_id" autofocus wire:model="prescription.patient_id" wire:loading.attr="disabled">
                    <option value="">Choose a Patient ID</option>
                    @forelse ($patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->id }}</option>
                    @empty
                        <option value="">No option</option>
                    @endforelse
                </select>
                @error('prescription.patient_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="patient_name">Patient Name</label>
                <select class="form-control" name="patient_name" id="patient_name" autofocus wire:model="patient_name" wire:loading.attr="disabled">
                    <option value="">Choose a Patient Name</option>
                    @forelse ($patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->user->name }}</option>
                    @empty
                        <option value="">No option</option>
                    @endforelse
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for="doctor_id">Doctor ID</label>
                <select class="form-control @error('doctor_id') is-invalid @enderror" name="doctor_id" id="doctor_id" autofocus aria-readonly="true" wire:model="prescription.doctor_id" wire:loading.attr="disabled">
                    <option value="{{ $this->doctor->id }}">{{ $this->doctor->id }}</option>
                </select>
                @error('prescription.doctor_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="doctor_name">Doctor Name</label>
                <select class="form-control" name="doctor_name" id="doctor_name" autofocus wire:loading.attr="disabled">
                    <option value="{{ $this->doctor->id }}">{{ auth()->user()->name }}</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="medication">Medication</label>
            <textarea class="form-control" id="medication" name="medication" placeholder="lorem ipsum..." required autofocus wire:model.defer="prescription.medication"  wire:loading.attr="disabled"></textarea>
            @error('prescription.medication')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="note">Note</label>
            <textarea class="form-control" id="note" name="note" placeholder="lorem ipsum..." required autofocus wire:model.defer="prescription.note"  wire:loading.attr="disabled"></textarea>
            @error('prescription.note')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <button class="btn btn-primary" type="submit" wire:loading.attr="disabled">SAVE</button>
    </form>
</div>
