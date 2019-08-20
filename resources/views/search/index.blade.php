@extends('layouts.app')

@section('content')
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--12-col">
                <p>Here are your search results</p>
            </div>

            @if(count($events)>0)
                <div class="mdl-cell mdl-cell--6-col">
                    <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp" style="width:100%;">
                        <thead>
                        <tr>
                            <th class="mdl-data-table__cell--non-numeric">Event</th>
                            <th>Start Date</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $event)
                                <tr>
                                    <td class="mdl-data-table__cell--non-numeric">{{$event->title}}</td>
                                    <td>{{$event->start_date}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            @if(count($users)>0)
                <div class="mdl-cell mdl-cell--6-col">
                    <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp" style="width:100%;">
                        <thead>
                        <tr>
                            <th class="mdl-data-table__cell--non-numeric">Name</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="mdl-data-table__cell--non-numeric">{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            @if(count($anns)>0)
                <div class="mdl-cell mdl-cell--6-col">
                    <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp" style="width:100%;">
                        <thead>
                        <tr>
                            <th class="mdl-data-table__cell--non-numeric">Announcement</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($anns as $ann)
                                <tr>
                                    <td class="mdl-data-table__cell--non-numeric">{{$ann->title}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            @if(count($docs)>0)
                <div class="mdl-cell mdl-cell--6-col">
                    <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp" style="width:100%;">
                        <thead>
                        <tr>
                            <th class="mdl-data-table__cell--non-numeric">Filename</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($docs as $doc)
                                <tr>
                                    <td class="mdl-data-table__cell--non-numeric">{{$doc->filename}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            @if(count($images)>0)
                <div class="mdl-cell mdl-cell--12-col">
                    <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp" style="width:100%;">
                        <thead>
                        <tr>
                            <th class="mdl-data-table__cell--non-numeric">Filename</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($images as $image)
                                <tr>
                                    <td class="mdl-data-table__cell--non-numeric">{{$image->filename}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

        </div>
@endsection