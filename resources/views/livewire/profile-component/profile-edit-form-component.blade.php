<div class="px-3 px-sm-4">
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Profile</h1>
    </div>
    <form method="post" wire:submit.prevent="update">
        <div class="form-row">
            <img class="form-control w-25 h-25 mb-3" src="https://www.vippng.com/png/detail/416-4161690_empty-profile-picture-blank-avatar-image-circle.png" alt="avatar"/>
        </div>
        @if ($role == 'patient')
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('user.name') is-invalid @enderror" id="name" name="name" required autofocus wire:model.defer="user.name">
                @error('user.name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="status">Status</label>
                <input class="form-control" id="status" name="status" type="text" readonly wire:model.defer="status">
            </div>
        </div>
        @else
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('user.name') is-invalid @enderror" id="name" name="name" required autofocus wire:model.defer="user.name">
                @error('user.name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
        @endif

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="birthdate">Birthdate</label>
                <input type="date" class="form-control @error('profile.birthdate') is-invalid @enderror" id="birthdate" name="birthdate" required autofocus wire:model.defer="profile.birthdate" wire:loading.attr="disabled">
                @error('profile.birthdate')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="mobileNumber">Phone Number</label>
                <input type="text" class="form-control @error('profile.phone_number') is-invalid @enderror" id="phone_number" name="phone_number" required autofocus wire:model.defer="profile.phone_number" wire:loading.attr="disabled">
                @error('profile.phone_number')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="sex">Sex</label>
                <select id="sex" name="sex" class="form-control @error('profile.sex') is-invalid @enderror" required autofocus wire:model.defer="profile.sex" wire:loading.attr="disabled">
                  <option value="m">Male</option>
                  <option value="f">Female</option>
                </select>
                @error('profile.sex')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="email">Email address</label>
                <input type="email" class="form-control @error('user.email') is-invalid @enderror" id="email" aria-describedby="emailHelp" required autofocus wire:model.defer="user.email" wire:loading.attr="disabled">
                @error('user.email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="homeAddress">Address</label>
            <input type="text" class="form-control @error('profile.address') is-invalid @enderror" id="address" name="address" required autofocus wire:model.defer="profile.address" wire:loading.attr="disabled">
            @error('profile.address')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        @if ($role == 'patient')
            <div class="form-group">
                <label for="note">Note</label>
                <textarea class="form-control" id="note" name="note" required autofocus wire:model.defer="note" wire:loading.attr="disabled"
                        placeholder="...">
                </textarea>
            </div>
        @endif
        @can('update', $this->profile)
            <div class="form-group text-right">
                <button class="btn px-5 btn-primary" type="submit" wire:loading.attr="disabled">Update</button>
            </div>
        @endcan
    </form>
</div>
