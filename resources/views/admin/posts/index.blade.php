@extends('layouts.admin')

@section('content')
  @if(Session::has('deleted_post'))
      <p class="bg-danger">{{session('deleted_post')}}</p>
    @endif
    <h1>All Posts</h1>
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
        <th>Action</th>
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
        <td>{{str_limit($post->body,20)}}</td>
        <td><img height='50' class="img-rounded" src="{{$post->photo ? $post->photo->file:'https://unlimitedpassion.co.uk/wp-content/uploads/2016/06/placeholder4.png'}}"></td>
        <td>{{$post->created_at->diffForHumans()}}</td>
        <td>{{$post->updated_at->diffForHumans()}}</td>
        <td>
          <a class="btn btn-info" href="{{route('home.post',$post->id)}}">View</a>
          <a class="btn btn-info" href="{{route('admin.comments.show',$post->id)}}">Cmt</a>
          <a class="btn btn-danger" href="{{route('admin.posts.edit',$post->id)}}">Edit</a></td>
      </tr>
        @endforeach
      @endif
    </tbody>
  </table>

@stop