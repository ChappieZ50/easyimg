@extends('irob.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            @component('irob.components.card')
                @slot('title', 'Images')
                @slot('searchRoute', route('admin.file.index'))
                @slot('body')
                    @unless(count($files))
                        <h5 class="text-center mt-3">No Records Found</h5>
                    @else
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Preview</th>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>Original Name</th>
                                    <th>Image Size</th>
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
                                        <td>
                                        @if($file->user)
                                            <a href="{{ route('admin.user.show',$file->user->id) }}" target="_blank">{{ $file->user->username }}</a>
                                        @else
                                            Anonymous
                                        @endif
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
                        <div class="d-flex justify-content-center mt-4">
                            {{ $files->appends(['s' => request()->get('s')])->links() }}
                        </div>
                    @endunless
                @endslot
            @endcomponent
        </div>
    </div>
@endsection
