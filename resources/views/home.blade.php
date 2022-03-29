@extends('layouts.myapp')

@section('tab-title','Home')

@section('title','Welcome to my blog')

@section('content')
    {{-- <h2>Featured Article</h2>  --}}
    <div class="bg-image"> 
        <img src="images/background.jpg" alt="bg-image">
    </div>  
    <div class="about">
        <div class="column">
            <h2>About Me</h2> 
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas vero dolorem modi aut ea, debitis provident est autem et ratione incidunt repellendus, magnam fugit commodi nihil a amet similique quasi.</p>           
            <button class="btn btn-primary" ><a href="{{route('posts.index')}}">All Articles</a></button>
        </div>
        <div class="column">
            <img src="images/person.jpg" alt="">
        </div>  
    </div>
@endsection