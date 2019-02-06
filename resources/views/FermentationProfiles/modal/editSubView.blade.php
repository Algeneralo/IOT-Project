<form action="{{route("ferments.update",$profile->id)}}" method="post">
    @csrf
    @method("put")
    <p>Potenti elit lectus augue eget iaculis vitae etiam.</p>
    <div class="form-group">
        <label for="name">Friendly Name</label>
        <input type="text" class="form-control form-control-alt" id="name"
               name="name" placeholder="Text Input" value="{{$profile->name}}">
    </div>
    <div class="form-group">
        <label class="d-block">Units setting</label>
        <div class="custom-control custom-radio custom-control-inline custom-control-primary">
            <input type="radio" class="custom-control-input" id="fahrenheit"
                   name="fahrenheit" {{$profile->fahrenheit==1?"checked":""}} value="1">
            <label class="custom-control-label" for="fahrenheit">°F</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline custom-control-primary">
            <input type="radio" class="custom-control-input" id="fahrenheit"
                   name="fahrenheit" {{$profile->fahrenheit==0?"checked":""}} value="0">
            <label class="custom-control-label" for="fahrenheit">°C</label>
        </div>
    </div>
    <div class="form-group">
        <label class="d-block">Stages</label>
        <div class="stages custom-control custom-radio custom-control-primary">
            @foreach($profile->stages as $stage)
                <div class="stage form-inline">
                    <input type="hidden" name="sid[]" value="{{$stage->id}}">
                    <input placeholder="Stage name" name="sname[]"
                           class="form-control form-control-alt form-inline"
                           type="text" value="{{$stage->name}}">
                    <input placeholder="time" name="stime[]"
                           class="form-control form-control-alt  form-inline duration-picker"
                           type="text" value="{{$stage->time}}">
                    <input placeholder="temp" name="stemp[]"
                           class="form-control form-control-alt form-inline"
                           type="text" value="{{$stage->temp}}">
                    <input type="hidden" name="isDeleted[]" value="0">
                    <button type="button" class="btn btn-sm btn-danger deleteStage"
                            data-toggle="tooltip" title="" data-original-title="Delete Stage">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
            @endforeach
        </div>
    </div>

    <div class="form-group">
        <label for="name">Notes</label>
        <textarea class="form-control form-control-alt">{{$profile->notes}}</textarea>
    </div>
    <div class="block-content block-content-full text-right bg-light">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-sm btn-success">Edit</button>
    </div>

</form>
