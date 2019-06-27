@extends('layouts.admin')

@section('content')
    
    @if(count($comments) > 0)
    <h3 style="color: #2b542c">Post Comments</h3>
<table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Post Title</th>
        <th>Author</th>
        <th>Email</th>
        <th>Comments</th>
        <!-- <th>Photo</th> -->
        <th>Commented</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

    @foreach($comments as $comment)
      <tr>
        <td>{{$comment->id}}</td>
        <td>{{$comment->post->title}}</td>
        <td>{{$comment->author}}</td>
        <td>{{$comment->email}}</td>
        <td>{{str_limit($comment->body,20)}}</td>
        
        <td>{{$comment->created_at->diffForHumans()}}</td>
        <td>
            
            
            {!!Form::open(['method'=>'DELETE','action'=>['PostCommentsController@destroy',$comment->id]])!!}
            <div class="form-inline">
                <a  class="btn btn-info" href="{{route('home.post',$comment->post->id)}}">View</a>
                {!!Form::submit('Delete',['class'=>'btn btn-warning'])!!}
            </div>
            {!!Form::close()!!}
        </td>
      </tr>
        @endforeach

        @else
            <h3 class="text-center text-warning">Oops! this post have no any comments</h3>
      @endif
    </tbody>
  </table>
@stop