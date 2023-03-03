@extends('admin.layout.app')
@section('content')


    <div class="container">
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->

            <div class="table">
                <a class="btn btn-danger" href="{{url('addUser')}}" style="margin: 15px">Add</a>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Ism</th>
                        <th scope="col">Email</th>
                        <th scope="col">Operation</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a class="btn btn-warning" href="{{url('editUser/'.$user->id)}}"> <i class="fa fa-pencil"></i> </a>
                                <a class="btn btn-danger" href="{{url('destroy/'.$user->id)}}"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>



        </div>
        <!-- / Content -->
    </div>


@endsection
