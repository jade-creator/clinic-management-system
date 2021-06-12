@props([ 'title', 'placeholder' ])

<div class="table-responsive">
    <div class="d-flex justify-content-between align-items-center border-2 border-bottom pb-3 mb-3">
        <h2>{{ $title }}</h2>
        {{ $button }}
    </div>  

    <div class="d-flex justify-content-between align-items-center">
        <div class="my-2">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <circle cx="10" cy="10" r="7"></circle>
                            <line x1="21" y1="21" x2="15" y2="15"></line>
                            </svg>
                    </div>
                </div>
                <input type="text" class="form-control mr-1" id="inlineFormInputGroup" placeholder="{{ $placeholder }}" wire:model.debounce.3000="search">

                {{ $filter }}
            </div>
        </div>

        <div class="my-2 d-flex justify-content-between align-items-center">
            <label for="paginateValue" class="mx-1">Display:</label>
            <select name="paginateValue" id="paginateValue" class="custom-select" wire:model="paginateValue" wire:loading.attr="disabled">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
    </div>

    {{ $slot }}
</div>
