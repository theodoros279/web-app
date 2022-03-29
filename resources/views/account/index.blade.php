@extends('layouts.myapp')

@section('tab-title', 'Account') 

@section('title', 'My acount')    

@section('content')

<h3>{{Auth::user()->name}}</h3>  
<h3>{{Auth::user()->email}}</h3>   

@endsection