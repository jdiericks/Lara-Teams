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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-amber.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="teams-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header" id="app">
    <header class="teams-admin-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
            <span class="mdl-layout-title">Teams
            @if(\Illuminate\Support\Facades\Request::path() != '/')
                    > {{ ucWords(trans(\Illuminate\Support\Facades\Request::path())) }}
                @endif
            </span>
            <div class="mdl-layout-spacer"></div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
                    <i class="material-icons">search</i>
                </label>
                <div class="mdl-textfield__expandable-holder">
                    <input class="mdl-textfield__input" type="text" id="search">
                    <label class="mdl-textfield__label" for="search">Search...</label>
                </div>
            </div>
        </div>
    </header>
    <div class="teams-admin-drawer mdl-layout mdl-layout__drawer mdl-color--indigo mdl-color-text--indigo-50">
        <header class="teams-admin-drawer-header">
            <i class="admin-icon mdl-color-text--indigo-900 material-icons" role="presentation">supervisor_account</i>
        </header>
        <nav class="teams-navigation mdl-navigation mdl-color--indigo-900">
            <a class="mdl-navigation__link" href="/"><i class="mdl-color-text--indigo-400 material-icons" role="presentation">home</i></a>
            <a class="mdl-navigation__link" href="/admin/users"><i class="mdl-color-text--indigo-400 material-icons" role="presentation">people</i></a>
            <a class="mdl-navigation__link" href="/admin/ann"><i class="mdl-color-text--indigo-400 material-icons" role="presentation">announcement</i></a>
            <a class="mdl-navigation__link" href="/admin/events"><i class="mdl-color-text--indigo-400 material-icons" role="presentation">calendar_today</i></a>
            <a class="mdl-navigation__link" href="/admin/docs"><i class="mdl-color-text--indigo-400 material-icons" role="presentation">insert_drive_file</i></a>
            <a class="mdl-navigation__link" href="/admin/files"><i class="mdl-color-text--indigo-400 material-icons" role="presentation">perm_media</i></a>
            <a class="mdl-navigation__link" href="/admin/votes"><i class="mdl-color-text--indigo-400 material-icons" role="presentation">inbox</i></a>
            <div class="mdl-layout-spacer"></div>
            <a class="mdl-navigation__link" href=""><i class="mdl-color-text--indigo-400 material-icons" role="presentation">help_outline</i><span class="visuallyhidden">Help</span></a>
        </nav>
    </div>
    <main class="teams-admin__layout mdl-layout__content mdl-color--grey-100">
        @yield('content')
    </main>
</div>
</body>
</html>
