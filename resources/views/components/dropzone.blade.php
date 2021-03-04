<div id="irob_dropzone" class="irob-dropzone" data-note="{{get_setting('dropzone_rule')}}" data-drop="{{get_setting('dropzone_text')}}"
     data-browse="{{get_setting('browse_text')}}">
</div>
<div class="irob-dropzone-terms">
    <div>
        @php
            $privacy = get_privacy_page();
            $terms = get_terms_page();
        @endphp
        By creating a image, you agree
        <a href="{{route('page',['slug' => !empty($terms->slug) ? $terms->slug : '#'])}}" class="selected-page-item" target="_blank">{{!empty($terms->title) ? $terms->title : ''}}</a>
        and
        <a href="{{route('page',['slug' => !empty($privacy->slug) ? $privacy->slug : '#'])}}" class="selected-page-item" target="_blank">{{!empty($privacy->title) ? $privacy->title : ''}}</a>
    </div>
</div>
