<x-table title="Documents" placeholder="Sample">
    <x-slot name="button">
        <a href="{{ route('documents.add') }}">
            <button class="btn btn-primary">Add Document</button>
        </a>
    </x-slot>

    <x-slot name="filter">
    </x-slot>

    <div name="slot">
        <table class="table table-hover table-bordered table-light">
            <thead>
                <tr>
                    <th class="text-left" scope="col">Date</th>
                    <th class="text-center" scope="col">Patient ID</th>
                    <th class="text-left" scope="col">Patient Name</th>
                    <th class="text-left" scope="col">Description</th>
                    <th class="text-left" scope="col">Document</th>
                    <th class="text-center" scope="col">Option</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($documents as $document)
                    <tr>
                        <td class="text-left" scope="row">{{ $document->date }}</td>
                        <td class="text-center">{{ $document->patient_id }}</td>
                        <td class="text-left">{{ $document->patient->user->name }}</td>
                        <td class="text-left">{{ $document->description }}</td>
                        <td class="text-left">{{ $document->name }}</td>
                        <td class="text-center">
                            <button class="btn text-primary rounded-circle p-1 mx-1" data-toggle="tooltip" data-placement="top" title="Download Attachment" wire:click="download({{ $document->patient_id }}, '{{ $document->name }}')">
                                <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                    <path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path>
                                </svg>
                            </button>
                            <button class="btn text-info rounded-circle p-1 mx-1" data-toggle="tooltip" data-placement="top" title="View">
                                <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                            <a href="{{ route('documents.edit', $document) }}">
                                <button class="btn text-success rounded-circle p-1 mx-1" data-toggle="tooltip" data-placement="top" title="Edit">
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
                        <td scope="row" colspan="6">No documents found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        <div>
             {{ $documents->links('pagination::bootstrap-4') }}
        </div>
    </div>
</x-table>
