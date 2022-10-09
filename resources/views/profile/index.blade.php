@extends('layouts.scaffold')
@section('content')
    <div class="container" style="margin-left: 18%;">
    <div class="row">
            @if(Session::has('success'))
            <div class="col-md-12">
                <div class="alert alert-success">{{Session::get('success')}}</div>
            </div>
            @endif 
    </div>
        <table class="table mt-5 table-bordered">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Thumbnail</th>
                <th>About</th>
                <th>Facebook</th>
                <th>Google</th>
                <th>Twitter</th>
                <th>LinkedIn</th>
                <th>Action</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td style="width: 10%;">
                        <img src="{{asset('upload/thumbnail/'.$user->thumbnail)}}" alt="" class="" height="100%" width="100%">
                    </td>
                    <td>{{ $user->about }}</td>
                    <td>{{ $user->facebook }}</td>
                    <td>{{ $user->google }}</td>
                    <td>{{ $user->twitter }}</td>
                    <td>{{ $user->linkedin }}</td>
                    <td>
                        <a class="text-info" href="{{ route('profile.edit' , $user->id) }}"><img src="{{asset('assets/img/b_edit.png')}}" alt=""> Edit</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection