<?php

namespace App\Http\Livewire\UserComponent;

use App\Models\Role;
use App\Models\User;
use App\Traits\WithFilters;
use Livewire\Component;
use Livewire\WithPagination;

class UserViewComponent extends Component
{
    use WithPagination, WithFilters;

    protected $paginationTheme = 'bootstrap';
    public $paginateValue = 10;
    public $role = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'role' => ['except' => ''],
    ];

    protected $updatesQueryString = [
        'search',
        'role',
    ]; 

    public function render() { return 
        view('livewire.user-component.user-view-component', [
            'users' => $this->rows
        ]);
    }

    public function getRowsProperty() { return 
        $this->rowsQuery->paginate($this->paginateValue);
    }

    public function getRowsQueryProperty()
    {
        return User::search($this->search)
                ->with(['role:id,name', 'profile:id,birthdate,sex,phone_number,address,user_id'])
                ->when(!empty($this->search), function($query) {
                    return $query->orWhereHas('profile', function($query) {
                                return $query->where('phone_number', 'LIKE', '%'.$this->search.'%')
                                        ->orWhere('address', 'LIKE', '%'.$this->search.'%');
                            });
                })
                ->when(!empty($this->role), function($query) {
                    return $query->whereHas('role', function($query) {
                                return $query->where('name', 'LIKE', '%'.$this->role.'%');
                            });
                })
                ->latest();
    }

    public function getRolesProperty() { return
        Role::get(['id', 'name']);
    }

    public function updatedPaginateValue() { $this->resetPage(); }

    public function updatedRole() { $this->resetPage(); }
}
