<div class="px-3 px-sm-4">
    <x-table title="Documents" placeholder="ID, name, description, document">
        <x-slot name="button">
            <a href="{{ route('documents.add') }}">
                <button class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg> 
                    <span class="d-none d-md-inline-block">Add Document</span>  
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
                                <a class="text-decoration-none" href="{{ route('documents.edit', $document) }}">
                                    <button class="btn text-success rounded-circle p-1 mx-1" data-toggle="tooltip" data-placement="top" title="Details">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                            <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line>
                                        </svg>
                                    </button>
                                </a>
                                <button class="btn text-primary rounded-circle p-1 mx-1" data-toggle="tooltip" data-placement="top" title="Download Attachment" wire:click="downloadFileConfirm({{ $document->patient_id }}, '{{ $document->name }}')">
                                    <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                        <path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path>
                                    </svg>
                                </button>
                                <button class="btn text-danger rounded-circle p-1 mx-1" data-toggle="tooltip" data-placement="top" title="Delete" wire:click="destroy({{ $document }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="4" y1="7" x2="20" y2="7"></line>
                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td scope="row" colspan="6" class="text-center">No documents found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            
            <div>
                {{ $documents->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </x-table>
</div>