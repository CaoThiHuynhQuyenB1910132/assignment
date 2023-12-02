@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <div class="d-flex">
                        <div class="input-group">
                            <input type="number" class="form-control form-control-light year"  id="year" name="year">
                            <span class="input-group-text bg-primary border-primary text-white">
                                <i class="mdi mdi-calendar-range font-13"></i>
                            </span>
                        </div>
                        <button id="filter" class="btn btn-primary ms-2">
                            <i class="mdi mdi-filter"></i>
                        </button>
                    </div>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="float-end">
                        <i class="mdi mdi-account-multiple widget-icon"></i>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">Customers</h5>
                            <h3 class="my-2 py-1">{{ $users }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="float-end">
                        <i class="mdi mdi-cart-plus widget-icon"></i>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h5 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">Orders</h5>
                            <h3 class="my-2 py-1">{{ $newOrders }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="float-end">
                        <i class="mdi mdi-currency-usd widget-icon"></i>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h5 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">Revenue</h5>
                            <h3 class="my-2">{{ CurrencyHelper::format($monthlyRevenue) }}</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-success me-2"> Revenue of Month: {{ $month }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="float-end">
                        <i class="mdi mdi-percent widget-icon"></i>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">Bounce Rate</h5>
                            <h3 class="my-2">{{ $bounceRate }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card card-h-100">
                <div class="card-body">
                    <h4 class="header-title">Revenue of years</h4>
                    <canvas id="revenue"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Total Sales</h4>
                    <canvas id="doughnutChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Total Customer</h4>
                    <canvas id="getTopCustomersChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const year = flatpickr("#year", {
            mode: "single",
            dateFormat: "Y",
            onChange: function(selectedDates, dateStr, instance) {
                const selectedYear = selectedDates[0].getFullYear();
                $("#year").val(selectedYear);
            }
        });
        $(".input-group-text").on("click", function() {
            year.open();
        });

        $(document).ready(function() {
            var getId = document.getElementById('revenue');

            var chart = new Chart(getId, {
                type: 'bar',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'Revenue of months',
                        backgroundColor: '#757cf5',
                        data: [],
                    }]
                },

            });

            function loadChart() {
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: '{{ route('revenue') }}',
                    data: {
                        year: '',
                    },
                    success: function(response) {
                        chart.data.labels = response.labels
                        chart.data.datasets[0].data = response.data;
                        chart.update();
                    }
                });
            }

            $('#filter').click(function(e) {
                e.preventDefault();

                var year = $('#year').val();
                console.log(year)

                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: '{{ route('revenue') }}',
                    data: {
                        year: year,
                    },
                    success: function(response) {
                        console.log(response)
                        chart.data.labels = response.labels
                        chart.data.datasets[0].data = response.data;
                        chart.update();
                    },
                    error: function (err) {
                        console.log(err)
                    }
                });
            });

            loadChart();
        });
    </script>
    <script>
        $(document).ready(function() {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: '{{ route('top.sale') }}',
                success: function(response) {
                    const ctx = document.getElementById('doughnutChart');
                    new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: response.labels,
                            datasets: [{
                                label: ' Phần trăm',
                                data: response.data,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.6)',
                                    'rgba(54, 162, 235, 0.6)',
                                    'rgba(255, 206, 86, 0.6)',
                                    'rgba(75, 192, 192, 0.6)',
                                    'rgba(153, 102, 255, 0.6)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },

                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: '{{ route('top.customer') }}',
                success: function(response) {
                    const ctx = document.getElementById('getTopCustomersChart');

                    new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: response.labels,
                            datasets: [{
                                label: ' Phần trăm',
                                data: response.data,
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                }
            });
        });
    </script>

@endsection
