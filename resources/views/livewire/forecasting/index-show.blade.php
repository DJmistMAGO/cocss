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
                <div class="mb-3" style="overflow: auto;">
                    <div id="exp_chart">
                    </div>
                </div>
            </div>
            <div class="col-6">
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
                                <td>{{ $medicine->exp_date->format('YF d, Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">No Medicine Near Expiry Date</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
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
                    categories: <?php echo json_encode($categories); ?>
                },
            }

            var chart = new ApexCharts(document.querySelector("#exp_chart"), options);

            chart.render();
        });
    </script>
@endpush
