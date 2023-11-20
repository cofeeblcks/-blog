<div class="row">
    <div class="col-md-12 mb-5">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <!-- Incluimos campo de texto para busqueda por titulo -->
                <label>Search by name</label>
                <input class="form-control w-100" wire:model.lazy="search" wire:keydown.enter="search" id="search" type="search" placeholder="Search posts by title...">
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row align-self-center">
        @foreach($users as $user)
            <div class="col-md-6 mb-5">
                <div class="card">
                    <div class="card-header text-center color-white text-bold fs-4 {{ $user->state == 0 ? 'bg-red' : 'bg-green' }}">
                        {{ $user->first_name }} {{ $user->last_name }}
                    </div>
                    <div class="card-body">
                        <p class="card-text text-start mb-0">Document: {{ $user->document }}</p>
                        <p class="card-text text-start mb-0">Email: {{ $user->email }}</p>
                        <p class="card-text text-start mb-0">Birthdate: {{ $user->birthdate }}, {{ $user->age }} years old</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <p class="text-end text-muted fst-italic mb-0">Date register {{ $user->created_at }}</p>
                        @if($user->state == 0 )
                            <button type="buttom" class="btn color-white cursor-pointer bg-green" wire:click="changeState({{ $user->id }}, 1)">Activate user</button>
                        @else
                            @if( Auth::user()->id != $user->id )
                                <button type="buttom" class="btn color-white cursor-pointer bg-red" wire:click="changeState({{ $user->id }}, 0)">Inactivate user</button>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>