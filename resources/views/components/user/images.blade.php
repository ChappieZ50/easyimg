<div class="irob-user-container col-xl-10 col-lg-10 col-md-12 col-sm-12">
    <div class="irob-user">
        <h2 class="irob-sidebar-title">My Images</h2>
        <hr>
        <div class="irob-user-content">
            <div class="col-12 irob-images">
                {{--<div class="empty-images">
                    <img src="{{asset('empty-images.svg')}}" alt="empty image" class="img-fluid">
                    <h5>
                        No images found
                    </h5>
                    <p>
                        You can upload some images from <a href="{{route('home')}}">here.</a>
                    </p>
                </div>--}}

                <div class="irob-user-image">
                    <div class="irob-image-delete" id="delete" data-id="1">
                        <i data-feather="x"></i>
                    </div>
                    <div class="irob-image-link">
                        <i data-feather="link" id="copy" data-clipboard-text="{{asset('example.jpg')}}"></i>
                    </div>
                    <a href="{{asset('example.jpg')}}" target="_blank">
                        <img src="{{asset('example.jpg')}}" alt="example">
                    </a>
                    <div class="irob-image-bottom">
                        <div class="bottom-content">
                            <div class="image-name">example.jpg</div>
                            <div class="image-info">
                                <i data-feather="download"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
