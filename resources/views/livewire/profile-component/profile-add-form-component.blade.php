<div class="">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Personal Details</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            This week
        </button>
        </div>
    </div>
    <form method="post" wire:submit.prevent="create">
        <div class="form-row">
            <div class="form-group col">
                <label for="birthdate">Birthdate</label>
                <input type="date" class="form-control @error('profile.birthdate') is-invalid @enderror" id="birthdate" name="birthdate" required autofocus wire:model.defer="profile.birthdate" wire:loading.attr="disabled">
                @error('profile.birthdate')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group col">
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
            <div class="form-group col">
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
            <div class="form-group col">
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