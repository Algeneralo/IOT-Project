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
        <div class="col-md-6 col-xl-3">
            <a class="block block-rounded block-link-shadow bg-primary" href="javascript:void(0)">
                <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                    <div>
                        <i class="fa fa-2x fa-arrow-alt-circle-down text-white-75"></i>
                    </div>
                    <div class="ml-3 text-right">
                        <p class="text-white font-size-h3 font-w300 mb-0">
                            32°
                        </p>
                        <p class="text-white-75 mb-0">
                            FV40-1 / 30°
                        </p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-xl-3">
            <a class="block block-rounded block-link-shadow bg-success" href="javascript:void(0)">
                <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                    <div>
                          <i class="fa fa-2x fa-check-circle text-white-75"></i>
                    </div>
                    <div class="ml-3 text-right">
                        <p class="text-white font-size-h3 font-w300 mb-0">
                            76°
                        </p>
                        <p class="text-white-75 mb-0">
                            FV40-2 / 76°
                        </p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-xl-3">
            <a class="block block-rounded block-link-shadow bg-danger" href="javascript:void(0)">
                <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                  <div>
                        <i class="fa fa-2x fa-arrow-alt-circle-up text-white-75"></i>
                  </div>
                    <div class="ml-3 text-right">
                        <p class="text-white font-size-h3 font-w300 mb-0">
                            15°
                        </p>
                        <p class="text-white-75 mb-0">
                            FV40-3 / 28°
                        </p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-xl-3">
            <a class="block block-rounded block-link-shadow bg-muted" href="javascript:void(0)">
                <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                  <div>
                        <i class="fa fa-2x fa-pause-circle text-white-75"></i>
                  </div>
                    <div class="ml-3 text-right">
                        <p class="text-white font-size-h3 font-w300 mb-0">
                            Empty
                        </p>
                        <p class="text-white-75 mb-0">
                            FV40-4 / Paused
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </div>

          <!-- Hover Table -->
          <div class="block block-rounded block-bordered">
              <div class="block-header block-header-default">
                  <h3 class="block-title">Connected Devices</h3>
                  <div class="block-options">
                      <button type="button" class="btn btn-success">
                          <i class="fa fa-plus"></i> Add New
                      </button>
                  </div>
              </div>
            <div class="col-sm-6 col-xl-4">
            </div>
              <div class="block-content">
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
                          <tr>
                              <th class="text-center" scope="row">1</th>
                              <td class="font-w600">
                                  <a href="">FV40-1</a>
                              </td>
                              <td class="font-w600 text-center">
                                  <a href=""><i class="fa fa-arrow-alt-circle-up text-warning"></i> 28°F</a>
                              </td>
                              <td class="font-w600 text-center">
                                  <a href="">30°F</a>
                              </td>
                              <td class="font-w600 text-center">
                                  <a href="">More...</a>
                              </td>
                              <td class="d-none d-sm-table-cell">
                                  <span class="badge badge-success">Online</span>
                              </td>
                              <td class="text-center">
                                  <div class="btn-group">
                                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-block-large" title="Edit">
                                          <i class="fa fa-pencil-alt"></i>
                                      </button>
                                      <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Delete">
                                          <i class="fa fa-times"></i>
                                      </button>
                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <th class="text-center" scope="row">2</th>
                              <td class="font-w600">
                                  <a href="">FV40-2</a>
                              </td>
                              <td class="font-w600 text-center">
                                  <a href=""><i class="fa fa-arrow-alt-circle-up text-warning"></i> 42°F</a>
                              </td>
                              <td class="font-w600 text-center">
                                  <a href="">45°F</a>
                              </td>
                              <td class="font-w600 text-center">
                                  <a href="">More...</a>
                              </td>
                              <td class="d-none d-sm-table-cell">
                                  <span class="badge badge-success">Online</span>
                              </td>
                              <td class="text-center">
                                  <div class="btn-group">
                                      <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit">
                                          <i class="fa fa-pencil-alt"></i>
                                      </button>
                                      <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Delete">
                                          <i class="fa fa-times"></i>
                                      </button>
                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <th class="text-center" scope="row">3</th>
                              <td class="font-w600">
                                  <a href="">FV40-3</a>
                              </td>
                              <td class="font-w600 text-center">
                                  <a href=""><i class="fa fa-check-circle text-success"></i> 15°F</a>
                              </td>
                              <td class="font-w600 text-center">
                                  <a href="">15°F</a>
                              </td>
                              <td class="font-w600 text-center">
                                  <a href="">More...</a>
                              </td>
                              <td class="d-none d-sm-table-cell">
                                  <span class="badge badge-success">Online</span>
                              </td>
                              <td class="text-center">
                                  <div class="btn-group">
                                      <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit">
                                          <i class="fa fa-pencil-alt"></i>
                                      </button>
                                      <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Delete">
                                          <i class="fa fa-times"></i>
                                      </button>
                                  </div>
                              </td>
                          </tr>
                          <tr class="table-warning">
                              <th class="text-center" scope="row">4</th>
                              <td class="font-w600">
                                  <a href="">FV40-4</a>
                              </td>
                              <td class="font-w600 text-center">
                                  <a href=""><i class="fa fa-question-circle text-danger"></i> --</a>
                              </td>
                              <td class="font-w600 text-center">
                                  <a href="">30°F</a>
                              </td>
                              <td class="font-w600 text-center">
                                  <a href="">More...</a>
                              </td>
                              <td class="d-none d-sm-table-cell">
                                  <span class="badge badge-danger">Offline</span>
                              </td>
                              <td class="text-center">
                                  <div class="btn-group">
                                      <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit">
                                          <i class="fa fa-pencil-alt"></i>
                                      </button>
                                      <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Delete">
                                          <i class="fa fa-times"></i>
                                      </button>
                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <th class="text-center" scope="row">5</th>
                              <td class="font-w600">
                                  <a href="">FV20-1</a>
                              </td>
                              <td class="font-w600 text-center">
                                  <a href=""><i class="fa fa-arrow-alt-circle-up text-warning"></i> 28°F</a>
                              </td>
                              <td class="font-w600 text-center">
                                  <a href="">38°F</a>
                              </td>
                              <td class="font-w600 text-center">
                                  <a href="">More...</a>
                              </td>
                              <td class="d-none d-sm-table-cell">
                                  <span class="badge badge-success">Online</span>
                              </td>
                              <td class="text-center">
                                  <div class="btn-group">
                                      <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit">
                                          <i class="fa fa-pencil-alt"></i>
                                      </button>
                                      <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Delete">
                                          <i class="fa fa-times"></i>
                                      </button>
                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <th class="text-center" scope="row">6</th>
                              <td class="font-w600">
                                  <a href="">FV20-2</a>
                              </td>
                              <td class="font-w600 text-center">
                                  <a href=""><i class="fa fa-arrow-alt-circle-down text-primary"></i> 83°F</a>
                              </td>
                              <td class="font-w600 text-center">
                                  <a href="">50°F</a>
                              </td>
                              <td class="font-w600 text-center">
                                  <a href="">More...</a>
                              </td>
                              <td class="d-none d-sm-table-cell">
                                  <span class="badge badge-success">Online</span>
                              </td>
                              <td class="text-center">
                                  <div class="btn-group">
                                      <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit">
                                          <i class="fa fa-pencil-alt"></i>
                                      </button>
                                      <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Delete">
                                          <i class="fa fa-times"></i>
                                      </button>
                                  </div>
                              </td>
                          </tr>
                      </tbody>
                  </table>
              </div>
            </div>
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
                              <input type="text" class="form-control form-control-alt col-3 id="example-text-input" name="example-text-input" placeholder="Text Input">
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
      </div>
    </div>
    <!-- END Your Block -->
</div>
<!-- END Page Content -->
@endsection
