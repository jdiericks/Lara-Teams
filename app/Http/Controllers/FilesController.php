<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    public function index(){
        $files = File::all();

        return view('files.files', ['files'=>$files]);
    }

    public function single($id){
        $file = File::where('id', $id);

        return view('files.single', ['file'=>$file]);
    }

    //admin functions
    public function admin_index(){
        $files = File::all();

        return view('admin.files.index', ['files'=>$files]);
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
