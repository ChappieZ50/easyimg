@extends('irob.layouts.app')

@section('content')
    <div class="row">
        @if (!$user->status)
            <div class="alert alert-danger w-100 ml-3 mr-3">
                "{{ $user->username }}" has been banned
            </div>
        @endif
        <div class="col-lg-12 d-flex justify-content-between flex-wrap mt-3">
            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="user-info">
                            <div class="user-avatar">
                                <img src="{{avatar_url($user->avatar)}}" alt="">
                            </div>
                            <span class="username">{{ $user->username }}</span>
                            <span class="email text-muted small">{{ $user->email }}</span>
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
                    @slot('title', 'User Images')
                    @slot('searchRoute', route('admin.user.show',$user->id))
                    @slot('body')
                        @unless(count($files))
                            <h5 class="text-center mt-3">No Records Found</h5>
                        @else
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>Preview</th>
                                        <th>Name</th>
                                        <th>Original Name</th>
                                        <th>Size</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($files as $file)
                                        <tr>
                                            <td>
                                                <img src="{{ file_url($file) }}" alt="{{ $file->file_id }}" class="table-image">
                                            </td>
                                            <td>{{ $file->file_id }}</td>
                                            <td>{{ $file->file_original_id }}</td>
                                            <td>{{ readable_size($file->file_size) }}</td>
                                            <td>{{ $file->created_at->diffForHumans() }}</td>

                                            <td>
                                                <a href="{{ route('admin.file.show', $file->id) }}" class="btn btn-info social-btn"
                                                   style="padding: 6px 10px;" title="Image info">
                                                    <i class="mdi mdi-eye"></i>
                                                </a>
                                                <button class="btn btn-danger social-btn" id="delete" style="padding: 6px 10px;"
                                                        title="Delete this image" data-id="{{ $file->id }}">
                                                    <i class="mdi mdi-delete-outline"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center mt-4">
                                {{ $files->appends(['s' => request()->get('s')])->links() }}
                            </div>
                        @endunless
                    @endslot
                @endcomponent
            </div>
        </div>
    </div>
@endsection
