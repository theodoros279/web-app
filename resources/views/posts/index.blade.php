@extends('layouts.myapp')

@section('tab-title', 'Posts') 

@section('title', 'All posts')   

@section('content')
    <p>Check out my blog posts.</p>
    <ol>
        @foreach($posts as $post)
            <li>
                <a href="{{route('posts.show', ['post'=>$post])}}">{{$post->title}}</a>
            </li>  
        @endforeach
    </ol>
    @if (auth()->user()->isAdmin) 
        <a href="{{route('posts.create')}}">Create new post</a> 
    @endif
@endsection  