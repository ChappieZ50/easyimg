@extends('irob.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-header p-4 d-flex justify-content-between">
                        <div class="card-title">
                            <h4 class="h4" style="font: weight 5px;00;">Users</h4>
                        </div>
                        <div class="card-right">
                            <button class="btn btn-info btn-fw btn-lg" data-toggle="modal" data-target="#newUserModal">
                                <i class="mdi mdi-account-plus-outline" style="font-size: 16px;"></i>
                                New User
                            </button>
                        </div>
                    </div>
                    <div class="card-search float-right mt-3 mb-3">
                        <form action="{{ route('admin.users') }}" method="GET" class="d-flex position-relative">
                            <input type="text" class="form-control" placeholder="Search" name="s"
                                   value="{{ request()->get('s') }}">
                            @if (request()->has('s'))
                                @php
                                    $currentLink = route('admin.users');
                                    if (request()->has('page')) {
                                        $currentLink .= '?page=' . request()->get('page');
                                    }
                                @endphp
                                <a href="{{ $currentLink }}" type="button"
                                   class="close" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                            @endif
                        </form>
                    </div>
                    @unless(count($users))
                        <h5 class="text-center mt-3">No Records Found</h5>
                    @else
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Avatar</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Created</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        @if (!empty($user->avatar))
                                            <img src="{{ $user->avatar }}" alt="{{ $user->username }}">
                                        @else
                                            <img src="{{ asset('assets/images/avatar.png') }}"
                                                 alt="{{ $user->username }}">
                                        @endif
                                    </td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        @if ($user->is_admin)
                                            <label class="badge badge-info">Admin</label>
                                        @else
                                            <label class="badge badge-primary">User</label>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->status)
                                            <label class="badge badge-success text-white">Active</label>
                                        @else
                                            <label class="badge badge-danger text-white">Banned</label>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-info social-btn" style="padding: 6px 10px;"
                                           title="User Info">
                                            <i class="mdi mdi-eye"></i>
                                        </a>
                                        @if ($user->status)
                                            <button class="btn btn-danger social-btn" id="ban" style="padding: 6px 10px;"
                                                    title="Ban this user" data-id="{{ $user->id }}">
                                                <i class="mdi mdi-block-helper"></i>
                                            </button>
                                        @else
                                            <button class="btn btn-success social-btn" id="unban" style="padding: 6px 10px;"
                                                    title="Unban this user" data-id="{{ $user->id }}">
                                                <i class="mdi mdi-block-helper"></i>
                                            </button>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center mt-4">
                            {{ $users->appends(['s' => request()->get('s')])->links() }}
                        </div>
                    @endunless
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="newUserModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="new_user_modal">
                        <div class="mt-2 mb-4 alert alert-danger w-100 d-none" id="non_error" role="alert"></div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="confirm_password"
                                   placeholder="Confirm Password">
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-flat">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="is_admin" id="is_admin">
                                    Is Admin User
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-info" id="add_new_user">Create User</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
