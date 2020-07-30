@extends('layouts.app')

@section('contant')




        {!! Form::open(['method'=>'post','action'=>'PostController@store']) !!}

    {{--  <form method="POST" action="/posts" >  --}}
        @csrf

        <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
        {!! Form::label('content', 'Content') !!}
        {!! Form::text('content', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::file('file', ['class' => 'form-control']) !!}
            </div>
    
        {!! Form::submit('Create Post', ['class' => 'btn btn-info pull-right']) !!}
    
    {{--  </form>  --}}
        {!!Form::close()!!}


        @if (count($errors)>0)

            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        {{$error}}
                    @endforeach
                </ul>

            </div>
            
        @endif

@endsection