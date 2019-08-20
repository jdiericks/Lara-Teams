@extends('layouts.admin')

@section('content')
    <div class="mdl-grid">
        @if(count($errors) > 0)
            <div class="mdl-cell mdl-cell--12-col">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{$errors}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
            @if(session('error'))
                <div class="mdl-cell mdl-cell--12-col">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{session('error')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
            @if(session('success'))
                <div class="mdl-cell mdl-cell--12-col">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
        <div class="mdl-cell mdl-cell--3-col">
            <div class="mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Create a user</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <form action="{{route('admin.users.create')}}" method="post">
                        @csrf
                        <div class="mdl-textfield mdl-js-textfield">
                            <input class="mdl-textfield__input" type="text" id="name" name="name">
                            <label class="mdl-textfield__label" for="name">Name</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield">
                            <input class="mdl-textfield__input" type="email" id="email" name="email">
                            <label class="mdl-textfield__label" for="email">Email</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield">
                            <input class="mdl-textfield__input" type="password" id="password" name="password">
                            <label class="mdl-textfield__label" for="password">Password</label>
                        </div>
                        <div class="mdl-card__actions mdl-card--border">
                            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
                                Create
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @forelse($employees as $user)
            <div class="mdl-cell mdl-cell--3-col mdl-cell--6-col-tablet mdl-cell--12-col-phone">
                <div class="mdl-card mdl-shadow--2dp" style="width:100%;">
                    <div class="mdl-card__title mdl-card--expand">
                        <h2 class="mdl-card__title-text">{{$user->name}}</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        {{$user->email}}
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <button id="admin-func-{{$user->id}}"
                                class="mdl-button mdl-js-button mdl-button--icon" style="float:right;">
                            <i class="material-icons">more_vert</i>
                        </button>

                        <ul class="mdl-menu mdl-menu--top-right mdl-js-menu mdl-js-ripple-effect"
                            data-mdl-for="admin-func-{{$user->id}}">
                            <li class="mdl-menu__item">Make Admin</li>
                            <li class="mdl-menu__item">

                                <a href="{{ route('admin.users.destroy', $user->id) }}" onclick="event.preventDefault();document.getElementById('delete-form-{{$user->id}}').submit();">
                                    <span style="color:red;">DELETE</span>
                                </a>

                                <form id="delete-form-{{$user->id}}" action="{{ route('admin.users.destroy', $user->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @empty
            <p>There are no registered users.</p>
        @endforelse
    </div>
@endsection