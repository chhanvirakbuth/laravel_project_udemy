@extends('layouts.admin')

@section('content')
    <h1>Edit Users</h1>
    <div class="col-sm-3">
        <img src="{{$post->photo? $post->photo->file:'https://unlimitedpassion.co.uk/wp-content/uploads/2016/06/placeholder4.png'}}" alt="" class="img-responsive img-rounded">

    </div>
    <div class="col-sm-9">
    {!!Form::model($post,['method'=>'PATCH','action'=>['AdminPostsController@update', $post->id],'files'=>true])!!}

            <div class="form-group">
                {!!Form::label('title','Post Title:')!!}
                {!!Form::text('title',null,['class'=>'form-control','placeholder'=>'post title...'])!!}
            </div>

            <div class="form-group">
                {!!Form::label('category_id','Category:')!!}
                {!!Form::select('category_id',$categories,null,['class'=>'form-control','placeholder'=>'Choose Categories..'])!!}
            </div>

            <div class="form-group">
                {!!Form::label('photo_id','Photos:')!!}
                {!!Form::file('photo_id',null,['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!!Form::label('body','Discription:')!!}
                {!!Form::textarea('body',null,['class'=>'form-control','placeholder'=>'Enter discription...','row'=>3])!!}
            </div>

            <div class="form-group">
                {!!Form::submit('Update Post',['class'=>'btn btn-success col-sm-3'])!!}
            </div>
        {!!Form::close()!!}

        {!!Form::open(['method'=>'DELETE','action'=>['AdminPostsController@destroy',$post->id]])!!}
            <div class="form-group">
                {!!Form::submit('Delete Post',['class'=>'btn btn-danger col-sm-3','style'=>'padding-left=20px'])!!}
            </div>

        {!!Form::close()!!}

        <div class="">
            <strong>@include('includes.form_errors')</strong>
        </div>
   </div>
@endsection