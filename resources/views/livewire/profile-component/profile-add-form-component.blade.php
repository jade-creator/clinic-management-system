<div class="px-3 px-sm-4">
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Personal Details</h1>
    </div>

    @include('partials.alerts')

    <form method="post" wire:submit.prevent="create">
        <div class="form-row">
            <img class="form-control w-25 h-25 mb-3" src="https://www.vippng.com/png/detail/416-4161690_empty-profile-picture-blank-avatar-image-circle.png" alt="avatar"/>
        </div>
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
                  <option value="">Select a gender</option>
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
                <label for="homeAddress">Address</label>
                <input type="text" class="form-control @error('profile.address') is-invalid @enderror" id="address" name="address" required autofocus wire:model.defer="profile.address" wire:loading.attr="disabled">
                @error('profile.address')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group text-right">
            <button class="btn px-5 btn-primary" type="submit" wire:loading.attr="disabled">Save</button>
        </div>
    </form>
</div>