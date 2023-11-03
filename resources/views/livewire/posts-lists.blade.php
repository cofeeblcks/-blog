<div class="row">
    <div class="col-xs-12">
        <div class="row align-self-center">
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
                        <p class="text-end text-muted fst-italic mb-0">Fecha publicacion {{ $post->created_at }}</p>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>