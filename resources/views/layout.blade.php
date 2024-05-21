<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Album</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">

    <style>
        .active{
            background-color: rgb(109, 111, 111);


        }


    </style>

</head>
<body>

    <div id="main">
        <div id="upbar">
            <div id="title">

                <h1>Song Albums</h1>
            </div>

            <nav id="main-nav">
                <a href="{{ url('/home') }}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a>
                <a href="{{ url('/song_album') }}" class="{{ Request::is('song_album') ? 'active' : '' }}">Album</a>
                <a href="{{ url('/about') }}" class="{{ Request::is('about') ? 'active' : '' }}">About</a>
            </nav>
        </div>
        <div id="content">
            @yield('content')

        </div>
    </div>

</body>
</html>
