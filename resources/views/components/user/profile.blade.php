<div class="ipool-user-container col-xl-10 col-lg-10 col-md-12 col-sm-12">
    <div class="ipool-user">
        <h2 class="ipool-sidebar-title">Profile Information</h2>
        <div class="alert alert-danger" id="user_profile_errors" style="display: none"></div>
        <hr>
        <div class="ipool-user-content">
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="user_email">Email Address</label>
                    <input type="email" class="form-control" name="email" id="user_email" placeholder="Email Address"
                        value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label for="user_username">Username</label>
                    <input type="text" class="form-control" name="username" id="user_username" placeholder="Username"
                        value="{{ $user->username }}">
                </div>
                <button class="btn ipool-button" id="user_update">Update</button>
                @if (!auth()->user()->google)
                    <h2 class="user-profile-title mt-5">Security Information</h2>
                    <hr>
                    <div class="form-group mt-4">
                        <label for="user_current_password">Current Password</label>
                        <input type="password" class="form-control" name="current_password" id="user_current_password"
                            placeholder="Current Password">
                    </div>
                    <div class="form-group">
                        <label for="user_new_password">New Password</label>
                        <input type="password" class="form-control" name="password" id="user_new_password"
                            placeholder="New Password">
                    </div>
                    <div class="form-group">
                        <label for="user_new_password_confirmation">Confirm New Password</label>
                        <input type="password" class="form-control" name="password_confirmation"
                            id="user_new_password_confirmation" placeholder="Confirm New Password">
                    </div>
                    <button class="btn ipool-button" id="user_update_password">Update</button>
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
                <button class="btn ipool-button mx-auto" id="user_update_avatar">Update Avatar</button>
            </div>
        </div>
    </div>
</div>
