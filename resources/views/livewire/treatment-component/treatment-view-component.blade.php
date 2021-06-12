<x-table title="Treatments" placeholder="Sample">
    <x-slot name="button">
        <a href="{{ route('treatments.add') }}">
            <button class="btn btn-primary">Add Treatments</button>
        </a>
    </x-slot>

    <x-slot name="filter">
    </x-slot>

    <div name="slot">
        <table class="table table-hover table-bordered table-light">
            <thead>
                <tr>
                    <th class="text-left" scope="col">ID</th>
                    <th class="text-left" scope="col">Name</th>
                    <th class="text-left" scope="col">Description</th>
                    <th class="text-center" scope="col">Purchase Price</th>
                    <th class="text-center" scope="col">Selling Price</th>
                    <th class="text-center" scope="col">Category ID</th>
                    <th class="text-left" scope="col">Category Name</th>
                    <th class="text-center" scope="col">Option</th>
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
                        <td class="text-center">
                            <a href="{{ route('treatments.edit', $treatment) }}">
                                <button class="btn text-success rounded-circle p-1 mx-1" data-toggle="tooltip" data-placement="top" title="Details">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                        <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line>
                                     </svg>
                                </button>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No treatments found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        <div>
             {{ $treatments->links('pagination::bootstrap-4') }}
        </div>
    </div>
</x-table>