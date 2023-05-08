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
            <div class="col-6">
                <div class="card mb-3">
                    <div class="card-body" style="overflow: auto;">
                        <div id="exp_chart"></div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card mb-3">
                    <div class="card-body" style="overflow: auto;">
                        <div wire:ignore id="chart"></div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div>
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Medicine</th>
                        <th>Quantity</th>
                        <th>Exp. Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($medicines as $medicine)
                        <tr>
                            <td>{{ $medicine->med_name }}</td>
                            <td>{{ $medicine->med_quantity }}</td>
                            <td>{{ $medicine->exp_date->format('F d, Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No Medicine Near Expiry Date</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div> --}}
    </div>
</div>

@push('scripts')
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
        var options = {
            chart: {
                type: 'line'
            },
            series: [{
                name: 'Medicine Quantity',
                data: <?php echo json_encode($chartData['series']); ?>
            }],
            xaxis: {
                categories: <?php echo json_encode($chartData['labels']); ?>
            }
        }

        var chart = new ApexCharts(document.querySelector("#chart"), options);

        chart.render();
    </script>

    //
    <script>
        //     var orders = @json($orders);

        //     var options = {
        //         chart: {
        //             type: 'bar',
        //             height: 350,
        //             width: '100%',
        //         },

        //         series: [{
        //             name: 'Order Quantity',
        //             data: orders.map(order => order.quantity)
        //         }],
        //         xaxis: {
        //             categories: orders.map(order => order.name),
        //             labels: {
        //                 show: false
        //             }
        //         },
        //         title: {
        //             text: 'Medicines to Order',
        //             align: 'center',
        //             margin: 20,
        //         },
        //         tooltip: {
        //             y: {
        //                 formatter: function(val) {
        //                     return val + " pcs"
        //                 }
        //             }
        //         },
        //         legend: {
        //             show: true,
        //             position: 'bottom',
        //         }
        //     }

        //     var chart = new ApexCharts(document.querySelector("#chart"), options);

        //     chart.render();
        // 
    </script>
@endpush
