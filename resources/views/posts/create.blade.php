@extends('layouts.myapp')
@section('tab-title','Create')
@section('title','Create Article') 
@section('content')

<div class="create-form">
    <form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
        @csrf
        <p><input type="text" name="title" placeholder="Title" value="{{old('title')}}"></p> 
        <p><input class="desc" type="text" name="description" placeholder="Description.." value="{{old('description')}}"></p>
        <p><input type="file" name="image_path"></p>  
        <button type="submit" value="submit" class="btn btn-success">submit</button> 
        <a href="{{route('posts.index')}}" class="btn btn-dark">Cancel</a>     
    </form>
</div>
@endsection