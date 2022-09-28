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
                    <a href="{{route('category.index')}}" class="btn btn-primary float-right mb-2"> VIEW ALL</a>
            </div>
            @if(Session::has('error'))
            <div class="col-md-12">
                <div class="alert alert-danger">{{Session::get('error')}}</div>
            </div>
            @endif
    </div>
    <div class="shadow-lg card">
        <h5 class="card-header">Edit Category</h5>
        <div class="card-body" >
            <form action="{{route('category.update',$category->id)}}" method="POST">
                @csrf
                <div class="row">
                <div class="col-md-12 mt-3">
                            <label for="author">Author</label>
                            <select name="name" class="form-control"  value="{{old('name')}}">
                                <option value="">Please Select</option>
                                @foreach($users as $user)
                                    <option value="{{$user->name}}" @if($user->name == $category->name) selected @endif >{{$user->name}}</option>
                                @endforeach
                            </select>
                            <small class="text-danger">@error ('name') {{ $message }} @enderror</small>
                        </div>
                    <div class="mt-3 col-md-12">
                        <label>Blog</label>
                        <input type="text" name="blog" class="form-control"  value="{{old('blog' ,$category->blog)}}">
                        <small class="text-danger">@error('blog')  {{$message}} @enderror</small>
                    </div>
                    <div class="mt-3 col-md-12">
                        <label>Status</label>
                        <select name="status"  class="form-control"  value="">
                            <option value="">Please Select</option>
                            <option value="1" @if(old("status",$category->status) == 1) selected @endif>Active</option>
                            <option value="0" @if(old("status",$category->status) == 0) selected @endif>Deactive</option>
                        </select>
                        <small class="text-danger">@error('status')  {{$message}} @enderror</small>
                    </div>
                    <div class="mt-3 col-md-12 mt-3">
                        <button type="submit"  class="btn btn-primary btn-block">UPDATE</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
</div>
</div>
@endsection