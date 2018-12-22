@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Dashboard</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- Your Block -->
        <div class="row">
            @foreach($devices as $device)
                <div class="col-md-6 col-xl-3">
                    <a class="block block-rounded block-link-shadow bg-primary" href="{{route('devices.show',$device->id)}}">
                        <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                            <div>
                                <i class="fa fa-2x fa-arrow-alt-circle-down text-white-75"></i>
                            </div>
                            <div class="ml-3 text-right">
                                <p class="text-white font-size-h3 font-w300 mb-0">
                                    {{$device->name}}
                                </p>
                                <p class="text-white-75 mb-0">
                                    {{$device->mac_address}}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-pop js-tooltip-enabled" href="{{route('devices.create')}}"
                   data-toggle="tooltip" data-placement="top" title="" data-original-title="Add New Device..">
                    <div class="block-content block-content-full d-flex align-items-center">
                        <div>
                            <i class="fa fa-2x fa-plus-circle text-secondary"></i>
                            <p class="text-secondary mb-0">
                                Add New Device...
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Hover Table -->
        <!-- END Hover Table -->

        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title">Welcome to your App</h3>
            </div>
            <div class="block-content">
                <p>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                You are logged in!
                </p>
                <!-- Large Block Modal -->
                <div class="modal" id="modal-block-large" tabindex="-1" role="dialog"
                     aria-labelledby="modal-block-large" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="block block-themed block-transparent mb-0">
                                <div class="block-header bg-primary-dark">
                                    <h3 class="block-title">Edit Device</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-dismiss="modal"
                                                aria-label="Close">
                                            <i class="fa fa-fw fa-times"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="block-content">
                                    <p>Potenti elit lectus augue eget iaculis vitae etiam.</p>
                                    <div class="form-group">
                                        <label for="example-text-input">Friendly Name</label>
                                        <input type="text" class="form-control form-control-alt" id="example-text-input"
                                               name="example-text-input" placeholder="Text Input">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input">Device ID</label>
                                        <input type="text" class="form-control form-control-alt" id="example-text-input"
                                               name="example-text-input" placeholder="Text Input">
                                    </div>
                                    <div class="form-group">
                                        <label class="d-block">Inline Radios</label>
                                        <div class="custom-control custom-radio custom-control-inline custom-control-primary">
                                            <input type="radio" class="custom-control-input"
                                                   id="example-radio-custom-inline1" name="example-radio-custom-inline"
                                                   checked>
                                            <label class="custom-control-label"
                                                   for="example-radio-custom-inline1">°F</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline custom-control-primary">
                                            <input type="radio" class="custom-control-input"
                                                   id="example-radio-custom-inline2" name="example-radio-custom-inline">
                                            <label class="custom-control-label"
                                                   for="example-radio-custom-inline2">°C</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input">Calibration</label>
                                        <input type="text" class="form-control form-control-alt" id="example-text-input"
                                               name="example-text-input" placeholder="Text Input">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input">Hysteresis</label>
                                        <input type="text" class="form-control form-control-alt col-3"
                                               id="example-text-input" name="example-text-input"
                                               placeholder="Text Input">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email-input">Email</label>
                                        <input type="email" class="form-control" id="example-email-input"
                                               name="example-email-input" placeholder="Emai Input">
                                    </div>
                                </div>
                                <div class="block-content block-content-full text-right bg-light">
                                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel
                                    </button>
                                    <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Large Block Modal -->
            </div>
        </div>
        <!-- END Your Block -->
    </div>
    <!-- END Page Content -->
@endsection
