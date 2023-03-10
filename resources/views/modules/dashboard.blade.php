@extends('layout.app')


@section('title')
    Dashboard
@endsection

@push('links')
    @livewireStyles
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="margin-bottom: 15px;">
                <div class="card-body paddingbreadcard" style="padding-top: 25px; padding-bottom: 25px;">
                    <div class="row page-titles" style="padding-bottom: 0px;">
                        <div class="col-md-6 align-self-center">
                            <h3 class="mb-0 mt-0 textdashboardbread3"><span>Welcome, </span> <span
                                    class="text-themecolor textdashboardbread3" style="font-weight: 500; font-size: 25px;"
                                    id="txtuserFname">{{ auth()->user()->name }}</span></h3>
                        </div>
                        <div class="col-md-6 align-self-center">
                            <h4 class="mb-0 mt-0 float-right textdashboardbread textdashboardbread2"
                                style="font-weight: 400; color: #5f5f5f;"><span class="textdashboardbread"
                                    id="txtdatex">Date &nbsp;&nbsp;&nbsp;Time </span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row page-titles" style="padding-bottom: 0px;">
                        <div class="chart-container col-md-12" >
                            <div id="chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('scripts')
        @livewireScripts

        <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.28.3/dist/apexcharts.min.js"></script>

        <script>
            $(document).ready(function() {
                var options = {
                    chart: {
                        type: 'bar',
                        height: 350,
                        width: '100%'
                    },
                    series: [{
                        name: 'Medicine',
                        data: [30, 40, 35, 50, 49]
                    }],
                    xaxis: {
                        categories: ['Medicine 1', 'Medicine 2', 'Medicine 3', 'Medicine 4', 'Medicine 5']
                    }
                }

                var chart = new ApexCharts(document.querySelector("#chart"), options);

                chart.render();
            });
        </script>
    @endpush
