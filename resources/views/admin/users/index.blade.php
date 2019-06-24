@extends('layouts.admin')

@section('content')
    <h1>Users</h1>
    <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Photos</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
    @if($users)
        @foreach($users as $user)

      <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->role->name}}</td>
        <td>{{$user->is_active == 1 ? 'Active':'Not Active'}}</td>
        <td><img height='50' class="img-rounded" src="{{$user->photo ? $user->photo->file:'https://via.placeholder.com/150'}}"></td>
        <td>{{$user->created_at->diffForHumans()}}</td>
        <td>{{$user->updated_at->diffForHumans()}}</td>
        <td><a class="btn btn-danger" href="{{route('admin.users.edit',$user->id)}}">Edit</a></td>
      </tr>
        @endforeach
      @endif
    </tbody>
  </table>
@endsection