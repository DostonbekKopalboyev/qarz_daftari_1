@extends('admin.layout.app')
@section('content')

    <div class="showDiagram" style="margin: 0 40px;">
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-6 col-xl-4">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-line fa-3x text-primary"></i>
                        <div class="ms-4">
                            <p class="mb-2">Depts of today</p>
                            <h6 class="mb-0">

                                <span class="money">{{$debts_quantity}}</span> so'm</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-bar fa-3x text-primary"></i>
                        <div class="ms-4">
                            <p class="mb-2">Payments of today</p>
                            <h6 class="mb-0"> <span class="money">{{$paymets_quantity}}</span> so'm</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-area fa-3x text-primary"></i>
                        <div class="ms-4">
                            <p class="mb-2">All depts</p>
                            <h6 class="mb-0"> <span class="money">{{$costumers}}</span> so'm </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sales Chart Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-sm-12 col-xl-6">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Last 7 days statistis</h6>
                    </div>
                    <canvas id="week_statistics" ></canvas>
                </div>
            </div>

            <div class="col-sm-12 col-xl-6">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Index of payments weekly</h6>
                    </div>
                    <canvas id="barChartID" ></canvas>
                </div>
            </div>

        </div>
    </div>

@endsection
@section('script')


    <script type="text/javascript">

        {{--var debts_quantity =  {{ Js::from($debts_quantity) }};--}}

        var labels =  {{ Js::from($debts_costumers_key) }};
        var users =  {{ Js::from($debts_costumers_val) }};
        // Bar chart
        new Chart($("#barChartID"), {
            type: 'line',
            options: {},
            data: {
                labels: labels,
                datasets: [
                    {
                        label: "Weekly payments",
                        backgroundColor: [ "#1e90ff"],
                        data: users,
                    }
                ]
            }
        });
    </script>

    <script type="text/javascript">

        var labels =  {{ Js::from($statistic_key) }};
        var users1 =  {{ Js::from($dstatistic_val) }};
        var users2 =  {{ Js::from($pstatistic_val) }};

        new Chart($("#week_statistics"), {
            type: 'bar',
            options: {},
            data: {
                labels: labels,
                datasets: [
                    {
                        label: "Weekly debts",
                        backgroundColor: [ "#1e90ff"],
                        data: users1,
                    },
                    {
                        label: "Weekly payments",
                        backgroundColor: [ "rgb(255, 0, 0)"],
                        data: users2,
                    }
                ]
            }
        });
    </script>
    <script>
        $('.money').simpleMoneyFormat();
        console.log($('.money').text());
    </script>

@endsection
{{--toLocaleString()--}}
