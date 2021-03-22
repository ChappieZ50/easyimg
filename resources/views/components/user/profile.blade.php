<div class="ipool-user-container col-xl-10 col-lg-10 col-md-12 col-sm-12">
    <div class="ipool-user">
        <h2 class="ipool-sidebar-title">{{__('page.user_profile_title')}}</h2>
        <div class="alert alert-danger" id="user_profile_errors" style="display: none"></div>
        <hr>
        <div class="ipool-user-content">
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="user_email">{{__('page.user_profile_email')}}</label>
                    <input type="email" class="form-control" name="email" id="user_email" placeholder="{{__('page.user_profile_email')}}"
                        value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label for="user_username">{{__('page.user_profile_username')}}</label>
                    <input type="text" class="form-control" name="username" id="user_username" placeholder="{{__('page.user_profile_username')}}"
                        value="{{ $user->username }}">
                </div>
                <button class="btn ipool-button" id="user_update">{{__('page.user_profile_profile_update_email_username_button')}}</button>
                @if (!auth()->user()->google)
                    <h2 class="user-profile-title mt-5">{{__('page.user_profile_security_title')}}</h2>
                    <hr>
                    <div class="form-group mt-4">
                        <label for="user_current_password">{{__('page.user_profile_current_password')}}</label>
                        <input type="password" class="form-control" name="current_password" id="user_current_password"
                            placeholder="{{__('page.user_profile_current_password')}}">
                    </div>
                    <div class="form-group">
                        <label for="user_new_password">{{__('page.user_profile_new_password')}}</label>
                        <input type="password" class="form-control" name="password" id="user_new_password"
                            placeholder="{{__('page.user_profile_new_password')}}">
                    </div>
                    <div class="form-group">
                        <label for="user_new_password_confirmation">{{__('page.user_profile_new_password_confirm')}}</label>
                        <input type="password" class="form-control" name="password_confirmation"
                            id="user_new_password_confirmation" placeholder="{{__('page.user_profile_new_password_confirm')}}">
                    </div>
                    <button class="btn ipool-button" id="user_update_password">{{__('page.user_profile_update_password_button')}}</button>
                @endif
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 ipool-update-avatar">
                <div class="form-group mx-auto ipool-avatar-area">
                    <div class="ipool-avatar">
                        <img src="{{ avatar_url($user->avatar) }}" alt="{{ $user->username }}" class="user-avatar"
                            id="user_avatar_preview" data-original="{{ avatar_url($user->avatar) }}">

                        <label for="user_avatar" class="btn ipool-button">
                            <i data-feather="edit-2"></i>
                        </label>
                        @if ($user->avatar)
                            <label for="user_delete_avatar" class="btn ipool-button bg-danger ipool-delete-button"
                                id="user_delete_avatar">
                                <i data-feather="trash"></i>
                            </label>
                        @endif
                    </div>
                    <input type="file" class="form-control-file" name="avatar" id="user_avatar" placeholder="Avatar">
                </div>
                <button class="btn ipool-button mx-auto" id="user_update_avatar">{{__('page.user_profile_update_avatar_button')}}</button>
            </div>
        </div>
    </div>
</div>
