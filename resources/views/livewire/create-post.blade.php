<div>
    @if( session('warning') )
        <div class="alert alert-warning">{{ session('warning') }}</div>
    @endif

    @if( session('message') )
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="register">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" wire:model="title" minlength="10" maxlength="100">
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" wire:model="description" class="form-control" cols="30" rows="10" minlength="10"></textarea>
            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="d-flex justify-content-end mt-5">
            <button type="submit" class="btn btn-block btn-dark">Create entry</button>
        </div>
    </form>
</div>