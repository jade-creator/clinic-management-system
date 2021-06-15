<div class="px-3 px-sm-4">
    <x-table title="Case Histories" placeholder="ID, description, note">
        <x-slot name="button">
        </x-slot>

        <x-slot name="filter">
        </x-slot>

        @include('partials.alerts')

        <div name="slot" class="table-responsive">
            <table class="table table-hover table-bordered table-light">
                <thead>
                    <tr>
                        <th class="text-left" scope="col">ID</th>
                        <th class="text-left" scope="col">Date</th>
                        <th class="text-left" scope="col">Description</th>
                        <th class="text-left" scope="col">Note</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($histories as $history)
                        <tr>
                            <td class="text-left" scope="row">{{ $history->id }}</td>
                            <td class="text-left">{{ $history->date }}</td>
                            <td class="text-left">{{ $history->description }}</td>
                            <td class="text-left">{{ $history->note }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td scope="row" colspan="6" class="text-center">No case histories found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            
            <div>
                {{ $histories->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </x-table>
</div>