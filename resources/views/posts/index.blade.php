@extends('layouts.app')

@section('contant')
        <a href="posts/create">Create New Post</a>

        <ul>
            @foreach ($post as $item)
                <li><a href="{{route('posts.show',$item->id)}}"> {{$item->title}}</a>
                {{$item->content}}</li>
                
            @endforeach
        </ul>







@endsection