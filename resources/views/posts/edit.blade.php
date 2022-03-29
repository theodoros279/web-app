@extends('layouts.myapp')
@section('tab-title','Edit')
@section('title','edit post') 
@section('content')

<div class="create-form">
    <form method="POST" action="{{route('posts.update', ['post'=>$post])}}" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')   
        <p><input type="text" name="title" value="{{$post->title}}"></p> 
        <p><input type="text" name="description" value="{{$post->description}}"></p>
        <button type="submit" value="submit" class="btn btn-success">update</button>
        <a href="{{route('posts.index')}}" class="btn btn-dark">Cancel</a>     
    </form> 
</div>
@endsection