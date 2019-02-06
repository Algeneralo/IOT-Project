@extends('layouts.backend')
@section("css")
    <style>
        a:not([href]):not([tabindex]) {
            cursor: pointer;
            color: #0665d0 !important;
            text-decoration: none;
        }
    </style>
    <link href="{{ url('css/bootstrap-duration-picker.css') }}" rel="stylesheet" type="text/css">
@endsection
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
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif
    <!-- Your Block -->
        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title">My Fermentation Profiles</h3>
                <div class="block-options">
                    <button type="button" data-toggle="modal" data-target="#createModal" class="btn btn-success">
                        <i class="fa fa-plus"></i> Add Profile
                    </button>
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
                                <span class="badge badge-secondary">{{$profile->type ." Stages"}}</span>
                            </td>
                            <td class="font-w600 text-center d-none d-md-table-cell">
                                <a href="">{{$profile->duration}}</a>
                            </td>
                            <td class="font-w600 text-center">
                                <a class="more">More...</a>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-primary edit" title="Edit">
                                        <i class="fa fa-pencil-alt"></i>
                                    </button>
                                    <form method="post" class="deleteForm"
                                          action="{{route("ferments.destroy",$profile->id)}}">
                                        @method("DELETE")
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-primary" data-toggle="tooltip"
                                                title="Delete">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>
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
    @include('FermentationProfiles.modal.show')
    @include('FermentationProfiles.modal.create')
    @include('FermentationProfiles.modal.edit')
@endsection
@section('js')
    @include('FermentationProfiles.scripts.show')
    @include('FermentationProfiles.scripts.create')
    @include('FermentationProfiles.scripts.edit')
    <script src="{{url("js/bootstrap-duration-picker.js")}}"></script>
    <script>

        $('.duration-picker').durationPicker();

        $(".deleteForm button").on("click", function (e) {
            e.preventDefault();
            if (confirm('Do you want to Delete?')) {
                $(this).parent().submit();
            }
        });
    </script>
@endsection
