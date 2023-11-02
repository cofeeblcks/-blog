@extends('layout.master')

@section('content')
    <section class="home-container">
        <div class="container-item">
            <div class="container">
                <div class="row container-text align-items-center justify-content-center">
                    <div class="col-md-8 text-center col-sm-12 ">
                        <h1>Aca podras encontrar informacion acerca de lenguages de programacion</h1>
                        <a href="{{ route('posts') }}" class="btn btn-home">Ver posts</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection