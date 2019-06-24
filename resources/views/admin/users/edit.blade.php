@extends('layouts.admin')

@section('content')
    <h1>Edit Users</h1>
    <div class="col-sm-3">
        <img src="{{$user->photo? $user->photo->file:'https://via.placeholder.com/150'}}" alt="" class="img-responsive img-rounded">

    </div>
    
    <div class="col-sm-9">
        {!!Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update', $user->id],'files'=>true])!!}

            <div class="form-group">
                {!!Form::label('name','Name:')!!}
                {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter name...'])!!}
            </div>

            <div class="form-group">
                {!!Form::label('email','Email:')!!}
                {!!Form::email('email',null,['class'=>'form-control','placeholder'=>'Enter email...'])!!}
            </div>

            <div class="form-group">
                {!!Form::label('role_id','Role:')!!}
                {!!Form::select('role_id',$roles,null,['class'=>'form-control','placeholder'=>'Select role...'])!!}
            </div>

            <div class="form-group">
                {!!Form::label('is_active','Status:')!!}
                {!!Form::select('is_active',array(1=>'Active',0=>'No Active'),0,['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!!Form::label('photo_id','Photos:')!!}
                {!!Form::file('photo_id',null,['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!!Form::label('password','Password:')!!}
                {!!Form::password('password',['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!!Form::submit('Update User',['class'=>'btn btn-success col-sm-3'])!!}
            </div>
        {!!Form::close()!!}

        {!!Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id]])!!}
            <div class="form-group">
                {!!Form::submit('Delete User',['class'=>'btn btn-danger col-sm-3','style'=>'padding-left=20px'])!!}
            </div>

        {!!Form::close()!!}

    <div class="">
        <strong>@include('includes.form_errors')</strong>
    </div>
   
@endsection