<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ trans('label.appname') }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/semantic.min.css">
</head>
<body id="app-layout">
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <i class="fa fa-dropbox"></i>
            <a href="{{ url('/') }}"> {{ trans('label.appname') }} </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li>
                        <a href="{{ url('/login') }}">
                            <i class="fa fa-sign-in"></i>
                            {{ trans('label.login') }}
                        </a>
                    </li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {!! Html::image(Auth::user()->avatar, null , ['id' => 'profile_avatar']) !!}
                            {{ Auth::user()->name }}<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/logout') }}">
                                    <i class="fa fa-btn fa-sign-out fa-fw"></i>
                                    {{ trans('label.logout') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.profile', ['id' => Auth::user()->id ]) }}">
                                    <i class="fa fa-btn fa-user fa-fw"></i>
                                    {{ trans('label.profile') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/profile') }}">
                                    <i class="fa fa-btn fa-bolt fa-fw"></i>
                                    {{ trans('label.language') }}
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    @if (!Auth::guest())
        @include('layouts.navbar')
    @endif
</nav>
<script type="text/javascript" src="{{ asset('js/plugins.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/all.js') }}"></script>
@if (!Auth::guest())
    <div id="page-wrapper">
        @yield('content')
    </div>
@else
    @yield('content')
@endif
</body>
</html>
