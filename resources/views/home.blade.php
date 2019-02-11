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
                    <a id="{{$device->mac_address}}"
                       class="block block-rounded block-link-shadow bg-secondary js-tooltip-enabled"
                       href="{{route('devices.show',$device->id)}}" data-toggle="tooltip" data-placement="top"
                       data-original-title="Stopped!">
                        <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                            <div>
                                <i class="fa fa-2x fa-times-circle text-white-75 oo"></i>
                            </div>
                            <div class="ml-3 text-right">
                                <p class="text-white font-size-h3 font-w300 mb-0 t">--</p>
                                <p class="text-white-75 mb-0 s">{{$device->name}} / <span> --°</span></p>
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

        <!-- END Your Block -->
    </div>
    <!-- END Page Content -->

@endsection
@section("js")
    <!-- Source Paho MQTT Client-->
    <script src="{{ URL::asset('js/paho-mqtt.js') }}"></script>
    <!-- Utility Javascript -->
    <script src="{{ URL::asset('js/home_utility.js') }}"></script>
    <script>
        connect("{{$mqtt->ip}}", "{{$mqtt->port}}", "{{$mqtt->user}}", "{{$mqtt->password}}", "{{\Illuminate\Support\Facades\Auth::user()->iot_id}}");
    </script>
@endsection
