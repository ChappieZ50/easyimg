<div class="row">
    <form class="col-12" action="{{route('admin.setting.store')}}" method="POST">
        <input type="hidden" name="aws_api">
        <h4>{{__('page.admin_settings_aws_api_title')}}</h4>
        <hr>
        <div class="alert alert-light">
            {!! __('page.admin_settings_aws_api_help_text',['link' => '<a href="https://s3.console.aws.amazon.com" target="_blank">'.__("page.admin_settings_aws_api_help_text_link").'</a>']) !!}
        </div>
        <hr>
        @csrf
        <div class="row">
            <div class="form-group col-lg-6">
                <label for="aws_access_key">{{__('page.admin_settings_aws_api_access_key')}}</label>
                <input type="text" class="form-control col-12" id="aws_access_key"
                       name="aws_access_key" value="{{isset($setting) ? $setting->aws_access_key : ''}}">
            </div>
            <div class="form-group col-lg-6">
                <label for="aws_secret_access_key">{{__('page.admin_settings_aws_api_secret_access_key')}}</label>
                <input type="text" class="form-control col-12" id="aws_secret_access_key"
                       name="aws_secret_access_key" value="{{isset($setting) ? $setting->aws_secret_access_key : ''}}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-6">
                <label for="aws_region">{{__('page.admin_settings_aws_api_region')}}</label>
                <input type="text" class="form-control col-12" id="aws_region"
                       name="aws_region" value="{{isset($setting) ? $setting->aws_region : ''}}">
            </div>
            <div class="form-group col-lg-6">
                <label for="aws_bucket">{{__('page.admin_settings_aws_api_bucket')}}</label>
                <input type="text" class="form-control col-12" id="aws_bucket"
                       name="aws_bucket" value="{{isset($setting) ? $setting->aws_bucket : ''}}">
            </div>
        </div>
        <div class="alert alert-warning small">
            {{__('page.admin_settings_aws_api_warning_text')}}
        </div>
        <button type="submit" class="btn btn-primary btn-lg float-right">{{__('page.admin_settings_save_button')}}</button>
    </form>
</div>
