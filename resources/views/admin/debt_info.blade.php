@extends('admin.layout.app')
@section('content')

    <div role="document">
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col p-md-0" >

                        {{--                    modal uchun button--}}
                        <a href="{{url('costumer')}}"  style="margin: 30px;" class="btn btn-success" > <-- Back </a>
                        <a href=""   class="btn btn-danger" >History of debts</a>
                        <a href=""   class="btn btn-warning" >History of payments</a>

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
                    <form action="{{route('costumer.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <label for="name">Enter Costumer's name</label>
                            <input type="text" id="name" name="name" class="form-control" required>

                            <label for="phone">Enter Costumer's phone</label>
                            <input type="number" id="phone" name="phone" class="form-control" required>

                            <label for="address">Enter Costumer's address</label>
                            <input type="text" id="address" name="address" class="form-control">

                            <label for="description">Enter Costumer's description</label>
                            <input type="text" id="description" name="description" class="form-control">

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Yopish</button>
                                <button type="submit" class="btn btn-primary">Saqlash</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>


        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('costumer.update',1)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <input id="fid" style="display: none" name="id" required>

                            <label for="name">Update Costumer's name</label>
                            <input type="text" id="fname" name="name" class="form-control" required>

                            <label for="phone">Update Costumer's phone</label>
                            <input type="number" id="fphone" name="phone" class="form-control" required>

                            <label for="address">Update Costumer's address</label>
                            <input type="text" id="faddress" name="address" class="form-control" required>

                            <label for="description">Update Costumer's description</label>
                            <input type="text" id="fdescription" name="description" class="form-control">

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Yopish</button>
                                <button type="submit" class="btn btn-primary">Tahrirlash</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection
