@extends('layouts.backend')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Configurator</h1>
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
    <!-- Your Block -->
    <div class="block block-rounded block-bordered">
        <div class="block-header block-header-default">
            <h3 class="block-title">SsBrewFi Device Setup</h3>
        </div>
        <div class="block-content">
  <img class="align-center" src="{{ asset('media/various/homie-logo.png')}}" alt="Homie">
              <p>Going to add the Homie ESP8266 configurator here...</p>
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
