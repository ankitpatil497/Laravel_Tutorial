@extends('layouts.app')

@section('contant')

        <ul>
            <li>
              <h1><a href="{{route('posts.edit',$post->id)}}"> {{$post->title}}</a></h1>
            </li>
            <li>
                <h2>{{$post->content}}</h2>
            </li>
        </ul>







@endsection