<div class="row">
    <form class="col-12" action="" method="POST" enctype="multipart/form-data">
        <h4>Website Logo & Favicon</h4>
        <hr>
        @csrf
        <div class="row">
            <div class="col-lg-6 text-center mt-3">
                <img src="{{asset('irob/assets/images/404.svg')}}" alt="avatar" style="max-width: 120px;" id="logo_preview">
                <div class="form-group">
                    <hr>
                    <div class="mt-3 choose-file">
                        <label for="logo" class="form-control form-control-file text-center d-inline">Choose Logo</label>
                        <div class="small">Recommended: 120x30</div>
                    </div>
                    <input type="file" class="d-none" id="logo" name="logo">
                </div>
            </div>
            <div class="col-lg-6 text-center mt-3">
                <img src="{{asset('irob/assets/images/404.svg')}}" alt="avatar" style="max-width: 120px;" id="favicon_preview">
                <div class="form-group">
                    <hr>
                    <div class="mt-3 choose-file">
                        <label for="favicon" class="form-control form-control-file text-center d-inline">Choose Icon</label>
                        <div class="small">Recommended: 60x60</div>
                    </div>
                    <input type="file" class="d-none" id="favicon" name="favicon">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-info btn-lg float-right">Save Settings</button>
    </form>
</div>
