@extends('layout.master')

@section('content')
    <div class="container list-post" style="height: calc(100vh - 50px);">
        <div class="authincation h-100">
            <div class="container h-100">
                <div class="row justify-content-center h-100 align-items-center">
                    <div class="col-md-6">
                        <div class="authincation-content">
                            <div class="row no-gutters">
                                <div class="col-xl-12">
                                    <div class="auth-form">
                                        <div class="text-center mb-3">
                                            <a href="/"><img src="images/logo.png" alt=""></a>
                                        </div>
                                        <h4 class="text-center mb-4">Sign in your account</h4>
                                        <livewire:login/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection