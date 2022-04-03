@extends('layouts.myapp')

@section('tab-title', 'Account') 

@section('title', 'My account')    

@section('content')
<div class="account-container">
    <h3>Name: {{Auth::user()->name}}</h3>
    <hr>
    <h3>Email: {{Auth::user()->email}}</h3> 
    <hr> 
    @if (auth()->user()->isAdmin) 
        <h3>Admin: Yes</h3>
        <hr>
    @else
        <h3>Admin: No</h3>
        <hr>
    @endif
</div>
@endsection