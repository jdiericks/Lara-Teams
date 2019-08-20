<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


Route::middleware('auth', 'isAdmin')->group(function(){

    Route::get('/admin', 'HomeController@admin_index');

    //users - admin section
    Route::get('/admin/users', 'UsersController@admin_index')->name('admin.users.index');
    Route::post('/admin/users/promote', 'UsersController@promote')->name('admin.users.promote');
    Route::get('/admin/users/{id}', 'UsersController@admin_single')->name('admin.users.single');
    Route::post('/admin/users/create', 'UsersController@create')->name('admin.users.create');
    Route::post('/admin/users/update', 'UsersController@update')->name('admin.users.update');
    Route::delete('/admin/users/delete/{id}', 'UsersController@destroy')->name('admin.users.destroy');

    //files - admin section
    Route::get('/admin/files', 'FilesController@admin_index')->name('admin.files.index');
    Route::get('/admin/files/{id}', 'FilesController@admin_single')->name('admin.files.single');
    Route::post('/admin/files/create', 'FilesController@create')->name('admin.files.create');
    Route::post('/admin/files/update', 'FilesController@update')->name('admin.files.update');
    Route::delete('/admin/files/{id}/delete', 'FilesController@destroy')->name('admin.files.destroy');

    //documents - admin section
    Route::get('/admin/docs', 'DocumentsController@admin_index')->name('admin.docs.index');
    Route::get('/admin/docs/{id}', 'DocumentsController@admin_single')->name('admin.docs.single');
    Route::post('/admin/docs/create', 'DocumentsController@create')->name('admin.docs.create');
    Route::post('/admin/docs/update', 'DocumentsController@update')->name('admin.docs.update');
    Route::delete('/admin/docs/{id}/delete', 'DocumentsController@destroy')->name('admin.docs.destroy');

    //events - admin section
    Route::get('/admin/events', 'EventsController@admin_index')->name('admin.events.index');
    Route::get('/admin/events/{id}', 'EventsController@single')->name('admin.events.single');
    Route::post('/admin/events/create', 'EventsController@create')->name('admin.events.create');
    Route::post('/admin/events/update', 'EventsController@update')->name('admin.events.update');
    Route::delete('/admin/events/{id}/delete', 'EventsController@destroy')->name('admin.events.destroy');

    //announcements - admin section
    Route::get('/admin/ann', 'AnnouncementsController@admin_index')->name('admin.ann.index');
    Route::get('/admin/ann/{id}', 'AnnouncementsController@admin_single')->name('admin.ann.single');
    Route::post('/admin/ann/create', 'AnnouncementsController@create')->name('admin.ann.create');
    Route::post('/admin/ann/update', 'AnnouncementsController@update')->name('admin.ann.update');
    Route::delete('/admin/ann/{id}/delete', 'AnnouncementsController@destroy')->name('admin.ann.destroy');

    //votes - admin section
    Route::get('/admin/votes', 'VoteController@admin_index')->name('admin.votes.index');
    Route::get('/admin/votes/{id}', 'VoteController@admin_single')->name('admin.votes.single');
    Route::post('/admin/votes/create', 'VoteController@create')->name('admin.votes.create');
    Route::post('/admin/votes/update', 'VoteController@update')->name('admin.votes.update');
    Route::delete('/admin/votes/{id}/delete', 'VoteController@destroy')->name('admin.votes.destroy');
});

Route::middleware('auth')->group(function(){

    //search function
    Route::any('/search', function (){
        $q = \Illuminate\Support\Facades\Input::get('q');
        $user = \App\User::where('name', 'LIKE', '%'.$q.'%')->orWhere('email', 'LIKE', '%'.$q.'%')->get();
        $events = \App\Events::where('title', 'LIKE', '%'.$q.'%')->orWhere('description', 'LIKE', '%'.$q.'%')->get();
        $anns = \App\Announcement::where('title', 'LIKE', '%'.$q.'%')->orWhere('details', 'LIKE', '%'.$q.'%')->get();
        $docs = \App\Document::where('filename', 'LIKE', '%'.$q.'%')->get();
        $images = \App\File::where('filename', 'LIKE', '%'.$q.'%')->get();

        return view('search.index', ['users'=>$user, 'events'=>$events, 'anns'=>$anns, 'docs'=>$docs, 'images'=>$images]);
    });

    //notifications
    Route::get('/markread', function (){
        auth()->user()->unreadNotifications->markAsRead();
    });

    //users
    Route::get('/users', 'UsersController@index')->name('user.users.index');
    Route::get('/users/{id}', 'UsersController@single')->name('user.users.single');

    //files
    Route::get('/files', 'FilesController@index')->name('user.files.index');
    Route::get('/files/{id}', 'FilesController@single')->name('user.files.single');

    //documents
    Route::get('/docs', 'DocumentsController@index')->name('user.docs.index');
    Route::get('/docs/{id}', 'DocumentsController@single')->name('user.docs.single');

    //events
    Route::get('/events', 'EventsController@index')->name('user.events.index');
    Route::get('/events/{id}', 'EventsController@single')->name('user.events.single');

    //announcements
    Route::get('/ann', 'AnnouncementsController@index')->name('user.ann.index');
    Route::get('/ann/{id}', 'AnnouncementsController@single')->name('user.ann.single');

    //votes
    Route::get('/votes', 'VoteController@index')->name('user.votes.index');
    Route::get('/votes/{id}', 'VoteController@single')->name('user.votes.single');
    Route::post('/votes/create', 'VoteController@create')->name('user.votes.create');
});