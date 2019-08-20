@extends('layouts.app')

@section('content')
    <div class="">
        <div class="mdl-grid mdl-grid--no-spacing">
            <div class="mdl-cell mdl-cell--2-col">
                <div>
                    @forelse($days as $day => $event_list)
                        <h4>{{$day}}</h4>
                        @forelse($event_list as $item)
                            <a class="mdl-layout__tab _tablink tab-{{$item->id}} mdl-color--indigo mdl-color-text--indigo-50" onclick="openContact('tab-{{$item->id}}', this)" style="width: 100%;cursor: pointer;">
                                <span class="mdl-color--accent active-bar"></span>
                                {{$item->title}}
                            </a>
                        @empty
                            <p>No events scheduled</p>
                        @endforelse
                    @empty
                        <p>There are no current events.</p>
                    @endforelse
                </div>
            </div>
            <div class="mdl-cell mdl-cell--10-col">
                @forelse($items as $event)
                    <div class="mdl-layout__tab-panel _tabcontent" id="tab-{{$event->id}}">
                        <div class="page-content">
                            <div class="mdl-grid mdl-grid--no-spacing" style="justify-content: center;">
                                <div class="mdl-cell mdl-cell--12-col mdl-color--indigo-800">
                                    <div class="mdl-grid" style="height:200px;align-items: center;padding-left:50px;">
                                        <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-phone">
                                            <div class="_profile-badge">
                                                <div class="_profile-info">
                                                    <h2>{{$event->title}}</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mdl-cell mdl-cell--11-col" style="margin-top:-10px;">
                                    <div class="mdl-card mdl-shadow--2dp " style="width: 100%;">
                                        <div class="mdl-card__title">
                                            Event Details
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