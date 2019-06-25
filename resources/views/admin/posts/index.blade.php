@extends('layouts.admin')

@section('content')
    <h1>Posts</h1>
    <!--displaying all data form database-->
    <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Owner</th>
        <th>Category</th>
        <th>Title</th>
        <th>Descriptions</th>
        <th>Photo</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
    @if($posts)
        @foreach($posts as $post)

      <tr>
        <td>{{$post->id}}</td>
        <td>{{$post->user->name}}</td>
        <td>{{$post->category ?$post->category->name :'Unknow'}}</td>
        <td>{{$post->title}}</td>
        <td>{{$post->body}}</td>
        <td><img height='50' class="img-rounded" src="{{$post->photo ? $post->photo->file:'https://via.placeholder.com/150'}}"></td>
        <td>{{$post->created_at->diffForHumans()}}</td>
        <td>{{$post->updated_at->diffForHumans()}}</td>
        <td><a class="btn btn-danger" href="{{route('admin.posts.edit',$post->id)}}">Edit</a></td>
      </tr>
        @endforeach
      @endif
    </tbody>
  </table>

@stop