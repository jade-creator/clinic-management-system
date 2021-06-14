<div class="px-3 px-sm-4">
    <x-table title="Users" placeholder="Name, email, phone, address">
        <x-slot name="button">
        </x-slot>

        <x-slot name="filter">
            <select name="roles" id="roles" class="custom-select mx-1" wire:model="role">
                <option value="">-- select role --</option>
                @forelse ($this->roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @empty
                    <option value="">N/A</option>   
                @endforelse
            </select>
        </x-slot>

        <div name="slot">
            <table class="table table-hover table-bordered table-light">
                <thead>
                    <tr>
                        <th class="text-left" scope="col">Role</th>
                        <th class="text-left" scope="col">Name</th>
                        <th class="text-left" scope="col">Email</th>
                        <th class="text-left" scope="col">Phone</th>
                        <th class="text-left" scope="col">Address</th>
                        <th class="text-left" scope="col">Birthdate</th>
                        <th class="text-left" scope="col">Sex</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td class="text-left" scope="row">{{ ucfirst($user->role->name) ?? 'N/A' }}</td>
                            <td class="text-left">{{ $user->name ?? 'N/A' }}</td>
                            <td class="text-left">{{ $user->email ?? 'N/A' }}</td>
                            <td class="text-left">{{ $user->profile->phone_number ?? 'N/A' }}</td>
                            <td class="text-left">{{ $user->profile->address ?? 'N/A' }}</td>
                            <td class="text-left">{{ $user->profile->birthdate ?? 'N/A' }}</td>
                            <td class="text-left">{{ $user->profile->sex ?? 'N/A' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td scope="row" colspan="5" class="text-center">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            
            <div>
                {{ $users->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </x-table>
</div>