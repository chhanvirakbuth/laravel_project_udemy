@extends('layouts.blog-post')

@section('title')
    <title>{{$post->title}}</title>
   
@endsection
@section('content')
<div class="container">

<div class="row">

    <!-- Blog Post Content Column -->
    <div class="col-lg-8">

        <!-- Blog Post -->

        <!-- Title -->
        <h2><strong>{{$post->title}}</strong></h2>

        <!-- Author -->
        <p class="lead">
            by <a href="https://www.facebook.com/crushmii" target="_blank">{{$post->user->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> Posted  {{$post->created_at->diffForHumans()}}</p>

        <hr>

        <!-- Preview Image -->
    
        <img 
        style="box-shadow: rgba(0, 0, 0, 0.1) 0 5px 20px 0;"
        class="img-responsive img-rounded" src="{{$post->photo ? $post->photo->file:'http://placehold.it/900x300'}}" alt="">

        <hr>

        <!-- Post Content -->
        <p>{{$post->body}}</p>
             
        <hr>

        <!-- Blog Comments -->

        <!-- Comments Form -->
        @if(Auth::check())
        <div class="well">
            <h4>Leave a Comment:</h4>
            {!!Form::open(['method'=>'POST','action'=>'PostCommentsController@store'])!!}

            <input type="hidden" name="post_id" value="{{$post->id}}">

                <div class="form-group">
                    {!!Form::textarea('body',null,['class'=>'form-control','rows'=>3])!!}
                </div>

                <div class="form-group">
                    {!!Form::submit('Comment Now',['class'=>'btn btn-success'])!!}
                </div>
            {!!Form::close()!!}

            @if(Session::has('comment_message'))
                <p class="alert alert-success">{{session('comment_message')}}</p>

            @endif
        </div>

        @endif
        <hr>

        <!-- Posted Comments -->

        <!-- Comment -->
        @if($comments)
        @foreach($comments as $comment)
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object img-rounded" height="64" src="{{$comment->photo ? :'http://placehold.it/64x64'}}" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{$comment->author}}
                    <small>{{$comment->created_at->diffForHumans()}}</small>
                </h4>
                <p>{{$comment->body}}</p>
            </div>
        </div>
        @endforeach
        @endif
                <!-- Nested Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Nested Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>
                <!-- End Nested Comment -->
            </div>
        </div>

    </div>

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">

        <!-- Blog Search Well -->
        <div class="well">
            <h4>Blog Search</h4>
            <div class="input-group">
                <input type="text" class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <span class="glyphicon glyphicon-search"></span>
                </button>
                </span>
            </div>
            <!-- /.input-group -->
        </div>

        <!-- Blog Categories Well -->
        <div class="well">
            <h4>Blog Categories</h4>
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                       @if($categories)
                            @foreach($categories as $category)
                            <li><a href="#">{{$category->name}}</a></li>
                            @endforeach
                       @endif
                    </ul>
                </div>
            </div>
            <!-- /.row -->
        </div>

        <!-- Side Widget Well -->
        <div class="well">
            <h4>Side Widget Well</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
        </div>

    </div>

</div>
<!-- /.row -->

<hr>

<!-- Footer -->
<footer>
    <div class="row">
        <div class="col-lg-12">
            <p>Copyright &copy; Your Website 2014</p>
        </div>
    </div>
    <!-- /.row -->
</footer>

</div>
@stop