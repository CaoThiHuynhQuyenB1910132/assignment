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
        <div class="col-xl-5 col-lg-6">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-account-multiple widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Customers</h5>
                            <h3 class="mt-3 mb-3">{{ $users }}</h3>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-cart-plus widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Orders</h5>
                            <h3 class="mt-3 mb-3">{{ $newOrders }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-currency-usd widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Revenue</h5>
                            <h3 class="mt-3 mb-3">{{ CurrencyHelper::format($monthlyRevenue) }}</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-nowrap">Revenue of Month: {{ $month }}</span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-percent widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Growth">Bounce Rate</h5>
                            <h3 class="mt-3 mb-3">+ {{ $bounceRate }}</h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-xl-7 col-lg-6">
            <div class="card card-h-100">
                <div class="card-body">
                    <canvas id="revenue"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-lg-6 order-lg-1">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Total Sales</h4>

                    <canvas id="doughnutChart"></canvas>

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
        const categories = ['Category A', 'Category B', 'Category C', 'Category D', 'Category E'];
        const percentages = [20, 30, 15, 10, 25];

        // Lấy thẻ canvas từ DOM
        const canvas = document.getElementById('doughnutChart');

        // Tạo biểu đồ Doughnut bằng Chart.js
        const ctx = canvas.getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: categories,
                datasets: [{
                    data: percentages,
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
                responsive: true
            }
        });
    </script>
@endsection
