<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vote;
use App\User;

class VoteController extends Controller
{
    public function index(){
        $users = User::all();

        return view('votes.votes', ['users'=>$users]);
    }

    public function single($id){

    }

    //admin functions
    public function admin_index(){
        $votes = Vote::all();
        $users = User::all();

        return view('admin.votes.index', ['votes'=>$votes, 'users'=>$users]);
    }

    public function admin_single($id){

    }
    public function create(Request $request){

    }
    public function update(Request $request){

    }
    public function destroy($id){

    }
}
