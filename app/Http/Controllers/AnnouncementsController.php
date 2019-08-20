<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Notifications\NewAnnouncement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\User;

class AnnouncementsController extends Controller
{
    public function index(){
    }

    public function single($id){
        $ann = Announcement::where('id', $id);

        return view('anns.single', ['ann'=>$ann]);
    }

    //admin functions
    public function admin_index(){
        $anns = Announcement::all();

        return view('admin.anns.index', ['anns'=>$anns]);
    }

    public function admin_single($id){

    }
    public function create(Request $request){
        $request->validate([
            'title' => 'required|min:3',
            'details' => 'required|min:3',
        ]);

        $users = User::all();
        $ann = new Announcement;

        $ann->title = $request->title;
        $ann->details = $request->details;
        $ann->owner = Auth::id();

        $ann->save();

        Notification::send($users, new NewAnnouncement($ann));

        return redirect('/admin/ann')->with('success', 'Announcement has been created!');

    }
    public function update(Request $request){

    }
    public function destroy($id){

    }
}
