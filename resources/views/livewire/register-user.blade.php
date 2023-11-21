<div>
    @if( session('warning') )
        <div class="alert alert-warning">{{ session('warning') }}</div>
    @endif

    @if( session('message') )
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="register">
        <div class="form-group">
            <label for="document">Document</label>
            <input type="text" class="form-control" id="document" name="document" wire:model="document">
            @error('document') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" class="form-control" id="firstName" name="firstName" wire:model="firstName">
            @error('firstName') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="lastName" wire:model="lastName">
            @error('lastName') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" wire:model="email">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="birthDate">BirthDate</label>
            <input type="date" class="form-control" id="birthDate" name="birthDate" wire:model="birthDate">
            @error('birthDate') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" wire:model="password">
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="password">Confirm Password</label>
            <input type="password" class="form-control" id="password" name="password_confirmation" wire:model="password_confirmation" autocomplete="current-password">
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="d-flex justify-content-end mt-5">
            <button type="submit" class="btn btn-block btn-dark">Register user</button>
        </div>
    </form>
</div>