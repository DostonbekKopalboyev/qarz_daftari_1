@extends('admin.layout.app')
@section('content')

    <div class="container" style="margin-top: 22px">
        <div class="row">
            <div class="col-md-12">
                <h2>Update data</h2>

                <form method="post" action="{{url('update')}}">
                    @csrf
                    <input value="{{$users->id}}" style="display: none" required name="id">
                    <div class="col-md-5">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter name"
                               value="{{$users->name}}">
                    </div>

                    <div class="col-md-5">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email"
                               value="{{$users->email}}">
                    </div>

                    <div class="col-md-5">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password">
                    </div>

                    <button type="submit" class="btn btn-primary" style="margin: 10px;">Update</button>
                    <a href="{{url('admins')}}" class="btn btn-danger">Back</a>
                </form>
                </form>
            </div>
        </div>
    </div>

@endsection
