@extends('layouts.admin')

@section('content')
<h1>All Categories</h1>

    <div class="col-sm-6">
        {!!Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store'])!!}
        <div class="form-group">
            {!!Form::label('name','Name:')!!}
            {!!Form::text('name',null,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!!Form::Submit('Create Now',['class'=>'btn btn-success col-sm-6'])!!}
        </div>

        {!!Form::close()!!}
    </div>
  
   <div class="col-sm-6">
   @if($categories)
    <table class="table table-hover">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Created Date</th>
            <th>Edit</th>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->created_at ? $category->created_at->diffForHumans():'Unkown Date'}}</td>
                    <td><a class="btn btn-danger" href="{{route('admin.categories.edit',$category->id)}}">Edit</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
   </div>

    
@stop