@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col">
            <h3>Home</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
{{--            <div id="chart" style="height: 300px;"></div>--}}
        </div>

    </div>
@endsection
@push('js')
    <!-- Charting library -->
{{--    <script src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>--}}
    <!-- Chartisan -->
{{--    <script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>--}}
    <!-- Your application script -->
{{--    <script>--}}
{{--        const chart = new Chartisan({--}}
{{--            el: '#chart',--}}
{{--            url: "{{route('charts.ages_chart')}}",--}}
{{--            hooks: new ChartisanHooks()--}}
{{--                .datasets('doughnut')--}}
{{--                .pieColors(),--}}

{{--        });--}}

{{--    </script>--}}
@endpush
