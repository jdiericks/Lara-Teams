@extends('layouts.app')

@section('content')
    <div class="">
        <div class="mdl-grid mdl-grid--no-spacing">
            <div class="mdl-cell mdl-cell--2-col">
                <div>
                    @forelse($employees as $user)
                        <a class="mdl-layout__tab _tablink tab-{{$user->id}} mdl-color--indigo mdl-color-text--indigo-50" onclick="openContact('tab-{{$user->id}}', this)" style="width: 100%;cursor: pointer;">
                            <span class="mdl-color--accent active-bar"></span>
                            {{$user->name}}
                        </a>
                    @empty
                        <p>There are no current users.</p>
                    @endforelse
                </div>
            </div>
            <div class="mdl-cell mdl-cell--10-col">
                @forelse($employees as $user)
                    <div class="mdl-layout__tab-panel _tabcontent" id="tab-{{$user->id}}">
                        <div class="page-content">
                            <div class="mdl-grid mdl-grid--no-spacing" style="justify-content: center;">
                                <div class="mdl-cell mdl-cell--12-col mdl-color--indigo-800">
                                    <div class="mdl-grid" style="height:200px;align-items: center;padding-left:50px;">
                                        <div class="mdl-cell mdl-cell--6-col mdl-cell--12-col-phone">
                                            <div class="_profile-badge">
                                                <div class="_profile-image">
                                                    <img src="https://via.placeholder.com/100">
                                                </div>
                                                <div class="_profile-info">
                                                    <h3>{{$user->name}}</h3>
                                                    <h4>{{$user->title}}, {{$user->role}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mdl-cell mdl-cell--4-col">
                                    <div class="mdl-card mdl-shadow--2dp" style="margin-top:1rem;width:100%;">
                                        <div class="mdl-card__title">
                                            [Media Gallery]
                                        </div>
                                    </div>
                                    <div class="mdl-card mdl-shadow--2dp" style="margin-top:1.5rem;width:100%">
                                        <div class="mdl-card__title">
                                            [Contact Info]
                                        </div>
                                    </div>
                                </div>
                                <div class="mdl-cell mdl-cell--7-col" style="margin-top:-10px;margin-left:25px;">
                                    <div class="_user-tab-bar" style="height:60px;margin-top:-60px;padding:0px;">
                                        <a class="mdl-layout__tab _panel-link _panel-link-{{$user->id}} user-timeline-{{$user->id}} is-active" onclick="openPanel('user-timeline-{{$user->id}}', {{$user->id}})" style="cursor: pointer;">Timeline</a>
                                        <a class="mdl-layout__tab _panel-link _panel-link-{{$user->id}} user-media-{{$user->id}}" onclick="openPanel('user-media-{{$user->id}}',{{$user->id}})" style="cursor: pointer;">Photos</a>
                                    </div>
                                    <div class="mdl-card mdl-shadow--2dp mdl-layout__tab-panel _panel-content _panel-content-{{$user->id}} is-active" style="width: 100%;" id="user-timeline-{{$user->id}}">
                                        <div class="mdl-card__title">
                                            Timeline
                                        </div>
                                    </div>
                                    <div class="mdl-card mdl-shadow--2dp mdl-layout__tab-panel _panel-content _panel-content-{{$user->id}}" style="width: 100%;" id="user-media-{{$user->id}}">
                                        <div class="mdl-card__title">
                                            Media
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="mdl-tabs__panel"></div>
                @endforelse
            </div>
        </div>
    </div>
@endsection