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
        <h5 class="card-header text-center  text-dark " > <b>ADD NEW CATEGORY</b></h5>
        <div class="card-body ">
            <form action="{{route('category.store')}}" method="POST" >
                @csrf
                <div class="row">
                <div class="col-md-12 mt-3">
                            <label for="author">Author</label>
                            <select name="author" class="form-control" value="{{old('author')}}">
                                <option value="">Please Select</option>
                                @foreach($users as $user)
                                    <option value="{{$user->name}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                            <small class="text-danger">@error ('author') {{ $message }} @enderror</small>
                        </div>
                    <div class="mt-3 col-md-12">
                        <label>Blog</label>
                        <input type="text" name="blog" class="form-control" value="{{old('blog')}}">
                        <small class="text-danger">@error('blog')  {{$message}} @enderror</small>
                    </div>
                    <div class="mt-3 col-md-12">
                        <label>status</label>
                        <select name="status"  class="form-control" >
                            <option value="">Please Select</option>
                            <option value="1" @if(old("status") == 1) selected @endif>Active</option>
                            <option value="0" @if(old("status") == 2) selected @endif>Deactive</option>
                        </select>
                        <small class="text-danger">@error('status')  {{$message}} @enderror</small>
                    </div>
                    <div class="mt-3 col-md-12 mt-3">
                        <button type="submit" class="btn btn-primary btn-block ">ADD NEW</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
</div>
</div>
@endsection