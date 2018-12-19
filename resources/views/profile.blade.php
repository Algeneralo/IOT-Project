@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Profile</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        {{--<li class="breadcrumb-item">Device Setup</li>--}}
                        {{--<li class="breadcrumb-item active" aria-current="page">Add Device</li>--}}
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->
    <!-- Page Content -->
    <div class="content">
        <!-- Your Block -->
        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title">Your Data</h3>
            </div>
            @if(session()->has('success'))
                <div class="alert alert-info" role="alert">
                    <p class="mb-0">{{session()->get('success')}} </p>
                </div>
            @endif
            <div class="block-content">
                <form method="post" action="/profile">
                    @csrf
                    <label>Name</label>
                    <input name="name" type="text" value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                    <label>Email</label>
                    <input type="text" disabled value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                    <button type="submit">Edit Data</button>
                </form>
            </div>
        </div>
        <!-- END Your Block -->
    </div>
    <div id="app">
        <example-component></example-component>
    </div>
    <!-- <script type="text/javascript" src="js/components/welcome.vue"></script> -->
    <!-- END Page Content -->
@endsection
