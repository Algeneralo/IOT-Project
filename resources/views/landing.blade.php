@extends('layouts.simple')

@section('content')
    <!-- Hero -->
    <div class="bg-image" style="background-image: url('{{ asset('media/photos/photo15@2x.jpg') }}');">
        <div class="hero bg-white overflow-hidden">
            <div class="hero-inner">
                <div class="content content-full text-center">
                    <h1 class="display-4 font-w700 mb-2">
                        Brew<span class="text-primary">Dash</span> <span class="font-w300">+ SsBrewtech</span>
                    </h1>
                    <h2 class="h3 font-w300 text-muted mb-5 invisible" data-toggle="appear" data-timeout="150">
                        Woowoo! Brew something amazing!
                    </h2>
                    <span class="m-2 d-inline-block invisible" data-toggle="appear" data-timeout="300">
                        <a class="btn btn-hero-success" href="/home">
                            <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Look Here Enter Dashboard
                        </a>
                    </span>
                    <p>
                        <a class="btn btn-hero-success" href="/register">
                            <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Register </a>
                        <a class="btn btn-hero-success" href="/login">
                            <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Login </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->
@endsection
