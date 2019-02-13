<form action="{{route("devices.update",$device->id)}}" method="post">
    @csrf
    @method("put")
    <p>Potenti elit lectus augue eget iaculis vitae etiam.</p>
    <div class="form-group">
        <label for="name">Friendly Name</label>
        <input type="text" class="form-control form-control-alt" id="name"
               name="name" placeholder="Text Input" value="{{$device->name}}">
    </div>

    <div class="block-content block-content-full text-right bg-light">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-sm btn-success">Edit</button>
    </div>

</form>
