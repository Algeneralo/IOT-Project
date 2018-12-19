@extends('layouts.backend')

@section('css_before')
    <link rel="stylesheet" href="{{ asset('js/plugins/fullcalendar/fullcalendar.min.css') }}">
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/dashmix.core.min.js') }}"></script>
    <script src="{{ asset('js/dashmix.app.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('js/plugins/fullcalendar/fullcalendar.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/be_comp_calendar.min.js') }}"></script>

    <!-- Page JS Helpers (Slick Slider Plugin) -->
    <script>jQuery(function(){ Dashmix.helpers('fullcalendar'); });</script>
@endsection

@section('content')
    <!-- Page Content -->
    <div class="row no-gutters flex-md-10-auto">
        <div class="col-md-4 col-lg-5 col-xl-3">
            <div class="content">
                <!-- Toggle Side Content -->
                <div class="d-md-none push">
                    <!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
                    <button type="button" class="btn btn-block btn-hero-primary" data-toggle="class-toggle" data-target="#side-content" data-class="d-none">
                        Calendar Options
                    </button>
                </div>
                <!-- END Toggle Side Content -->

                <!-- Side Content -->
                <div id="side-content" class="d-none d-md-block push">
                    <!-- Add Event Form -->
                    <form class="js-form-add-event push">
                        <div class="input-group">
                            <input type="text" class="js-add-event form-control border-0" placeholder="Add Brew..">
                            <div class="input-group-append">
                                <span class="input-group-text border-0 bg-white">
                                    <i class="fa fa-fw fa-plus-circle"></i>
                                </span>
                            </div>
                        </div>
                    </form>
                    <!-- END Add Event Form -->

                    <!-- Event List -->
                    <ul class="js-events list list-events">
                        <li class="bg-info-light">BOW 30+30</li>
                        <li class="bg-success-light">GIPA 15+15+15</li>
                        <li class="bg-info-light">BOW 30+30</li>
                        <li class="bg-warning-light">Blond 20</li>
                        <li class="bg-success-light">GIPA 15+15+15</li>
                        <li class="bg-info-light">BOW 30+30</li>
                        <li class="bg-success-light">GIPA 15+15+15</li>
                        <li class="bg-danger-light">RED 15+15</li>
                        <li class="bg-warning-light">Blond 20</li>
                    </ul>
                    <div class="text-center">
                        <em class="font-size-sm text-muted">
                            <i class="fa fa-arrows-alt"></i> Drag and drop to schedule pending brews on the calendar
                        </em>
                    </div>
                    <!-- END Event List -->
                </div>
                <!-- END Side Content -->
            </div>
        </div>
        <div class="col-md-8 col-lg-7 col-xl-9 bg-body-dark">
            <div class="content">
                <div class="block block-fx-pop">
                    <div class="block-content block-content-full">
                        <!-- Calendar Container -->
                        <div class="js-calendar p-xl-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->

@endsection
