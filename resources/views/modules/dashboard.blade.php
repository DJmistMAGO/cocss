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
                        <div class="col-md-6 d-flex justify-content-end">

                            <h4 class="mb-0 mt-0 textdashboardbread textdashboardbread2"
                                style="font-weight: 400; color: #5f5f5f;"><span class="textdashboardbread"
                                    id="txtdatex">{{ date('l, F d, Y') }}</span> <span id="clock"
                                    class="textdashboardbread"></span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- @role('admin') --}}
    <div class="row">
        @role('admin')
            <div class="col-md-6 mt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="row page-titles" style="padding-bottom: 0px;">
                            <div class="chart-container col-md-12">
                                <div id="chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endrole

        <div class="col-md-6 mt-2">
            <div class="card card-custom">
                <div class="card-header" style="background-color: #b31313">
                    <div class="card-title">
                        <h3 class="card-label text-white">Announcement</h3>
                    </div>
                </div>
                <div class="card-body pt-2" style="overflow: auto; height: 355px;">
                    @livewire('announce.index-show')
                </div>
            </div>
        </div>

        {{-- @endrole --}}
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
                    title: {
                        text: 'Medicine Inventory',
                        align: 'center',
                        margin: 20,
                    },
                    series: <?php echo json_encode($data); ?>,
                    xaxis: {
                        categories: <?php echo json_encode($categories); ?>,
                        labels: {
                            show: false
                        }
                    },
                    tooltip: {
                        x: {
                            show: false
                        }
                    },
                    legend: {
                        show: true,
                        position: 'bottom',
                        formatter: function(val, opts) {
                            return val + '<br>';
                        },
                        offsetY: 10,
                        offsetX: 0,
                        height: 'auto',
                        itemMargin: {
                            vertical: 5
                        }
                    },
                    colors: [
                        '#EE3722', '#F57E26', '#900C3F', '#F4EC08', '#4DB847', '#FFC400', '#2A2F84',
                        '#8307F5', '#0793F5', '#07F54F', '#F58307', '#F507C8', '#F50744', '#07F583', '#39CCCC',
                        '#3D9970', '#2ECC40', '#01FF70', '#FFDC00', '#FF8529', '#FF4139', '#85144c', '#F012BE',
                        '#B10DC9', '#00BFFF', '#ADD8E6', '#87CEFA', '#6495ED', '#1E90FF', '#FF1493', '#FF69B4',
                        '#FFC0CB', '#FF7F50', '#FFA07A', '#CD5C5C', '#8B0000', '#FFDAB9', '#FFEFF5', '#FFDAD9',
                        '#FFEFD5', '#F0FFF0', '#FFFFE0', '#F5DEB3', '#EEE8AA', '#BDB76B', '#D2691E', '#A0522D',
                        '#8B4513', '#BAFFE6'
                    ]
                };

                var chart = new ApexCharts(document.querySelector("#chart"), options);

                chart.render();
            });
        </script>
        <script>
            // Update the clock every second
            setInterval(function() {
                var now = new Date();
                var hours = now.getHours();
                var minutes = now.getMinutes();
                var seconds = now.getSeconds();
                var amOrPm = hours >= 12 ? 'PM' : 'AM';

                hours = hours % 12;
                hours = hours ? hours : 12; // Zero should be 12

                var timeString = hours + ':' + padZero(minutes) + ':' + padZero(seconds) + ' ' + amOrPm;

                // var dateString = now.toDateString();

                var clockElement = $('#clock');
                clockElement.html(timeString);
            }, 1000);


            function padZero(number) {
                return number < 10 ? '0' + number : number;
            }
        </script>
    @endpush
