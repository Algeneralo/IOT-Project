@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Manage Devices</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Devices</li>
                        <li class="breadcrumb-item active" aria-current="page">Manage</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- Your Block -->
        <!-- Hover Table -->
        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title">Devices</h3>
                <div class="block-options">
                    <a href="{{route('devices.create')}}" class="btn btn-success">
                        <i class="fa fa-plus"></i> Add New
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
            </div>
            <div class="block-content">
                @if(session('success'))
                    <div class="alert alert-success">
                        <p>{{session('success')}}</p>
                    </div>
                @elseif(session('failed'))
                    <div class="alert alert-danger">
                        <p>{{session('failed')}}</p>
                    </div>
                @endif
                <table class="table table-hover table-vcenter">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">#</th>
                        <th>Name</th>
                        <th class="text-center" style="width: 125px;">Temp</th>
                        <th class="text-center" style="width: 100px;">Set</th>
                        <th class="text-center" style="width: 75px;">Details</th>
                        <th class="d-none d-sm-table-cell" style="width: 75px;">Status</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($devices as $device)
                        <tr>
                            <th class="text-center" scope="row">{{$loop->iteration}}</th>
                            <td class="font-w600">
                                <a href="">{{$device->name}}</a>
                            </td>
                            <td class="font-w600 text-center">
                                <a href=""><i class="fa fa-arrow-alt-circle-up text-warning"></i> 28°F</a>
                            </td>
                            <td class="font-w600 text-center">
                                <a href="">30°F</a>
                            </td>
                            <td class="font-w600 text-center">
                                <a href="/devices/{{$device->id}}">More...</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-success">Online</span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                            data-target="#modal-block-large" title="Edit">
                                        <i class="fa fa-pencil-alt"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip"
                                            title="Delete">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Hover Table -->
        <!-- Large Block Modal -->
        <div class="modal" id="modal-block-large" tabindex="-1" role="dialog" aria-labelledby="modal-block-large"
             aria-hidden="true">
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
                                    <input type="radio" class="custom-control-input" id="example-radio-custom-inline1"
                                           name="example-radio-custom-inline" checked>
                                    <label class="custom-control-label" for="example-radio-custom-inline1">°F</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline custom-control-primary">
                                    <input type="radio" class="custom-control-input" id="example-radio-custom-inline2"
                                           name="example-radio-custom-inline">
                                    <label class="custom-control-label" for="example-radio-custom-inline2">°C</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-text-input">Calibration</label>
                                <input type="text" class="form-control form-control-alt" id="example-text-input"
                                       name="example-text-input" placeholder="Text Input">
                            </div>
                            <div class="form-group">
                                <label for="example-text-input">Hysteresis</label>
                                <input type="text" class="form-control form-control-alt col-3" id="example-text-input"
                                       name="example-text-input" placeholder="Text Input">
                            </div>
                            <div class="form-group">
                                <label for="example-email-input">Email</label>
                                <input type="email" class="form-control" id="example-email-input"
                                       name="example-email-input" placeholder="Emai Input">
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


        <!-- END Your Block -->
    </div>
    <!-- END Page Content -->
@endsection

