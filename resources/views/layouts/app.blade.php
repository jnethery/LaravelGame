<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    
    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.js"/>
    <script type="text/javascript">
        $(document).ready(function () { 
            $('.dropdown-toggle').dropdown(); 
        });
    </script>

    <style>
        body {
            font-family: 'Lato';
            margin-top: 70px;
        }
        .fa-btn {
            margin-right: 6px;
        }
    </style>
    
    <title>My Game | @yield('title')</title>
</head>
<body>
    <div id="mainNav" class="container-fluid">
        @section('nav')
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                    <li>
                        <a href="/user/{{App\Helpers\Helper::encode(Auth::user()->id)}}/inventory/">{{ Auth::user()->name }}</a>
                    </li>
                    <li>
                        <a href="#">GP : 100</a>
                    </li>
                    @else 
                    <li>
                        <a href="/auth/register">Guest</a>
                    </li>
                    @endif
                    <li>
                        <a>@{{time}}</a>
                    </li>
                    <li>
                        <a href="/">
                            <i class="fa fa-home" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            @if (Auth::check())
                            <li><a href="/auth/logout">Logout</a></li>
                            @else
                            <li><a href="/auth/login">Login</a></li>
                            <li><a href="/auth/register">Register</a></li>
                            @endif
                        </ul>
                    </li>
                </div>
            </div>
        </nav>
        @show

        @yield('content')
    </div>
</body>
</html>

<script type="text/javascript">
    new Vue({
        el : '#mainNav',
        data : {
            time : typeof(Storage) !== "undefined" && window.sessionStorage.time ? window.sessionStorage.time : '00:00:00'
        },
        ready : function () {
            var that = this;
            setInterval(function() {
                var d = new Date();
                var est = d.getTime() + (d.getTimezoneOffset() * 60000) + (3600000 * -4);
                d = new Date(est);
                var components = [];
                components.push(d.getHours());
                components.push(d.getMinutes());
                components.push(d.getSeconds());
                for (var i = 0; i < 3; i++) {
                    if (components[i] < 10) {
                        components[i] = '0' + components[i];
                    }
                }
                that.time = components.join(':');
                window.sessionStorage.time = that.time;
            }, 1000);
        }
    });
</script>