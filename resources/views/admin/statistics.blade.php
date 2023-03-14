@extends('admin.layout.app')
@section('content')

    <div class="showDiagram" style="margin: 0 40px;">
        <!-- Sale & Revenue Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-6 col-xl-4">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-line fa-3x text-primary"></i>
                        <div class="ms-4">
                            <p class="mb-2">Depts of today</p>
                            <h6 class="mb-0">{{$debts_quantity}} so'm</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-bar fa-3x text-primary"></i>
                        <div class="ms-4">
                            <p class="mb-2">Payments of today</p>
                            <h6 class="mb-0">{{$paymets_quantity}} so'm</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-area fa-3x text-primary"></i>
                        <div class="ms-4">
                            <p class="mb-2">All depts</p>
                            <h6 class="mb-0">{{$costumers}} so'm </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sale & Revenue End -->
    </div>

    <!-- Sales Chart Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Debts</h6>
                    </div>
                    <canvas id="myChart"></canvas>
                </div>
            </div>

            <div class="col-sm-12 col-xl-6">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0"> Index of payments weekly </h6>
                    </div>
                    <canvas id="barChartID"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{--<div>--}}
    {{--    <h1 style="color:green">GeeksforGeeks</h1>--}}
    {{--    <h3>Chart JS Bar Chart </h3>--}}
    {{--    <div>--}}
    {{--        <canvas id="barChartID"></canvas>--}}
    {{--    </div>--}}
    {{--</div>--}}
    <!-- Sales Chart End -->

    {{--    <div class="col-sm-12 col-xl-6">--}}
    {{--        <div class="bg-light rounded h-100 p-4">--}}
    {{--            <h6 class="mb-4">Pie Chart</h6>--}}
    {{--            <canvas id="pie-chart"></canvas>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    <div class="col-sm-12 col-xl-6">--}}
    {{--        <div class="bg-light rounded h-100 p-4">--}}
    {{--            <h6 class="mb-4">Doughnut Chart</h6>--}}
    {{--            <canvas id="doughnut-chart"></canvas>--}}
    {{--        </div>--}}
    {{--    </div>--}}


    {{--    15kunlik debt va payment lar bir jadvalda --}}
    <!-- Sales Chart Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Worldwide Sales</h6>
                        <a href="">Show All</a>
                    </div>
                    <canvas id="bar-chart-grouped" width="500" height="400"></canvas>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Salse & Revenue</h6>
                        <a href="">Show All</a>
                    </div>
                    <canvas id="salse-revenue"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- Sales Chart End -->



@endsection
@section('script')

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('asset/lib/chart/chart.min.js')}}"></script>
    <script src="{{asset('asset/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('asset/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('asset/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('asset/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('asset/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('asset/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('asset/js/main.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script type="text/javascript">
        var labels =  {{ Js::from($debts_costumers_key) }};
        var users =  {{ Js::from($debts_costumers_val) }};
        //var labels = [12,22,32,42];
        //var users = [22,11,11,22];
        const data = {
            labels: labels,
            datasets: [{
                label: 'Statistics of debters',
                backgroundColor: '#1e90ff',
                borderColor: '#1e90ff',
                data: users,
            }]
        };
        const config = {
            type: 'line',
            data: data,
            options: {}
        };
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>


    <script type="text/javascript">
        @if(!isset($payments))
            @foreach($payments as $key=>$value)
            {{$payment_key[] = $key}}
            {{$payment_val[]=$value}}
            @endforeach ;
            var labels =  {{ Js::from($payment_key) }};
        var users =  {{ Js::from($payment_val) }};
        @endif
        // Bar chart
        new Chart($("#barChartID"), {
            type: 'bar',
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



        {{--    new Chart($("#week_statistic"), {--}}
        {{--    type: 'bar',--}}
        {{--    data: {--}}
        {{--    labels: @json($week_statistic_key),--}}
        {{--    datasets: @json($week_statistic_val),--}}
        {{--},--}}
        {{--    options: {--}}
        {{--    title: {--}}
        {{--    display: true,--}}
        {{--    text: 'Population growth (millions)'--}}
        {{--}--}}
        {{--}--}}
        {{--});--}}
        {{--        @dd(($week_statistic_key))--}}

{{--        var week =  {{ Js::from($week_statistic_val}};--}}
{{--        var sum =  {{ Js::from($week_statistic_key) }};--}}
{{--        //var labels = [12,22,32,42];--}}
{{--        //var users = [22,11,11,22];--}}
{{--        const data = {--}}
{{--            labels: week,--}}
{{--            datasets: [{--}}
{{--                label: 'Statistics of debters',--}}
{{--                backgroundColor: '#1e90ff',--}}
{{--                borderColor: '#1e90ff',--}}
{{--                data: sum,--}}
{{--            }]--}}
{{--        };--}}
{{--        const config = {--}}
{{--            type: 'line',--}}
{{--            data: data,--}}
{{--            options: {}--}}
{{--        };--}}
{{--        const myChart = new Chart(--}}
{{--            document.getElementById('week_statistic'),--}}
{{--            config--}}
{{--        );--}}



        new Chart(document.getElementById("week_statistic"), {
            type: 'bar',
            data: {
                labels: ["D", "S", "Ch", "P","J","Sh","Y"],
                datasets: [
                    {
                        {{ Js::from($week_statistic_val}}
                        {{ Js::from($week_statistic_key) }}
                    }, {
                        {{ Js::from($week_statistic_pay_val}}
                            {{ Js::from($week_statistic_pay_key) }}
                    }
                ]
            },
            options: {
                title: {
                    display: true,
                    text: 'Population growth (millions)'
                }
            }
        });

    </script>


@endsection
