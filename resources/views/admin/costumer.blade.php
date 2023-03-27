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
                                    Phone
                                </th>
                                <th>
                                    Address
                                </th>
                                <th>
                                    Description
                                </th>
                                <th>
                                    Debt
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Operation
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($costumers as $costumer)
                                <tr>
                                    <td>{{$costumer->id}}</td>
                                    <td>{{$costumer->name}}</td>
                                    <td>{{$costumer->phone}}</td>
                                    <td>{{$costumer->address}}</td>
                                    <td>{{$costumer->description}}</td>
                                    <td>{{$costumer->debt}}</td>
                                    <td>{{$costumer->trust_status}}</td>
                                    <td>
                                        <form action="{{route('costumer.destroy', $costumer->id)}}" id="deleteCostumerForm" method="POST">
{{--                                            <a onclick="document.getElementById('fid').value='{{$costumer->id}}';--}}
{{--                                            document.getElementById('fname').value='{{$costumer->name}}';--}}
{{--                                            document.getElementById('fphone').value='{{$costumer->phone}}';--}}
{{--                                            document.getElementById('faddress').value='{{$costumer->address}}';--}}
{{--                                            document.getElementById('fdescription').value='{{$costumer->description}}';" id="showModal" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal2"><i class="fa fa-pencil"></i></a>--}}
{{--                                          --}}
                                            @csrf
                                            @method('DELETE')
{{--                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>--}}
                                        </form>
                                        <a href="{{route('debt_info',$costumer->id)}}" class="btn btn-primary" ><i class="fa fa-wallet"></i></a>
                                        <a onclick="document.getElementById('fid').value='{{$costumer->id}}';
                                            document.getElementById('fname').value='{{$costumer->name}}';
                                            document.getElementById('fphone').value='{{$costumer->phone}}';
                                            document.getElementById('faddress').value='{{$costumer->address}}';
                                            document.getElementById('fdescription').value='{{$costumer->description}}';" id="showModal" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal2"><i class="fa fa-pencil"></i></a>
                                        <button onclick="del()" class="btn btn-danger"><i class="fa fa-trash"></i></button>

                                    </td>
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
                    <form action="{{route('costumer.update', 1)}}" method="POST" enctype="multipart/form-data">
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
@section('script')
    <script>
        form = document.getElementById('deleteCostumerForm');
        function del(){
            Swal.fire({
                title: 'Haqiqatdanam o\'chirishni xohlaysizmi?',
                text: "O\'chirilgandan so\'ng siz uni qayta tiklay olmaysiz!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ha, o\'chirilsin!',
                cancelButtonText: 'Bekor qilish'

            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })}



    </script>

    @if (session('success'))

        <script>

            $(document).ready(function() {

                Swal.fire({
                    showConfirmButton: false,
                    timer: 2000,

                    title:'{{session('success')}}',
                    icon:'success',

                });
            });
        </script>

    @endif
@endsection

