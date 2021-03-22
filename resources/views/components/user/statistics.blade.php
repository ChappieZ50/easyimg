<div class="ipool-user-container col-xl-10 col-lg-10 col-md-12 col-sm-12">
    <div class="ipool-user">
        <h2 class="ipool-sidebar-title">{{__('page.user_statistics_title')}}</h2>
        <hr>
        <div class="ipool-user-content">
            <div class="col-12 ipool-stats">
                <h5>{{__('page.user_statistics_type')}}</h5>
                <div id="file_chart"></div>
            </div>
        </div>
    </div>
</div>

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/apexcharts/apexcharts.css') }}">
@append

@section('scripts')
    <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script>
        window.file_chart = @json($file_chart_data);
        window.file_chart_months = '{{__('page.user_statistics_months')}}';
        window.file_chart_title = '{{__('page.user_statistics_chart_title')}}';
    </script>
@append
