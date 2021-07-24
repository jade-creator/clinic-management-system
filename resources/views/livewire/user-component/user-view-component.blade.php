<div class="px-3 px-sm-4">
    <x-table title="Users" placeholder="Name, email, phone, address">
        <x-slot name="button">
        </x-slot>

        <x-slot name="filter">
            <div class="col-lg-12 mb-2 mb-lg-0">
                <select name="roles" id="roles" class="custom-select" wire:model="role">
                    <option value="">-- select role --</option>
                    @forelse ($this->roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @empty
                        <option value="">N/A</option>   
                    @endforelse
                </select>
            </div>
        </x-slot>

        <div name="slot" class="table-responsive">
            <table class="table table-hover table-striped table-light">
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
                            <td scope="row" colspan="7" class="text-center">No users found.</td>
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