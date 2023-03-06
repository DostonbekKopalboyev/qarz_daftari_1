@extends('admin.layout.app')
@section('content')

    <div role="document">
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col p-md-0" >

                        {{--                    modal uchun button--}}
                        <a href="{{url('costumer')}}" type="button"  style="margin: 30px;" class="btn btn-success" >Orqaga</a>

                        <table class="table table-hover">
                            <thead>
                            <tr>

                                <th>
                                    Id
                                </th>
                                <th>
                                    User's name
                                </th>
                                <th>
                                    Product
                                </th>
                                <th>
                                    Debts
                                </th>
                                <th>
                                    date
                                </th>
                                <th>
                                    Status
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($debts as $debt)
                                <tr>
                                    <td>{{$debt->id}}</td>
                                    <td>{{$debt->user->name}}</td>
                                    <td>{{$debt->product}}</td>
                                    <td>{{$debt->quantity}}</td>
                                    <td>{{$debt->created_at}}</td>
                                    <td>{{$debt->status}}</td>

                                </tr>
                            @endforeach
                            <tr>
                                <th colspan="3" style="text-align: center">Jami</th>
                                <th colspan="3" style="text-align: center">15000</th>
                            </tr>
                            </tbody>
                        </table>

                        <p>Paymet</p>

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>
                                    Id
                                </th>
{{--                                <th>--}}
{{--                                    Costumer's name--}}
{{--                                </th>--}}
                                <th>
                                    User's name
                                </th>
                                <th>
                                    Quantity
                                </th>
                                <th>
                                    Day of purchase
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payments as $payment)
                                <tr>
                                    <td>{{$payment->id}}</td>
{{--                                    <td>{{$payment->costumer->cname}}</td>--}}
                                    <td>{{$payment->user->name}}</td>
                                    <td>{{$payment->quantity}}</td>
                                    <td>{{$payment->created_at}}</td>
                                </tr>
                            @endforeac
                            <tr>
                                @foreach($payments as $payment)
                                <th colspan="2" style="text-align: center">Jami</th>
                                <th colspan="2" style="text-align: center">{{$payment->quantity+=$payment->quantity}}</th>
                                @endforeach
                            </tr>
                            </tbody>
                        </table>


                    </div>

                </div>

            </div>
        </div>






@endsection
