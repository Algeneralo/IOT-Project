@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">My Devices</h1>
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
            <div class="col-md-6 col-xl-3">
                <a id="b1" class="block block-rounded block-link-shadow bg-success" href="/device" data-toggle="tooltip" data-placement="top" title="Cooling!">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fa fa-2x fa-arrow-alt-circle-down text-white-75"></i>
                        </div>
                        <div class="ml-3 text-right">
                            <p id="t1" class="text-white font-size-h3 font-w300 mb-0">--°</p>
                            <p id="s1" class="text-white-75 mb-0">default 1 / --°</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a id="b2" class="block block-rounded block-link-shadow bg-success" href="/device" data-toggle="tooltip" data-placement="top" title="Target Temp!">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fa fa-2x fa-check-circle text-white-75"></i>
                        </div>
                        <div class="ml-3 text-right">
                            <p id="t2" class="text-white font-size-h3 font-w300 mb-0">--°</p>
                            <p id="s2" class="text-white-75 mb-0">default 2 / --°</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow bg-danger" href="/device" data-toggle="tooltip" data-placement="top" title="Heating!">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fa fa-2x fa-arrow-alt-circle-up text-white-75"></i>
                        </div>
                        <div class="ml-3 text-right">
                            <p id="t3" class="text-white font-size-h3 font-w300 mb-0">--°</p>
                            <p id="s3" class="text-white-75 mb-0">default 3 / --°</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow bg-primary" href="/device" data-toggle="tooltip" data-placement="top" title="Cooling!">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fa fa-2x fa-arrow-alt-circle-down text-white-75"></i>
                        </div>
                        <div class="ml-3 text-right">
                            <p id="t4" class="text-white font-size-h3 font-w300 mb-0">--°</p>
                            <p id="s4" class="text-white-75 mb-0">default 4 / --°</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow bg-primary" href="/device" data-toggle="tooltip" data-placement="top" title="Cooling!">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fa fa-2x fa-arrow-alt-circle-down text-white-75"></i>
                        </div>
                        <div class="ml-3 text-right">
                            <p id="t5" class="text-white font-size-h3 font-w300 mb-0">--°</p>
                            <p id="s5" class="text-white-75 mb-0">default 5 / --°</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow bg-success" href="/device" data-toggle="tooltip" data-placement="top" title="Target Temp!">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>
                            <i class="fa fa-2x fa-check-circle text-white-75"></i>
                        </div>
                        <div class="ml-3 text-right">
                            <p id="t6" class="text-white font-size-h3 font-w300 mb-0">--°</p>
                            <p id="s6" class="text-white-75 mb-0">default 6 / --°</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-pop" href="/configurator" data-toggle="tooltip" data-placement="top" title="Add New Device..">
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

        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title">Some more stuff here later</h3>
            </div>
            <div class="block-content">
                <p>
                    Added 6 fermenters in total, #1 is real IOT device, other x5 are pulled from mtqq broker but not live content from real IOT device to test web connection!
                </p>
                <!-- Large Block Modal -->
                <div class="modal" id="modal-block-large" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="block block-themed block-transparent mb-0">
                                <div class="block-header bg-primary-dark">
                                    <h3 class="block-title">Edit Device</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-fw fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <p>Potenti elit lectus augue eget iaculis vitae etiam.</p>
                                    <div class="form-group">
                                        <label for="example-text-input">Friendly Name</label>
                                        <input type="text" class="form-control form-control-alt" id="example-text-input" name="example-text-input" placeholder="Text Input">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input">Device ID</label>
                                        <input type="text" class="form-control form-control-alt" id="example-text-input" name="example-text-input" placeholder="Text Input">
                                    </div>
                                    <div class="form-group">
                                        <label class="d-block">Inline Radios</label>
                                        <div class="custom-control custom-radio custom-control-inline custom-control-primary">
                                            <input type="radio" class="custom-control-input" id="example-radio-custom-inline1" name="example-radio-custom-inline" checked>
                                            <label class="custom-control-label" for="example-radio-custom-inline1">°F</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline custom-control-primary">
                                            <input type="radio" class="custom-control-input" id="example-radio-custom-inline2" name="example-radio-custom-inline">
                                            <label class="custom-control-label" for="example-radio-custom-inline2">°C</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input">Calibration</label>
                                        <input type="text" class="form-control form-control-alt" id="example-text-input" name="example-text-input" placeholder="Text Input">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-text-input">Hysteresis</label>
                                        <input type="text" class="form-control form-control-alt col-3" id="example-text-input" name="example-text-input" placeholder="Text Input">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email-input">Email</label>
                                        <input type="email" class="form-control" id="example-email-input" name="example-email-input" placeholder="Emai Input">
                                    </div>
                                </div>
                                <div class="block-content block-content-full text-right bg-light">
                                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Large Block Modal -->

                <!-- Source Paho MQTT Client-->
                <script src="{{ URL::asset('js/paho-mqtt.js') }}"></script>

                <!-- Utility Javascript -->
                <script src="{{ URL::asset('js/home_utility.js') }}"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
                </script>
                <script>
                    connect();
                </script>

            </div>
        </div>
        <!-- END Your Block -->
    </div>
    <!-- END Page Content -->
@endsection
