<div class="row">
    <div class="col-xs-12 mb-5">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <!-- Incluimos el campo de fecha para busqueda -->
                <label>Search by date publish</label>
                <input class="form-control w-100" type="date" wire:model.lazy="searchDate" id="searchDate">
            </div>
            <div class="col-xs-12 col-md-6">
                <!-- Incluimos campo de texto para busqueda por titulo -->
                <label>Search by title</label>
                <input class="form-control w-100" wire:model="search" wire:keydown.enter="search" id="search" type="search" placeholder="Search posts by title...">
            </div>
        </div>
    </div>
    <div class="col-xs-12" wire:poll="updateListViewPosts">
        <div class="row align-self-center">
            @if (count($posts) > 0)
            @foreach($posts as $post)
            <div class="col-xs-12 mb-5">
                <div class="card">
                    <div class="card-header text-center bg-green color-white text-bold fs-4">
                        {{ $post->title }}
                    </div>
                    <div class="card-body">
                        <p class="card-text text-start mb-0">{{ $post->description }}</p>
                    </div>
                    <div class="card-footer">
                        <p class="text-end text-muted fst-italic mb-0">Date publish {{ $post->created }}</p>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="alert alert-info">No posts data!</div>
            @endif
        </div>
    </div>
</div>