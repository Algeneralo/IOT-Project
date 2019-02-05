<div class="modal" id="createModal" tabindex="-1" role="dialog" aria-labelledby="modal-block-large"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{route("ferments.store")}}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Add Profile</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <p>Potenti elit lectus augue eget iaculis vitae etiam.</p>
                        <div class="form-group">
                            <label for="name">Friendly Name</label>
                            <input type="text" class="form-control form-control-alt" id="name"
                                   name="name" placeholder="Text Input">
                        </div>
                        <div class="form-group">
                            <label class="d-block">Units setting</label>
                            <div class="custom-control custom-radio custom-control-inline custom-control-primary">
                                <input type="radio" class="custom-control-input" id="fahrenheit"
                                       name="fahrenheit" checked value="1">
                                <label class="custom-control-label" for="f">°F</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline custom-control-primary">
                                <input type="radio" class="custom-control-input" id="fahrenheit"
                                       name="fahrenheit" value="0">
                                <label class="custom-control-label">°C</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="d-block">Stages</label>
                            <div class="stages custom-control custom-radio custom-control-primary">
                                <div class="stage form-inline">
                                    <input placeholder="Stage name" name="sname[]"
                                           class="form-control form-control-alt form-inline"
                                           type="text">
                                    <input placeholder="time" name="stime[]"
                                           class="form-control form-control-alt  form-inline duration-picker"
                                           type="text">
                                    <input placeholder="temp" name="stemp[]"
                                           class="form-control form-control-alt form-inline"
                                           type="text">
                                    <button type="button" class="btn btn-sm btn-primary addStage"
                                            data-toggle="tooltip" title="" data-original-title="Add Stage">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Notes</label>
                            <textarea name="notes" class="form-control form-control-alt"></textarea>
                        </div>
                    </div>
                    <div class="block-content block-content-full text-right bg-light">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-success">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
