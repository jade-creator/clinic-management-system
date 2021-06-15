<div class="px-3 px-sm-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Stock</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('stocks.view') }}">
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
    <form method="post" wire:submit.prevent="update">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="treatment_id">Treatment ID</label>
                <select class="form-control @error('stock.treatment_id') is-invalid @enderror" name="treatment_id" id="treatment_id" required autofocus wire:model="stock.treatment_id" wire:loading.attr="disabled">
                    <option value="">Choose a Treatment ID</option>
                    @forelse ($treatments as $treatment)
                        <option value="{{ $treatment->id }}">{{ $treatment->id }}</option>
                    @empty
                        <option value="">No option</option>
                    @endforelse
                </select>
                @error('stock.treatment_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="treatment_name">Treatment Name</label>
                <select class="form-control" name="treatment_name" id="treatment_name" required autofocus wire:model="stock.treatment_id" wire:loading.attr="disabled">
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
            <input type="number" class="form-control @error('stock.quantity') is-invalid @enderror" id="treatment_quantity" name="treatment_quantity" required autofocus wire:model.defer="stock.quantity" wire:loading.attr="disabled">
            @error('stock.quantity')
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
