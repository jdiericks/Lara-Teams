<?php

namespace App\Http\Controllers;

use App\Events;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index(){
        $days = Events::orderBy('event_start')->get()->groupBy(function ($val){
            return Carbon::parse($val->event_start)->format('m-d');
        });
        $events = Events::all();

        return view('events.events', ['days'=>$days, 'items'=>$events]);
    }

    public function single($id){
        $event = Events::where('id', $id);

        return view('events.single', ['event'=>$event]);

    }

    //admin functions
    public function admin_index(){
        $events = Events::all();

        return view('admin.events.index', ['events'=>$events]);
    }

    public function admin_single($id){
        $event = Events::where('id', $id);

        return view('admin.events.single', ['event'=>$event]);
    }
    public function create(Request $request){

    }
    public function update(Request $request){

    }
    public function destroy($id){

    }
}
