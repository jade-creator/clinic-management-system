<div>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Patient ID</th>
                <th>Patient Name</th>
                <th>Description</th>
                <th>Document</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($documents as $document)
                <tr>
                    <td>{{ $document->date }}</td>
                    <td>{{ $document->patient_id }}</td>
                    <td>{{ $document->patient->user->name }}</td>
                    <td>{{ $document->description }}</td>
                    <td>{{ $document->name }}</td>
                    <td>
                        <button class="btn btn-primary" wire:click="download({{ $document->patient_id }}, '{{ $document->name }}')">Download</button>
                        <a href="{{ route('documents.edit', $document) }}">
                            <button class="btn btn-secondary">Edit</button>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>No appointments</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
