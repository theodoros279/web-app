<!doctype html>
<html lang="en">
<head>
    <title>@yield('tab-title')</title>
    <link rel="stylesheet" href={{ asset('css/style.css') }}>   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <ul class="nav-bar">    
        <li><a href="{{route('home')}}">Home</a></li>
        <li><a href="{{route('posts.index')}}">Articles</a></li>
        @if (Auth::check()) 
            <li><a href="{{route('account.index')}}">Account</a></li>    
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <li><a href="{{route('logout')}}"
                        onclick="event.preventDefault();
                        this.closest('form').submit();">Log out</a></li> 
            </form>
        @else 
            <li><a href="{{ route('register') }}">Register</a></li>
            <li><a href="{{ route('login') }}">Log in</a></li>
        @endif  
    </ul> 

    <h1>@yield('title')</h1> 

    @if(session('message'))
        <p><b>{{session('message')}}</b></p>
    @endif
    
    @if($errors->any())
        <div>
            Errors:
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif 
    
    <div>
        @yield('content')
    </div>
</body>
</html>