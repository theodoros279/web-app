@extends('layouts.myapp')

@section('tab-title', 'Account') 

@section('title', 'My account')    

@section('content')

<h3>Name: {{Auth::user()->name}}</h3>
<h3>Email: {{Auth::user()->email}}</h3>   

@endsection