@extends('layouts.app')

@section('content')
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--12-col">
            <div class="mdl-card mdl-shadow--2dp" style="width:100%;">
                <div class="mdl-card__title">
                    <div class="mdl-card__title-text">
                        Welcome!
                    </div>
                </div>
                <div class="mdl-card__supporting-text">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        Get Started
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
