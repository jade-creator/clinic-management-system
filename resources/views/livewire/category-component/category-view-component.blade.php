<div class="px-3 px-sm-4">
    <x-table title="Categories" placeholder="ID, Name, Description">
        <x-slot name="button">
            <a href="{{ route('categories.add') }}">
                <button class="btn btn-primary">Add Category</button>
            </a>
        </x-slot>

        <x-slot name="filter">
        </x-slot>

        @include('partials.alerts')

        <div name="slot">
            <table class="table table-hover table-bordered table-light">
                <thead>
                    <tr>
                        <th class="text-left" scope="col">Category ID</th>
                        <th class="text-left" scope="col">Category Name</th>
                        <th class="text-left" scope="col">Description</th>
                        <th class="text-left" scope="col">Option</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td class="text-left" scope="row">{{ $category->id }}</td>
                            <td class="text-left">{{ $category->name }}</td>
                            <td class="text-left">{{ $category->description }}</td>
                            <td class="text-left">
                                <a class="text-decoration-none" href="{{ route('categories.edit', $category) }}">
                                    <button class="btn text-success rounded-circle p-1 mx-1" data-toggle="tooltip" data-placement="top" title="Details">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                            <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line>
                                        </svg>
                                    </button>
                                </a>
                                @if (!$category->treatments->count())
                                    <button class="btn text-danger rounded-circle p-1 mx-1" data-toggle="tooltip" data-placement="top" title="Delete" wire:click="destroy({{ $category }})">
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
                            <td scope="row" colspan="4" class="text-center">No categories found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            
            <div>
                {{ $categories->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </x-table>
</div>