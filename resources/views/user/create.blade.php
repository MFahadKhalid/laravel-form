@extends('layouts.scaffold')
@section('content')
<style>
  body{
    background-color: #E9ECEF;
  }
</style>
<div style="margin-left: 18%;" class="container mt-5">
<div class="container mt-5">
    <div class="row">
            <div class="col-md-12">
            </div>
            @if(Session::has('error'))
        <div class="col-md-12 alert alert-danger alert-dismissible fade show mb-5 mt-5" role="alert">
        {{Session::get('error')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
    </div>
    <div class="shadow-lg card">
        <h5 class="card-header text-center  text-dark " > <b>Create User</b></h5>
        <div class="card-body ">
            <form action="{{route('admin.users.store')}}" method="POST" >
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name"  required>
                    </div>
                    <div class="col-md-12">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email"  required>
                    </div>
                    <div class="col-md-12">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password"  required>
                    </div>
                    <div class="col-md-12">
                        <label for="">Role</label>
                        <select name="role_id" id="" class="form-control">
                            <option value="2">Reader</option>
                            <option value="3">Author</option>
                        </select>
                    </div>
                    <div class="col-md-12 mt-3">
                        <button type="submit"   class="btn btn-primary btn-block">CREATE USER</button>
                    </div>
                </div>
            </form>

        </div>
      </div>
</div>
</div>
@endsection
