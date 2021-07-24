@props([ 'title', 'placeholder' ])

<div class="table-responsive">
    {{-- <div class="d-flex justify-content-between align-items-center border-2 border-bottom pb-3 mb-3">
        <h2>{{ $title }}</h2>
        {{ $button }}
    </div>   --}}

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-2 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
        {{ $button }}
    </div>

    <div class="container-fluid mb-3">
        <div class="row">
            <div class="col-lg-3 col-md-auto mb-2 mb-lg-0">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="10" cy="10" r="7"></circle>
                                <line x1="21" y1="21" x2="15" y2="15"></line>
                            </svg>
                        </div>
                    </div>
                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="{{ $placeholder }}" wire:model.debounce.3000="search">
                </div>
            </div>

            <div class="col-lg-6 col-md-auto">
              <div class="row">
                {{ $filter }}
              </div>
            </div>

            <div class="col-lg-3 col-md-auto mb-2 mb-lg-0">
                <select name="paginateValue" id="paginateValue" class="custom-select" wire:model="paginateValue" wire:loading.attr="disabled">
                    <option value="">-- Select Display --</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>
    </div>

    {{ $slot }}
</div>