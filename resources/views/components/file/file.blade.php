<div class="ipool-file-container col-xl-9 col-lg-9 col-md-12 col-sm-12">
    <div class="ipool-file-content">
        <div class="img-preview text-center">
            <img src="{{file_url($file)}}" alt="{{$file->file_original_id}}" class="img-fluid rounded">
        </div>
        <div class="file-snap p-4">
            <div class="form-group">
                <label for="ipool_file_url" class="h5">{{__('page.image_link')}}</label>
                <div class="ipool-copy-container">
                    <input type="text" class="form-control" value="{{file_url($file)}}" readonly id="ipool_file_url">
                    <div id="copy_content" class="d-none">{{file_url($file)}}</div>
                    <div class="ipool-copy" id="click_to_copy" data-clipboard-target="#click_to_copy">
                        {{__('page.image_click_to_copy')}}
                    </div>
                </div>
                <label for="ipool_html_code" class="h5 mt-3">{{__('page.image_html_code')}}</label>
                <div class="ipool-copy-container">
                    <textarea type="text" class="form-control no-resize" readonly id="ipool_html_code"><a href="{{route('file.show',$file->file_id)}}"><img src="{{file_url($file)}}" alt="{{$file->file_original_id}}"/></a></textarea>
                    <div id="copy_content" class="d-none"><a href="{{route('file.show',$file->file_id)}}"><img src="{{file_url($file)}}" alt="{{$file->file_original_id}}"/></a>
                    </div>
                    <div class="ipool-copy" id="click_to_copy" data-clipboard-target="#click_to_copy" data-type="textarea">
                        {{__('page.image_click_to_copy')}}
                    </div>
                </div>
                <label for="ipool_bbcode" class="h5 mt-3">{{__('page.image_bbcode')}}</label>
                <div class="ipool-copy-container">
                    <textarea type="text" class="form-control no-resize" readonly id="ipool_bbcode">[url={{route('file.show',$file->file_id)}}][img]{{file_url($file)}}[/img][/url]</textarea>
                    <div id="copy_content" class="d-none">[url={{route('file.show',$file->file_id)}}][img]{{file_url($file)}}[/img][/url]</div>
                    <div class="ipool-copy" id="click_to_copy" data-clipboard-target="#click_to_copy" data-type="textarea">
                        {{__('page.image_click_to_copy')}}
                    </div>
                </div>
            </div>
        </div>
        @component('components.ads.file.bottom') @endcomponent
        <div class="h4 text-center">{{__('page.image_share_with')}}</div>
        <hr>
        @component('components.social-share')
            @slot('text',$file->file_original_id)
            @slot('url',url()->current())
            @slot('media',file_url($file))
        @endcomponent
    </div>
</div>
