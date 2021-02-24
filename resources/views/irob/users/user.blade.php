@extends('irob.layouts.app')

@section('content')
    <div class="row">
        @if(!$user->status)
            <div class="alert alert-danger w-100 ml-3 mr-3">
                "{{$user->username}}" has been banned
            </div>
        @endif
        <div class="col-lg-12 d-flex justify-content-between flex-wrap mt-3">
            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="user-info">
                            <div class="user-avatar">
                                @if($user->avatar)
                                    <img src="{{$user->avatar}}" alt="">
                                @else
                                    <img src="{{asset('assets/images/avatar.png')}}" alt="{{$user->username}}">
                                @endif
                            </div>
                            <span class="username">{{$user->username}}</span>
                            <span class="email text-muted small">{{$user->email}}</span>
                            <div class="user-status">
                                @if ($user->is_admin)
                                    <label class="badge badge-info">Admin</label>
                                @else
                                    <label class="badge badge-primary">User</label>
                                @endif
                                @if ($user->status)
                                    <label class="badge badge-success text-white">Active</label>
                                @else
                                    <label class="badge badge-danger text-white">Banned</label>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 mt-3">
                @component('irob.components.card')
                    @slot('title','User Images')
                    @slot('searchRoute',route('admin.user.show',$user->id))
                    @slot('body')
                        {{--@unless(count($users))
                                                    <h5 class="text-center mt-3">No Records Found</h5>
                                                @else
                                                    <table class="table table-hover table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th>Image</th>
                                                            <th>Name</th>
                                                            <th>Size</th>
                                                            <th>Created</th>
                                                            <th>Role</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach ($users as $user)
                                                            <tr>
                                                                <td>
                                                                    @if($user->avatar)
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
                                                                    <a href="{{route('admin.user.show',$user->id)}}" class="btn btn-info social-btn" style="padding: 6px 10px;"
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
                                                @endunless--}}
                    @endslot
                @endcomponent
            </div>
        </div>
    </div>
@endsection
