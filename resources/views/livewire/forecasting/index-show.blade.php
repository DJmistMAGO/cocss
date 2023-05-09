<div class="container-fluid containerfluidneed" style="padding: 20px 20px;">
    <div class="row">
        <div class="col-12">
            <div class="card" style="margin-bottom: 0px;">
                <div class="card-body" style="padding-top: 1rem; padding-bottom: .9rem;">
                    <div class="row page-titles" style="padding-bottom: 0px;">
                        <div class="col-md-6 align-self-center">
                            <h3 class="text-themecolor mb-0 mt-0" style="font-weight: 500">Forecasting</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid"
        style="padding: 15px 15px; background-color: white; min-height: auto; margin-top: 15px;">
        <div class="row">
            {{-- <div class="col-12">
                <div class="card mb-3">
                    <div class="card-body" style="overflow: auto;">
                        <div id="exp_chart"></div>
                    </div>
                </div>
            </div> --}}
            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-body" style="overflow: auto;">
                        <div wire:ignore id="pred_chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-body" style="overflow: auto;">
                        <div wire:ignore id="chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.28.3/dist/apexcharts.min.js"></script>
    <script>
        // Define the chart options
        var options = {
            chart: {
                type: 'bar',
                height: 350,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '200%',
                },
            },
            title: {
                text: 'Medicine Forecasting',
                align: 'center',
                margin: 20,
            },
            dataLabels: {
                enabled: false
            },
            legend: {
                show: true
            },
            series: [],
            xaxis: {
                categories: [],
                labels: {
                    show: false
                }
            },
            yaxis: {
                title: {
                    text: 'Quantity'
                },
                // remove decimals in y-axis
                labels: {
                    formatter: function(val) {
                        return val.toFixed(0);
                    }
                }
            },
            tooltip: {
                 x: {
                        show: false
                    },
                    y: {
                        formatter: function(val, opts) {
                            var seriesName = opts.seriesName;
                            var datapointIndex = opts.dataPointIndex;
                            var datapoint = opts.w.config.series[opts.seriesIndex].data[datapointIndex];
                            var medicineName = datapoint.name;
                            var quantity = datapoint.y;
                            return '(' + quantity.toFixed(0) + ')';
                        }
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
        }

        var categoriesForecast = {!! json_encode($categoriesForecast) !!};
        var seriesForecast = Object.values({!! json_encode($seriesForecast) !!});

        options.series = seriesForecast;
        options.xaxis.categories = categoriesForecast;

        var chart = new ApexCharts(document.querySelector("#pred_chart"), options);
        chart.render();
    </script>

    <script>
        $(document).ready(function() {
            var options = {
                chart: {
                    type: 'bar',
                    height: 350,
                    width: '100%'
                },
                title: {
                    text: 'Medicines Near Expiry Date',
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
                    },
                    y: {
                        formatter: function(val, opts) {
                            var seriesName = opts.seriesName;
                            var datapointIndex = opts.dataPointIndex;
                            var datapoint = opts.w.config.series[opts.seriesIndex].data[datapointIndex];
                            var medicineName = datapoint.name;
                            var quantity = datapoint.y;
                            return '(' + quantity + ')';
                        }
                    }
                },
                legend: {
                    show: false
                }
            };

            var chart = new ApexCharts(document.querySelector("#exp_chart"), options);

            chart.render();
        });
    </script>

    <script>
        var timeline = @json($timeline);
        var series = Object.values(timeline).map(function(item) {
            return {
                name: item.name,
                data: item.data,
            };
        });
        var options = {
            chart: {
                height: 400,
                type: 'line',
                zoom: {
                    enabled: true,
                }
            },
            title: {
                text: 'Medicine Timeline',
                align: 'center',
            },
            xaxis: {
                type: 'datetime',
            },
            yaxis: {
                title: {
                    text: 'Quantity',
                }
            },
            series: series,
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
        var chart = new ApexCharts(document.querySelector('#chart'), options);
        chart.render();
    </script>
@endpush
