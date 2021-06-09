<div class="px-3 px-sm-4">
    <x-table title="Prescriptions" placeholder="ID, medication, note">
        <x-slot name="button">
        </x-slot>

        <x-slot name="filter">
        </x-slot>

        @include('partials.alerts')

        <div name="slot">
            <table class="table table-hover table-bordered table-light">
                <thead>
                    <tr>
                        <th class="text-left" scope="col">ID</th>
                        <th class="text-left" scope="col">Medication</th>
                        <th class="text-left" scope="col">Note</th>
                        <th class="text-left" scope="col">Doctor ID</th>
                        <th class="text-left" scope="col">Doctor Name</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($prescriptions as $prescription)
                        <tr>
                            <td class="text-left" scope="row">{{ $prescription->id }}</td>
                            <td class="text-left">{{ $prescription->medication }}</td>
                            <td class="text-left">{{ $prescription->note }}</td>
                            <td class="text-left">{{ $prescription->doctor->id ?? 'N/A' }}</td>
                            <td class="text-left">{{ $prescription->doctor->user->name ?? 'N/A' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td scope="row" colspan="9" class="text-center">No prescriptions found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            
            <div>
                {{ $prescriptions->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </x-table>
</div>