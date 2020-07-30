@extends('layouts.app')

@section('contant')




    <h1>Edit Post</h1>



    {!! Form::model($post,['method'=>'PATCH','action'=>['PostController@update',$post->id]]) !!}

        @csrf

        <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
        {!! Form::label('content', 'Content') !!}
        {!! Form::text('content', null, ['class' => 'form-control']) !!}
        </div>

        {!! Form::submit('Edit Post', ['class' => 'btn btn-info pull-right']) !!}
    
    {{--  </form>  --}}
        {!!Form::close()!!}

        {!! Form::open(['method'=>'DELETE','action'=>['PostController@update',$post->id]]) !!}

        {!! Form::submit('Delete Post', ['class' => 'btn btn-danger pull-right']) !!}

        {!!Form::close()!!}

        {{--  <form method="post" action="/posts/{{$post->id}}" >
        @csrf

        <input type="hidden" name="_method" value="PUT">
        <input type="text" name="title" placeholder="Enter Title" value="{{$post->title}}">

        <input type="text" name="content" placeholder="Enter Content" value="{{$post->content}}">

        <input type="submit" name="submit" value="submit">
    </form>

    <form method="post" action="/posts/{{$post->id}}" >
        @csrf
        <input type="hidden" name="_method" value="DELETE">
 
        <input type="submit" value="delete">
    </form>
  --}}


@endsection