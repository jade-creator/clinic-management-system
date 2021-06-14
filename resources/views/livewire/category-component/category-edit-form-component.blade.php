<div class="px-3 px-sm-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Category</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('categories.view') }}">
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
        <p>Last Updated: {{ $this->category->updated_at->diffForHumans() }}</p>
    </div>

    <form method="post" wire:submit.prevent="update">
        <div class="form-group">
            <label for="category">Category Name</label>
            <input type="text" class="form-control @error('category.name') is-invalid @enderror" id="category" name="category" required autofocus wire:model.defer="category.name" wire:loading.attr="disabled">
            @error('category.name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control @error('category.description') is-invalid @enderror" id="description" name="description" required autofocus wire:model.defer="category.description" wire:loading.attr="disabled"></textarea>
            @error('category.description')
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
