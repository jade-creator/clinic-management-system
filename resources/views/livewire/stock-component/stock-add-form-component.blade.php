<div class="">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Stock</h1>
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
                <label for="treatment_id">Treatment ID</label>
                <select class="form-control @error('treatment_id') is-invalid @enderror" name="treatment_id" id="treatment_id" autofocus wire:model="treatment_id" wire:loading.attr="disabled">
                    <option value="">Choose a Treatment ID</option>
                    @forelse ($treatments as $treatment)
                        <option value="{{ $treatment->id }}">{{ $treatment->id }}</option>
                    @empty
                        <option value="">No option</option>
                    @endforelse
                </select>
                @error('treatment_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="treatment_name">Treatment Name</label>
                <select class="form-control" name="treatment_name" id="treatment_name" autofocus wire:model="treatment_name" wire:loading.attr="disabled">
                    <option value="">Choose a Treatment Name</option>
                    @forelse ($treatments as $treatment)
                        <option value="{{ $treatment->id }}">{{ $treatment->name }}</option>
                    @empty
                        <option value="">No option</option>
                    @endforelse
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="treatment_quantity">Quantity</label>
            <input type="number" class="form-control" id="treatment_quantity" name="treatment_quantity" autofocus wire:model.defer="quantity" wire:loading.attr="disabled">
        </div>
        <button class="btn btn-primary" type="submit" wire:loading.attr="disabled">SAVE</button>
    </form>
</div>
