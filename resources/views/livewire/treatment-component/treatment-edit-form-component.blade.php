<div class="px-3 px-sm-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Treatment</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('treatments.view') }}">
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
                    View List
                </button>
            </a>
        </div>
    </div>

    <div>
        <p>Last Updated: {{ $this->treatment->updated_at->diffForHumans() }}</p>
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
            <textarea class="form-control @error('treatment.description') is-invalid @enderror" id="description" name="description" required autofocus wire:model.defer="treatment.description" wire:loading.attr="disabled"></textarea>
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
            <button class="btn px-5 btn-primary" type="submit" wire:loading.attr="disabled">Update</button>
        </div>
    </form>
</div>
