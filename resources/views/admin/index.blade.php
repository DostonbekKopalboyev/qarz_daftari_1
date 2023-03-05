@extends('admin.layout.app')
@section('content')

    <div role="document">
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col p-md-0" >

                        {{--                    modal uchun button--}}
                        <a href="{{url('addUser')}}"  style="margin: 30px;" class="btn btn-success">Yaratish</a>

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
                                        <form action="{{url('destroy/'.$user->id)}}" id="deleteCostumerForm" method="GET">

                                        </form>
                                        <a class="btn btn-warning" href="{{url('editUser/'.$user->id)}}"> <i class="fa fa-pencil"></i> </a>
                                        <button onclick="del()"  class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>

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
