@extends('layouts.myapp')
@section('tab-title','Create')
@section('title','create post') 
@section('content')
<form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
    @csrf
    <p><input type="text" name="title" placeholder="Title" value="{{old('title')}}"></p> 
    <p><input type="text" name="description" placeholder="Description.." value="{{old('description')}}"></p>
    <p><input type="file" name="image_path"></p>  
    <button type="submit" value="submit">submit</button> 
    <a href="{{route('posts.index')}}">Cancel</a>    
</form>

@endsection