@extends('layouts.myapp')
@section('tab-title','Edit')
@section('title','edit post') 
@section('content')
<form method="POST" action="{{route('posts.update', ['post'=>$post])}}" enctype="multipart/form-data"> 
    @csrf
    @method('PUT')   
    <p><input type="text" name="title" value="{{$post->title}}"></p> 
    <p><input type="text" name="description" value="{{$post->description}}"></p>
    <p><input type="file" name="image_path"></p>   
    <button type="submit" value="submit">update</button>
    <a href="{{route('posts.index')}}">Cancel</a>     
</form>

@endsection