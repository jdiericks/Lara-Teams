<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    public function index(){
        $docs = Document::all();

        return view('docs.docs', ['docs'=>$docs]);
    }

    public function single($id){
        $doc = Document::where('id', $id);

        return view('docs.single', ['doc'=>$doc]);
    }

    //admin functions
    public function admin_index(){
        $docs = Document::all();

        return view('admin.docs.index', ['docs'=>$docs]);
    }

    public function admin_single($id){

        $doc = Document::where('id', $id);

        return view('admin.docs.single', ['doc'=>$doc]);
    }
    public function create(Request $request){

    }
    public function update(Request $request){

    }
    public function destroy($id){

    }
}
