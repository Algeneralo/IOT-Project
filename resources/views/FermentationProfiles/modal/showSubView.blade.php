<p>Potenti elit lectus augue eget iaculis vitae etiam.</p>
<div class="form-group">
    <label for="name">Friendly Name</label>
    <input type="text" class="form-control form-control-alt" id="name"
           name="name" placeholder="Text Input" value="{{$profile->name}}" disabled>
</div>
<div class="form-group">
    <label class="d-block">Units setting</label>
    <div class="custom-control custom-radio custom-control-inline custom-control-primary">
        <input type="radio" class="custom-control-input" id="fahrenheit"
               name="fahrenheit" {{$profile->fahrenheit==1?"checked":""}} disabled>
        <label class="custom-control-label" for="fahrenheit">°F</label>
    </div>
    <div class="custom-control custom-radio custom-control-inline custom-control-primary">
        <input type="radio" class="custom-control-input" id="fahrenheit"
               name="fahrenheit" {{$profile->fahrenheit==0?"checked":""}} disabled>
        <label class="custom-control-label" for="fahrenheit">°C</label>
    </div>
</div>
<div class="form-group">
    <label class="d-block">Stages</label>
    <div class="custom-control custom-radio custom-control-inline custom-control-primary">
        <table class="table table-active">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Temp</th>
                <th>Time</th>
            </tr>
            </thead>
            <tbody>
            @foreach($profile->stages as $stage)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$stage->name}}</td>
                    <td>{{$stage->temp}}</td>
                    <td>{{$stage->time}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="form-group">
    <label for="name">Duration</label>
    <input type="text" class="form-control form-control-alt" value="{{$profile->duration}}" disabled>
</div>
<div class="form-group">
    <label for="name">Notes</label>
    <textarea class="form-control form-control-alt" disabled>{{$profile->notes}}</textarea>
</div>