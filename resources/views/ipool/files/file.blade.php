@extends('ipool.layouts.app')

@section('content')
    <div class="row">
        @if (!$file->user->status)
            <div class="alert alert-danger w-100 ml-3 mr-3">
                "{{ $file->user->username }}" {{__('page.admin_user_banned')}}
            </div>
        @endif

        <a href="{{route('file.show',$file->file_id)}}" class="ml-auto btn out-of-page" target="_blank">
            <span>{{__('page.admin_image_go_to_page')}}</span>
            <i class="mdi mdi-arrow-right"></i>

        </a>

        <div class="col-lg-12 d-flex justify-content-between flex-wrap mt-3">
            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="user-info">
                            <div class="user-avatar">
                                <img src="{{avatar_url($file->user->avatar)}}"
                                     alt="{{ $file->user->username }}">
                            </div>
                            @if ($file->user->is_anonymous)
                                <span class="username">{{ $file->user->username }}</span>
                            @else
                                <a href="{{ route('admin.user.show', $file->user->id) }}">
                                    <span class="username">{{ $file->user->username }}</span>
                                </a>
                            @endif
                            <span class="email text-muted small">{{ $file->user->email }}</span>
                            <div class="user-status">
                                @if ($file->user->is_admin)
                                    <label class="badge badge-info">{{__('page.admin_user_type_admin')}}</label>
                                @else
                                    @if ($file->user->is_anonymous)
                                        <label class="badge badge-warning text-white">Anonymous</label>
                                    @else
                                        <label class="badge badge-primary">{{__('page.admin_user_type_user')}}</label>
                                    @endif
                                @endif
                                @if (!$file->user->is_anonymous)
                                    @if ($file->user->status)
                                        <label class="badge badge-success text-white">{{__('page.admin_active')}}</label>
                                    @else
                                        <label class="badge badge-danger text-white">{{__('page.admin_banned')}}</label>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="file-info">
                            <ul>
                                <li title="{{$file->file_original_id}}">
                                    <strong>{{__('page.admin_image_original_name')}}</strong>
                                    <span>{{ str_limit($file->file_original_id,25) }}</span>
                                </li>
                                <li>
                                    <strong>{{__('page.admin_image_image_id')}}</strong>
                                    <span>{{ $file->file_id }}</span>
                                </li>
                                <li>
                                    <strong>{{__('page.admin_image_size')}}</strong>
                                    <span>{{ readable_size($file->file_size) }}</span>
                                </li>
                                <li>
                                    <strong>{{__('page.admin_image_created_ago')}}</strong>
                                    <span>{{ $file->created_at->diffForHumans() }}</span>
                                </li>
                                <li>
                                    <strong>{{__('page.admin_image_created_date')}}</strong>
                                    <span>{{ $file->created_at }}</span>
                                </li>
                                <li>
                                    <strong>{{__('page.admin_image_uploaded_to')}}</strong>
                                    <span class="text-uppercase">{{ $file->uploaded_to }}</span>
                                </li>
                                <li>
                                    <strong>{{__('page.admin_image_mime_type')}}</strong>
                                    <span class="text-uppercase">{{ $file->file_mime }}</span>
                                </li>
                            </ul>
                        </div>
                        <a href="{{ route('file.download',$file->file_id) }}" class="btn btn-primary w-100 mt-2">{{__('page.admin_image_download')}}</a>
                    </div>
                </div>
            </div>

            <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12">
                <div class="card p-3">
                    <div class="card-body">
                        <div class="file-preview text-center">
                            <img src="{{ file_url($file) }}" alt="{{ $file->user->username }}"
                                 class="img-fluid rounded">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
