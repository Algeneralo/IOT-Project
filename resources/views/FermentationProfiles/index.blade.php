@extends('layouts.backend')
@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Fermentation Profiles</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Profiles</li>
                        <li class="breadcrumb-item active" aria-current="page">Fermentation</li>
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
                <h3 class="block-title">My Fermentation Profiles</h3>
                <div class="block-options">
                    <button type="button" data-toggle="modal" data-target="#modal-block-large" class="btn btn-success">
                        <i class="fa fa-plus"></i> Add Profile
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
                        <th class="text-center d-none d-sm-table-cell">Type</th>
                        <th class="text-center d-none d-md-table-cell">Duration</th>
                        <th class="text-center">Details</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($profiles as $profile)
                        <tr>
                            <th class="text-center" scope="row">{{$loop->iteration}}</th>
                            <td class="font-w600">
                                <a href="">{{$profile->name}}</a>
                                <input class="id" name="id" value="{{$profile->id}}" type="hidden">
                            </td>
                            <td class="font-w600 text-center d-none d-sm-table-cell">
                                <span class="badge badge-secondary">{{$profile->type}}</span>
                            </td>
                            <td class="font-w600 text-center d-none d-md-table-cell">
                                <a href="">{{$profile->duration}}</a>
                            </td>
                            <td class="font-w600 text-center">
                                <a class="more" href="#">More...</a>
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
    </div>
    <!-- END Page Content -->
    @include('FermentationProfiles.modal.edit')
    @include('FermentationProfiles.modal.show')
@endsection
@section('js')
    @include('FermentationProfiles.scripts.show')
@endsection
