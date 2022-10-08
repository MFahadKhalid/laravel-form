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
        <div class="col-md-12 alert alert-danger alert-dismissible fade show mb-5 mt-5" role="alert">
        {{Session::get('error')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
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
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}">
                            <small class="text-danger">@error ('name') {{ $message }} @enderror</small>
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