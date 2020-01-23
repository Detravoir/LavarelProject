<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
            margin-top: 70%;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
        .musictitle {
            margin-top: 30px;
        }

        .search {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            <a href="">Music</a>
            @auth
                <a href="{{ url('/home') }}">Home</a>
                <a href="{{ url('/upload') }}">Upload</a>
                <a href="{{ url('/music') }}">Music</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        @if ($music_name != null)
            @foreach($music_name as $music)
                <iframe width="560" height="315" src="https://www.youtube.com/embed/{{substr($music->music_url, -11)}}"
                        frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe><br/>
                {{$music->music_name}}<br/>
                Genre: {{$music->genre}}<br/>
                {{--            @can('delete', App\Music::class)--}}
                {{--                <a href="{{ route('music.delete', ["user" => Auth::user()->permission]) }}">Delete</a>--}}
                {{--            @endcan--}}
                <br/>
                <br/>
                <br/>
            @endforeach
        @else
            This song doesn't exist.
        @endif
        <div class="links">
        </div>
    </div>
</div>
</body>
</html>
