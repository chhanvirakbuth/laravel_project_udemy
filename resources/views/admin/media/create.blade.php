
@extends('layouts.admin')
@section('content')
    <h1>Upload Media</h1>
    {!!Form::open(['method'=>'POST','action'=>'AdminMediaController@store','files'=>true])!!}

        <div class="form-group">
            {!!Form::label('photo_id','Photos:')!!}
            {!!Form::file('photo_id',null,['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!!Form::submit('Upload Images',['class'=>'btn btn-success'])!!}
        </div>
    {!!Form::close()!!}
@stop