@extends('irob.layouts.app')

@section('content')
    <div class="row">
        @if ($message->user  && !$message->user->status)
            <div class="alert alert-danger w-100 ml-3 mr-3">
                "{{ $message->user->username }}" has been banned
            </div>
        @endif
        <div class="col-lg-12 d-flex justify-content-between flex-wrap mt-3">
            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="user-info">
                            <div class="user-avatar">
                                @if($message->user && $message->user->avatar)
                                    <img src="{{ $message->user->avatar }}" alt="{{ $message->name }}">
                                @else
                                    <img src="{{ asset('assets/images/avatar.png') }}"
                                         alt="{{ $message->name }}">
                                @endif
                            </div>
                            @if ($message->user)
                                <span class="username">{{ $message->name }}</span>
                            @else
                                <a href="{{ route('admin.user.show', $message->user->id) }}">
                                    <span class="username">{{ $message->user->username }}</span>
                                </a>
                            @endif
                            <span class="email text-muted small">{{ $file->user->email }}</span>
                            <div class="user-status">
                                @if (!$message->user)
                                    <label class="badge badge-warning text-white">Anonymous</label>
                                @else
                                    <label class="badge badge-primary">User</label>
                                @endif
                                @if ($message->user && $message->user->status)
                                    <label class="badge badge-success text-white">Active</label>
                                @elseif($message->user && !$message->user->status)
                                    <label class="badge badge-danger text-white">Banned</label>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12">
                <div class="card p-3">
                    <div class="card-body">
                        <div class="card-title">
                            <h5>{{$message->subject}}</h5>
                        </div>
                        <div class="file-preview">
                            {{$message->message}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
