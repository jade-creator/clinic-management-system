<div class="px-3 px-sm-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Treatment</h1>
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
                <label for="treatment">Name</label>
                <input type="text" class="form-control @error('treatment.name') is-invalid @enderror" id="treatment" name="treatment" required autofocus wire:model.defer="treatment.name" wire:loading.attr="disabled">
                @error('treatment.name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="categories">Category</label>
                <select name="" id="" class="form-control @error('treatment.category_id') is-invalid @enderror" id="categories" name="categories" required autofocus wire:model.defer="treatment.category_id" wire:loading.attr="disabled"></>
                    <option value="">Choose a category</option>
                    @forelse ($this->categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @empty
                        <option value="">No categories</option>
                    @endforelse
                </select>
                @error('treatment.category_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control @error('treatment.description') is-invalid @enderror" id="description" name="description" placeholder="lorem ipsum..." required autofocus wire:model.defer="treatment.description" wire:loading.attr="disabled"></textarea>
            @error('treatment.description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for="purchase_price">Purchase Price</label>
                <input type="number" class="form-control @error('treatment.purchase_price') is-invalid @enderror" name="purchase_price" id="purchase_price" required autofocus wire:model.defer="treatment.purchase_price" wire:loading.attr="disabled">
                @error('treatment.purchase_price')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="selling_price">Selling Price</label>
                <input type="number" class="form-control @error('treatment.selling_price') is-invalid @enderror" name="selling_price" id="selling_price" required autofocus wire:model.defer="treatment.selling_price" wire:loading.attr="disabled">
                @error('treatment.selling_price')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group text-right">
            <button class="btn px-5 btn-primary" type="submit" wire:loading.attr="disabled">Save</button>
        </div>
    </form>
</div>
