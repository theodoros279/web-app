@extends('layouts.myapp')

@section('tab-title', 'Article') 

@section('content')
    <h1>{{$post->title}}</h1>
    <h5>Created on: {{date('jS M Y', strtotime($post->updated_at))}}</h5>
    <ul class="post-details">
        <li>Posted by: {{$post->user->name}}</li> 
        @if ($post->image_path)
            <img src="{{asset('images/' . $post->image_path)}}" alt="image" class="post-image"> 
        @endif  
        <li class="post-desc">{{$post->description}}</li> 
    </ul>

    @if (Auth::user()->id == $post->user_id) 
    <a href="{{route('posts.edit', ['post'=>$post])}}" class="edit-btn btn btn-info">Edit post</a>
        <form method="POST" action="{{route('posts.destroy', ['post'=>$post])}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" style="margin: 10px;">Delete</button> 
        </form>
    @endif
    
    <div class="comments-section">
        <h3 class="mt-6">Comments</h3>   
        <form method="POST" action="{{route('comments.store', ['post'=>$post])}}">
            @csrf
            <textarea type="text" name="comment_text"></textarea>
            <br>  
            <button type="submit" value="submit" class="btn btn-success">add comment</button> 
        </form> 
        
        <div class="comments-container">
            @foreach ($comments as $comment)
                <div class="comment-box"> 
                    <h4>{{$comment->user->name}}</h4>
                    <p>{{$comment->comment_text}}</p> 
                    @if (Auth::user()->id == $comment->user_id)
                        <form method="POST" action="{{route('comments.destroy', ['comment'=>$comment])}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @endif
                </div> 
            @endforeach
            <p></p>
            {{$comments->links()}}
        </div> 
    </div>
@endsection