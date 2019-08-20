@extends('layouts.admin')

@section('content')
    <div class="teams-content">
        @if(count($errors) > 0)
            <div class="col-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{$errors}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
        @if(session('success'))
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--3-col">
                    <div class="mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title">
                            <h2 class="mdl-card__title-text">Create an Announcement</h2>
                        </div>
                        <div class="mdl-card__supporting-text">
                            <form action="{{route('admin.ann.create')}}" method="post">
                                @csrf
                                <div class="mdl-textfield mdl-js-textfield">
                                    <input class="mdl-textfield__input" type="text" id="title" name="title">
                                    <label class="mdl-textfield__label" for="title">Title</label>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield">
                                    <textarea class="mdl-textfield__input" type="text" rows= "5" id="details" name="details"></textarea>
                                    <label class="mdl-textfield__label" for="details">Details</label>
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
                <div class="mdl-cell mdl-cell--9-col">
                    <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp">
                        <thead>
                            <tr>
                               <th class="mdl-data-table__cell--non-numeric">Title</th>
                                <th>Details</th>
                                <th>Date Posted</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($anns as $ann)
                                <tr>
                                    <td class="mdl-data-table__cell--non-numeric">{{$ann->title}}</td>
                                    <td>{{$ann->details}}</td>
                                    <td>{{$ann->created_at}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

    </div>
@endsection