@extends('ipool.layouts.app')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            @component('ipool.components.card')
                @slot('title') {{__('page.admin_manage_ads_title')}} @endslot
                @slot('body')
                    <form action="{{ route('admin.ad.store') }}" method="POST">
                        @csrf
                        <div class="row mt-3 p-3">
                            <div class="form-group col-lg-6">
                                <label for="home_top_ad">{{__('page.admin_manage_ads_home_top_ad')}}</label>
                                <textarea name="home_top_ad" id="home_top_ad" rows="10"
                                          class="form-control">{{ isset($ad) ? $ad->home_top_ad : '' }}</textarea>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="home_bottomad">{{__('page.admin_manage_ads_home_bottom_ad')}}</label>
                                <textarea name="home_bottom_ad" id="home_bottomad" rows="10"
                                          class="form-control">{{ isset($ad) ? $ad->home_bottom_ad : '' }}</textarea>
                            </div>
                        </div>

                        <div class="row mt-3 p-3">
                            <div class="form-group col-lg-6">
                                <label for="file_left_ad">{{__('page.admin_manage_ads_image_left_ad')}}</label>
                                <textarea name="file_left_ad" id="file_left_ad" rows="10"
                                          class="form-control">{{ isset($ad) ? $ad->file_left_ad : '' }}</textarea>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="file_bottom_ad">{{__('page.admin_manage_ads_image_bottom_ad')}}</label>
                                <textarea name="file_bottom_ad" id="file_bottom_ad" rows="10"
                                          class="form-control">{{ isset($ad) ? $ad->file_bottom_ad : '' }}</textarea>
                            </div>
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="mobile_ad">{{__('page.admin_manage_ads_mobile_ad')}}</label>
                            <textarea name="mobile_ad" id="mobile_ad" rows="10"
                                      class="form-control">{{ isset($ad) ? $ad->mobile_ad : '' }}</textarea>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="download__ad">{{__('page.admin_manage_ads_download_ad_link')}}</label>
                            <input name="download_ad" id="download__ad" class="form-control" value="{{ isset($ad) ? $ad->download_ad : '' }}">
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg float-right mr-3">{{__('page.admin_manage_ads_save_button')}}</button>
                    </form>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection
