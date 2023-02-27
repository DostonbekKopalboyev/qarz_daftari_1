@extends('admin.app')
@section('admin.index')

    <a href="{{route('admins.create')}}" class="btn btn-success" style="width:120px; margin: 50px 0 0 50px;padding:15px 25px;">Qo`shish</a>

    <div class="container">
        <table class="table table-dark table-striped mt-5 ">
            <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Phone</td>
                <td>Description</td>
                <td>Address</td>
                <td>Debt</td>
                <td>Status</td>
            </tr>
            </thead>
            <tbody>
            @foreach($customer as $customers)
                <td>{{$customers->id}}</td>
                <td>{{($customers->name)}}</td>
                <td>{{$customers->phone}}</td>
                <td >{{$customers->address}}</td>
                <td>{{$customers->description}}</td>
                <td>{{$customers->debt}}</td>
                <td>{{$customers->status}}</td>
                <td>
                    <a href="{{route('admins.edit',$customers->id)}}"><i class="fa fa-edit bg-success p-2 ml-1"></i></a>
                    <form action="{{route('admins.destroy',$customers->id)}}" method="POST" id="sovga_delete_form">
                        @csrf
                        @method('DELETE')
                    <button onclick="sovga_delete()" ><i class="fa fa-trash bg-danger p-2 ml-1" ></i></button>
                    </form>

                </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>



@endsection
