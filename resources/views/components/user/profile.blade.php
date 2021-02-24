<div class="irob-user-container col-xl-10 col-lg-10 col-md-12 col-sm-12">
    <div class="irob-user">
        <h2 class="irob-sidebar-title">Profile Information</h2>
        <hr>
        <div class="irob-user-content">
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email Address"
                        value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username"
                        value="{{ $user->username }}">
                </div>
                <button class="btn rob-button" type="submit">Update</button>
                <h2 class="user-profile-title mt-5">Security Information</h2>
                <hr>
                <div class="form-group mt-4">
                    <label for="current_password">Current Password</label>
                    <input type="password" class="form-control" name="current_password" id="current_password"
                        placeholder="Current Password">
                </div>
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" class="form-control" name="new_password" id="new_password"
                        placeholder="New Password">
                </div>
                <div class="form-group">
                    <label for="new_password_confirm">Confirm New Password</label>
                    <input type="password" class="form-control" name="new_password_confirmation"
                        id="new_password_confirm" placeholder="Confirm New Password">
                </div>
                <button class="btn rob-button" type="submit">Update</button>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 irob-update-avatar">
                <div class="form-group mx-auto irob-avatar-area">
                    <div class="irob-avatar">
                        @if (!empty($user->avatar))
                        <img src="{{ $user->avatar }}" alt="user avatar" class="user-avatar">
                        @else
                            <img src="{{ asset('assets/images/avatar.png') }}" alt="user avatar" class="user-avatar">
                        @endif
                        <label for="avatar" class="btn rob-button">
                            <i data-feather="edit-2"></i>
                        </label>
                    </div>
                    <input type="file" class="form-control-file" name="avatar" id="avatar" placeholder="Avatar">
                </div>
                <button class="btn rob-button mx-auto" type="submit" id="update_avatar">Update Avatar</button>
            </div>
        </div>
    </div>
</div>
