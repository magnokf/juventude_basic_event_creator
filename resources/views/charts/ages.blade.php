@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col">
            <h3>Home</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div id="chart" style="height: 300px;"></div>
        </div>

    </div>
@endsection
@push('js')
    <!-- Charting library -->
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    <!-- Your application script -->
    <script>
        const chart = new Chartisan({
            el: '#chart',
            url: "{{route('charts.ages_chart')}}",
            hooks: new ChartisanHooks()
                .colors()

        });
    </script>
@endpush
