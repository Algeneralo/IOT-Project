@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Device Configurator</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Device Setup</li>
                        <li class="breadcrumb-item active" aria-current="page">Add Device</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">

        <div id="searchingAlert" class="alert alert-danger d-flex align-items-center" role="alert">
            <div class="flex-00-auto">
                <i class="fa fa-fw fa-spinner fa-spin"></i>
            </div>
            <div class="flex-fill ml-3">
                <p class="mb-0">Searching for devices!</p>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div id="foundAlert" class="alert alert-success d-flex align-items-center" role="alert"
             style="display: none !important;">
            <div class="flex-00-auto">
                <i class="fa fa-fw fa-check"></i>
            </div>
            <div class="flex-fill ml-3">
                <p class="mb-0">Found device!</p>
            </div>
        </div>
        <!-- Your Block -->
        <div id="configDiv" class="block block-rounded block-bordered" style="display: none">
            <div class="block-header block-header-default">
                <h3 class="block-title">Configuration</h3>
            </div>
            <div class="container">
                <p>To add a new device, enter a friendly name, select your local wifi network, enter password and
                    then submit.
                </p>
            </div>
            <div class="col-lg-4">
                <form action="{{route('devices.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="example-text-input">Add a memorable name:</label>
                        <input id="fname" name="fname" type="text" class="form-control form-control-alt"
                               placeholder="Friendly Name">
                    </div>
                    <input type="hidden" id="device_id" name="device_id">
                    <div class="form-group">
                        <label for="example-select">Select Wifi Network:</label>
                        <select id="ssid" name="ssid" class="form-control form-control-alt">
                            <option disabled selected>Please select</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input">Enter WiFi Password:</label>
                        <input id="wifiPassword" name="wifiPassword" type="password"
                               class="form-control form-control-alt"
                               placeholder="">
                    </div>
                    <div class="form-group">

                        <button type="submit" class="btn btn-sm btn-success" data-dismiss="modal">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Your Block -->
    </div>
@endsection
@section('js')
    @include('devices.scripts.device-config')
@endsection
