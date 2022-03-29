@extends('layouts.myapp')

@section('tab-title', 'Posts') 

@section('title', 'All Articles')   

@section('content')
    <div class="posts-container">
        <ol>
            @foreach($posts as $post)
                <li>
                    <a href="{{route('posts.show', ['post'=>$post])}}">{{$post->title}}</a>
                </li>  
            @endforeach
        </ol>
        @if (auth()->user()->isAdmin) 
            <button class="btn btn-primary create-btn"><a href="{{ route('posts.create') }}">Create new article</a></button>
        @endif
    </div>
@endsection  