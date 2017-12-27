<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/3042bdf7a8.js"></script>
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
        
        var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
    // Firefox 1.0+
        var isFirefox = typeof InstallTrigger !== 'undefined';
    // Safari <= 9 "[object HTMLElementConstructor]" 
        var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0;
    // Internet Explorer 6-11
        var isIE = /*@cc_on!@*/false || !!document.documentMode;
    // Edge 20+
        var isEdge = !isIE && !!window.StyleMedia;
    // Chrome 1+
        var isChrome = !!window.chrome && !!window.chrome.webstore;
    // Blink engine detection
        var isBlink = (isChrome || isOpera) && !!window.CSS;
        
        $(document).ready(function(){
            if(isOpera){
                
            }
            
            
            
        });
    </script>
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    @if(Auth::user()->isRole('Root'))
                                    <a href="{{url('/admin')}}">Administración</a>
                                    @endif
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{url('lesson/index')}}"><i class="fa fa-list"></i> Ver lecciones</a>
                        </li>
                        <li>
                            <a href="{{url('lesson/create')}}"><i class="fa fa-plus"></i> Crear Lecciones</a>
                        </li>
                    @endif
                </ul>
            </div>
    </nav>
    <main class="col-md-10 col-md-offset-1 container">
        @if(Session::has('msg'))
                    <div class="alert alert-success">
                          {{Session::get('msg')}}
                    </div>
                    <?php Session::forget('msg') ?>
        @endif
    @yield('content')
    </main>
    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
