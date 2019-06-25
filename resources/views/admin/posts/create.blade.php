@extends('layouts.admin')

@section('content')
    <h1>Create Post</h1>
    {!!Form::open(['method'=>'POST','action'=>'AdminPostsController@store','files'=>true])!!}

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
            {!!Form::submit('Create Post',['class'=>'btn btn-success'])!!}
        </div>
    {!!Form::close()!!}
    @include('includes.form_errors')
@endsection