@extends('layouts.auth')

@section('content')
            <main id="main-container">

                <!-- Page Content -->
                <div class="bg-image" style="background-image: url({{ asset('media/photos/valve1.jpg')}});">
                    <div class="row no-gutters bg-primary-op">
                        <!-- Main Section -->
                        <div class="hero-static col-md-6 d-flex align-items-center bg-white">
                            <div class="p-3 w-100">
                                <!-- Header -->
                                <div class="mb-3 text-center">
                                    <a class="link-fx font-w700 font-size-h1" href="/">
                                        <span class="text-dark">Brew</span><span class="text-primary">Dash</span> <span class="text-dark font-w300">+ SsBrewtech</span>
                                    </a>
                                    <p class="text-uppercase font-w700 font-size-sm text-muted">Login</p>
                                </div>
                                <!-- END Header -->

                                <!-- Sign In Form -->
                                <div class="row no-gutters justify-content-center">
                                    <div class="col-sm-8 col-xl-6">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf
                                            <div class="py-3">
                                                <div class="form-group">
                                <input id="email" type="email" class="form-control form-control-lg form-control-alt{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="E-Mail Address" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                                                
                                                </div>
                                                <div class="form-group">
                                <input id="password" type="password" class="form-control form-control-lg form-control-alt{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-block btn-hero-lg btn-hero-primary">
                                                    <i class="fa fa-fw fa-sign-in-alt mr-1"></i> {{ __('Login') }}
                                                </button>
                                                <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                                                    <a class="btn btn-sm btn-light d-block d-lg-inline-block mb-1" href="/password/reset">
                                                        <i class="fa fa-exclamation-triangle text-muted mr-1"></i> {{ __('Forgot Your Password?') }}
                                                    </a>
                                                    <a class="btn btn-sm btn-light d-block d-lg-inline-block mb-1" href="/register">
                                                        <i class="fa fa-plus text-muted mr-1"></i> New Account
                                                    </a>
                                                </p>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- END Sign In Form -->
                            </div>
                        </div>
                        <!-- END Main Section -->

                        <!-- Meta Info Section -->
                        <div class="hero-static col-md-6 d-none d-md-flex align-items-md-center justify-content-md-center text-md-center">
                            <div class="p-3">
                                <p class="display-4 font-w700 text-white mb-3">
                                    Woowoo! Brew something amazing!
                                </p>
                                <p class="font-size-lg font-w600 text-white-75 mb-0">
                                    Copyright &copy; <span class="js-year-copy">2018</span>
                                </p>
                            </div>
                        </div>
                        <!-- END Meta Info Section -->
                    </div>
                </div>
                <!-- END Page Content -->

            </main>

@endsection
