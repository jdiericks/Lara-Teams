<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index(){
        $employees = User::all();

        return view('emps.employees', ['employees'=>$employees]);
    }

    public function single($id){
        $employee = User::where('id', $id);

        return view('emps.single', ['employee'=>$employee]);

    }

    //admin functions
    public function admin_index(){
        $employees = User::all();

        return view('admin.users.index', ['employees'=>$employees]);
    }

    public function admin_single($id){
        $employee = User::where('id', $id);

        return view('admin.users.single', ['employee'=>$employee]);
    }
    public function create(Request $request){
        try{
            $request->validate([
                'name' => 'required|min:3',
                'email' => 'required',
                'password' => 'required|min:6',
            ]);

            $user = new User;

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

            $user->save();

        } catch (QueryException $exception){
            return back()->with('error', $exception->getMessage());
        }


        return redirect('/admin/users')->with('success', 'User has been created!');

    }
    public function update(Request $request){

    }
    public function destroy($id){
        $user = User::where('id', $id);

        $user->delete();

        return back()->with('success','User has been deleted.');
    }
}
