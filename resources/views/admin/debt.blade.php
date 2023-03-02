@extends('admin.layout.app')
@section('content')
    <div role="document">
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col p-md-0" >

                        {{--                    modal uchun button--}}
                        <button type="button" id="showModal" style="margin: 30px;" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Yaratish</button>

                        <table class="table table-hover">
                            <thead>
                            <tr>

                                <th>
                                    Id
                                </th>
                                <th>
                                    Costumer's name
                                </th>
                                <th>
                                    User's name
                                </th>
                                <th>
                                    Product
                                </th>
                                <th>
                                    Quantity
                                </th>
                                <th>
                                    End day
                                </th>
                                <th>
                                    Day of purchase
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
                                    <td>{{$debt->costumer->name}}</td>
                                    <td>{{$debt->user->name}}</td>
                                    <td>{{$debt->product}}</td>
                                    <td>{{$debt->quantity}}</td>
                                    <td>{{$debt->end_day}}</td>
                                    <td>{{$debt->created_at}}</td>
                                    <td>{{$debt->status}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>


                    </div>

                </div>

            </div>
        </div>


        {{--    create modal uchun--}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('debt.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <label for="title">Enter Custumer's name</label>
                            <select class="custom-select" style="" id="selectBox" required name="costumer_id"  onchange= "desc()">
                                @foreach($costumers as $costumer)
                                    <option value="{{$costumer->id}}">{{$costumer->name}}</option>
                                @endforeach
                            </select>

                            <label for="product">Enter name of product</label>
                            <input type="text" id="product" name="product" class="form-control" required>

                            <label for="quantity">Enter quantity of product</label>
                            <input type="number" id="quantity" name="quantity" class="form-control" required>

                            <label for="end_day">Enter end day</label>
                            <input type="date" id="end_day" name="end_day" class="form-control" required>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Yopish</button>
                                <button type="submit" class="btn btn-primary">Saqlash</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <script>

            function desc(customer){

            }
        </script>
@endsection
@section('script')

@endsection
