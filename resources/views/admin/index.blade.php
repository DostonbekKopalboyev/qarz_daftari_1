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
                                <a class="btn btn-danger" href="{{url('editUser/'.$user->id)}}">  <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAN1JREFUSEvFlO0NwjAMBa8bwCQwAkzCKjACE8EIsAkbgJ6USKEkdj5a0T+V2vQufnY6sfI1rcxnRLABToDuV+CV22yvQNAbsA/QB3DMSXoEKfwZBDsgK2kVzOGHILgDklyAcxpVi6AUi3gxrm6BFYsE6oXiUkVfza6pwItFgixcLzxBDq4dlp7/TKolGIZbFSwCLwkWg5cEOjCa6bRx1ZnPm5DrwTss2oaR64aXKogCyYfgniCttjjn3u/eiih+2w2vOWjeBt333kl2Ad6Cmog8hjmZfxG07thcv3oPPg35Shmq75wnAAAAAElFTkSuQmCC"/></a>
                                <a class="btn btn-warning" href="{{url('destroy/'.$user->id)}}"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAJBJREFUSEvtlcERQDAQRV8qUQI6UQIdKEEnlKATdEAljAuTmLUZkzhlz3/+332b2Rgil4nsj09ADfRCIw0wvDWpBRTApExZArOkcQP2QMgu398DAg1w20g7+Irq4ZcC3J0lROorTogSoptA9Fu0AplK3BYswPlBWSUduwrogNwzZANaYPQN8PTVZdqfrDsoigM2cxgZ2SeiHAAAAABJRU5ErkJggg=="/></i></a>
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
