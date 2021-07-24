<div class="px-3 px-sm-4">
    <x-table title="Treatments" placeholder="ID, name">
        <x-slot name="button">
            <a href="{{ route('treatments.add') }}">
                <button class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg> 
                    <span class="d-none d-md-inline-block">Add Treatment</span>
                </button>
            </a>
        </x-slot>

        <x-slot name="filter">
        </x-slot>

        @include('partials.alerts')

        <div name="slot" class="table-responsive">
            <table class="table table-hover table-striped table-light">
                <thead>
                    <tr>
                        <th class="text-left" scope="col">ID</th>
                        <th class="text-left" scope="col">Name</th>
                        <th class="text-left" scope="col">Description</th>
                        <th class="text-center" scope="col">Purchase Price</th>
                        <th class="text-center" scope="col">Selling Price</th>
                        <th class="text-center" scope="col">Category ID</th>
                        <th class="text-left" scope="col">Category Name</th>
                        <th class="text-left" scope="col">Option</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($treatments as $treatment)
                        <tr>
                            <td class="text-left" scope="row">{{ $treatment->id }}</td>
                            <td class="text-left">{{ $treatment->name }}</td>
                            <td class="text-left">{{ $treatment->description }}</td>
                            <td class="text-center">{{ $treatment->purchase_price }}</td>
                            <td class="text-center">{{ $treatment->selling_price }}</td>
                            <td class="text-center">{{ $treatment->category->id }}</td>
                            <td class="text-left">{{ $treatment->category->name }}</td>
                            <td class="text-left">
                                <a class="text-decoration-none" href="{{ route('treatments.edit', $treatment) }}">
                                    <button class="btn text-success rounded-circle p-1 mx-1" data-toggle="tooltip" data-placement="top" title="Details">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                            <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line>
                                        </svg>
                                    </button>
                                </a>
                                @if (!$treatment->stock)
                                    <button class="btn text-danger rounded-circle p-1 mx-1" data-toggle="tooltip" data-placement="top" title="Delete" wire:click="destroy({{ $treatment }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <line x1="4" y1="7" x2="20" y2="7"></line>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                        </svg>
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td scope="row" colspan="8" class="text-center">No treatments found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            
            <div>
                {{ $treatments->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </x-table>
</div>