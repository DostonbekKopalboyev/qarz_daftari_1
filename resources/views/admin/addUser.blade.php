@extends('admin.layout.app')
@section('content')


<div class="container" style="margin-top: 22px">
    <div class="row">
        <div class="col-md-12">
            <h2>Add data</h2>
            <form method="post" action="{{url('store')}}">
                @csrf
                <div class="col-md-5">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter name" required>
                </div>

                <div class="col-md-5">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                </div>

                <div class="col-md-5">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                </div>

                <div class="col-md-5">
                    <label class="form-label">Role</label>
                <select class="custom-select" style="" id="selectBox" required name="role" >
                    @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
                </div>

                <button type="submit" class="btn btn-primary" style="margin: 10px;">Save</button>
                <a href="{{route('admin.index')}}" class="btn btn-danger">Back</a>
            </form>
            </form>
        </div>
    </div>
</div>

@endsection
