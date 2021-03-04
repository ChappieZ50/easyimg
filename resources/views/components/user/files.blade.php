<div class="irob-user-container col-xl-10 col-lg-10 col-md-12 col-sm-12">
    <div class="irob-user">
        <h2 class="irob-sidebar-title">My Images</h2>
        <hr>
        <div class="irob-user-content">
            <div class="col-12 irob-images">
                @unless(count($files))
                    <div class="empty-images">
                        <img src="{{ asset('empty-images.svg') }}" alt="empty image" class="img-fluid">
                        <h5>
                            No images found
                        </h5>
                        <p>
                            You can upload some images from <a href="{{ route('home') }}">here.</a>
                        </p>
                    </div>

                @else
                    @foreach ($files as $file)
                        @php $link = file_url($file); @endphp
                        <div class="irob-user-image">
                            <div class="irob-image-delete" id="file_delete" data-id="{{ $file->id }}">
                                <i data-feather="x"></i>
                            </div>
                            <div class="irob-image-link">
                                <i data-feather="link" id="copy" data-clipboard-text="{{ $link }}"></i>
                            </div>

                            <a href="{{ $link }}" data-lightbox="image-{{ $file->id }}"
                                data-title="{{ $file->file_original_id . '.' . $file->file_mime }}">
                                <img src="{{ $link }}" alt="{{ $file->file_id }}">
                            </a>

                            <div class="irob-image-bottom">
                                <div class="bottom-content">
                                    <div class="image-name">{{ $file->file_original_id . '.' . $file->file_mime }}</div>
                                    <div class="image-info">
                                        <a href="{{ route('user.file.download',['file' => $file->file_id]) }}">
                                            <i data-feather="download"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endunless
            </div>
            <div class="mx-auto mt-3">
                {{ $files->links() }}
            </div>
        </div>
    </div>
</div>
