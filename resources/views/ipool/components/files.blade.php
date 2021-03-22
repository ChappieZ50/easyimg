@unless(count($files))
    <h5 class="text-center mt-3">{{__('page.admin_no_records')}}</h5>
@else
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>{{__('page.admin_images_table_preview')}}</th>
                @isset($username)
                    <th>{{__('page.admin_images_table_username')}}</th>
                @endisset
                <th>{{__('page.admin_images_table_name')}}</th>
                <th>{{__('page.admin_images_table_original_name')}}</th>
                <th>{{__('page.admin_images_table_size')}}</th>
                <th>{{__('page.admin_images_table_created')}}</th>
                <th>{{__('page.admin_images_table_action')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($files as $file)
                <tr>
                    <td>
                        <img src="{{ file_url($file) }}" alt="{{ $file->file_id }}" class="table-image file-image">
                    </td>
                    @isset($username)
                        <td>
                            @if($file->user)
                                <a href="{{ route('admin.user.show',$file->user->id) }}" target="_blank">{{ $file->user->username }}</a>
                            @else
                                Anonymous
                            @endif
                        </td>
                    @endisset
                    <td>{{ $file->file_id }}</td>
                    <td title="{{$file->file_original_id}}">{{ str_limit($file->file_original_id) }}</td>
                    <td>{{ readable_size($file->file_size) }}</td>
                    <td>{{ $file->created_at->diffForHumans() }}</td>

                    <td>
                        <a href="{{ route('admin.file.show', $file->id) }}" class="btn btn-primary social-btn"
                           style="padding: 6px 10px;" title="{{__('page.admin_images_table_action_view')}}">
                            <i class="mdi mdi-eye"></i>
                        </a>
                        <button class="btn btn-danger social-btn" id="file_delete" style="padding: 6px 10px;"
                                title="{{__('page.admin_images_table_action_delete')}}" data-id="{{ $file->id }}">
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
