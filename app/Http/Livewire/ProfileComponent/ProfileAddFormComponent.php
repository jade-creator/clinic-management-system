<?php

namespace App\Http\Livewire\ProfileComponent;

use App\Models\Patient;
use App\Models\Profile;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ProfileAddFormComponent extends Component
{
    public Profile $profile;
    public $user_id;

    public function mount()
    {
        $this->user_id = Auth::user()->id;
        $this->profile = new Profile();
    }

    public function render() { return 
        view('livewire.profile-component.profile-add-form-component');
    }

    public function rules()
    {
        return [
            'profile.birthdate' => [ 'date', 'required'],
            'profile.sex' => [ 'string', 'required', 'max:1', 'in:m,f'],
            'profile.phone_number' => ['string', 'required'],
            'profile.address' => [ 'string', 'required', 'max:255']
        ];
    }

    public function create(){
        $this->validate();

        Patient::create([ 
            'user_id' => $this->user_id,
        ]);
        $this->profile->user_id = $this->user_id;
        $this->profile->save();

        return redirect()->route('profile.view', ['role' => Auth::user()->role->name, 'user_id' => Auth::user()->id]);
    }
}
