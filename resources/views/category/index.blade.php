@extends('layouts.scaffold')
@section('content')
<style>
  body{
    background-color: #E9ECEF;
  }
</style>
<div style="margin-left: 18%; " class="container mt-5">
    <div class="row">
        <h1 class="text-success">Category</h1>
        <div class="col-md-12">
            <a href="{{route('category.create')}}"><button class="btn btn-info float-right mb-5">Add More Data</button></a>
        </div>
        @if(Session::has('success'))
        <div class="col-md-12 alert alert-info alert-dismissible fade show mb-5 mt-5" role="alert">
        {{Session::get('success')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

    </div>
    <table class="shadow-lg table table-scripted table-hover bg-light">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{($category->id)}}</td>
                <td>{{($category->name)}}</td>
                <td>
                    @if($category->status == 1)
                    <span class="bg-success rounded p-2">Active</span>
                    @else
                    <span class="bg-danger rounded p-2">Deactive</span>
                    @endif
                </td>
                <td>
                    <a href="{{route('category.edit',$category->id)}}"><img src="{{asset('assets/img/b_edit.png')}}" alt="b_edit"> Edit</a>
                    &nbsp;|&nbsp;
                    <a href="{{route('category.delete',$category->id)}}"><img src="{{asset('assets/img/b_drop.png')}}" alt="b_drop"> Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection                     