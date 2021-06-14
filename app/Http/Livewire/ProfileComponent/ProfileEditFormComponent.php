<?php

namespace App\Http\Livewire\ProfileComponent;

use App\Models\Patient;
use App\Models\Role;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileEditFormComponent extends Component
{
    use AuthorizesRequests;
    
    public Profile $profile;
    public User $user;
    public $subEntity;
    public $user_id;
    public $role;
    public $status;
    public $note;

    public function mount()
    {
        Role::where('name', $this->role)->firstOrFail();

        $this->user = User::with('profile')->findOrFail($this->user_id);
        $this->profile = $this->user->profile;

        if($this->role == 'patient'){
            $this->subEntity = Auth::user()->patient;
            $this->status = $this->subEntity->isActive ? 'Active' : 'Inactive';
            $this->note = $this->subEntity->note;
        }
    }

    public function render() { return 
        view('livewire.profile-component.profile-edit-form-component');
    }

    public function rules()
    {
        return [
            'user.name' => [ 'string', 'required', 'max:255'],
            'user.email' => 'required|string|email|max:255|unique:users,email,' . $this->user_id,
            'profile.birthdate' => [ 'date', 'required'],
            'profile.sex' => [ 'string', 'required', 'max:1', 'in:m,f'],
            'profile.phone_number' => ['string', 'required'],
            'profile.address' => [ 'string', 'required', 'max:255']
        ];
    }

    public function update(){
        $this->authorize('update', $this->profile);
        $this->validate();
        $this->user->update();
        $this->profile->update();

        if($this->role == 'patient'){
            Patient::where('user_id', $this->user_id)->update([
                'note' => $this->note
            ]);
        }
    }
}
