<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{asset('/js/main.js')}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-amber.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script> 

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="teams-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header" id="app">
        <header class="teams-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
            <div class="mdl-layout__header-row">
                <span class="mdl-layout-title">Teams
                    @if(\Illuminate\Support\Facades\Request::path() != '/')
                        > {{ ucWords(trans(\Illuminate\Support\Facades\Request::path())) }}
                    @endif
                </span>
                <div class="mdl-layout-spacer"></div>


                <span onclick="markNotifAsRead(`{{count(auth()->user()->unreadNotifications)}}`)" class="teams-notif-icon mdl-badge mdl-badge--overlap" data-badge="{{count(auth()->user()->unreadNotifications)}}" id="notif"><i class="material-icons">notifications</i></span>

                <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="notif" style="width:250px;">
                    @forelse(auth()->user()->unreadNotifications as $notif)
                        <li class="mdl-menu__item">
                            @include('partials.notifs.'. Illuminate\Support\Str::snake(class_basename($notif->type)))
                            <span class="mdl-color-text--blue-grey-300" style="font-size: 10px;padding-left:10px">{{$notif->created_at->diffForHumans()}}</span>
                        </li>
                        @empty
                        <li class="mdl-menu__item"><a href="#">No unread Notifications</a></li>
                    @endforelse
                </ul>
                <form action="/search" method="POST" role="search">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">

                        @csrf
                        <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
                            <i class="material-icons">search</i>
                        </label>
                        <div class="mdl-textfield__expandable-holder">
                            <input class="mdl-textfield__input" type="text" id="search" name="q">
                            <label class="mdl-textfield__label" for="search">Search...</label>
                        </div>
                    </div>
                </form>

            </div>
        </header>
        <div class="teams-drawer mdl-layout mdl-layout__drawer mdl-color--indigo mdl-color-text--indigo-50">
            <header class="teams-drawer-header">
                <i class="admin-icon mdl-color-text--indigo-400 material-icons" role="presentation">account_circle</i>
                <div class="teams-avatar-dropdown">
                    <span>Hello, {{Auth::user()->name}}!</span>
                    <div class="mdl-layout-spacer"></div>
                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
                        <i class="material-icons">more_vert</i>
                    </button>
                    <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
                        @if(Auth::user()->role === 'admin')
                            <li class="mdl-menu__item"><a href="/admin" target="_self">Admin</a></li>
                        @endif
                        <li class="mdl-menu__item">
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </header>
            <nav class="teams-navigation mdl-navigation mdl-color--indigo-900">
                <a class="mdl-navigation__link" href="/"><i class="mdl-color-text--indigo-400 material-icons" role="presentation">home</i>Home</a>
                <a class="mdl-navigation__link" href="/users"><i class="mdl-color-text--indigo-400 material-icons" role="presentation">people</i>Directory</a>
                <a class="mdl-navigation__link" href="/events"><i class="mdl-color-text--indigo-400 material-icons" role="presentation">calendar_today</i>Events</a>
                <a class="mdl-navigation__link" href="/docs"><i class="mdl-color-text--indigo-400 material-icons" role="presentation">insert_drive_file</i>Documents</a>
                <a class="mdl-navigation__link" href="/files"><i class="mdl-color-text--indigo-400 material-icons" role="presentation">perm_media</i>Media Gallery</a>
                <a class="mdl-navigation__link" href="/votes"><i class="mdl-color-text--indigo-400 material-icons" role="presentation">inbox</i>Voting</a>
                <div class="mdl-layout-spacer"></div>
                <a class="mdl-navigation__link" href=""><i class="mdl-color-text--indigo-400 material-icons" role="presentation">help_outline</i><span class="visuallyhidden">Help</span></a>
            </nav>
        </div>
        <main class="mdl-layout__content mdl-color--grey-100">
            @yield('content')
        </main>
    </div>
</body>
</html>
