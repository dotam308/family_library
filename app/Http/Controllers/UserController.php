<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserController extends Controller{
    //
    public function index(){
        $users=User::get();
        return view('users',compact('users'));
    }

    public function userAddForm(){
        return view('addUser');
    }

    public function addUser(Request $request){
        $this->validate($request,[
            'username'=>'required',
            'email'=>'required',
            'password'=>'required',
            'role'=>'required'
        ]);
        $user = new User();
        $user->username=$request->username;
        $user->password=Hash::make($request->password);
        $user->email=$request->email;
        $user->role=$request->role;
        $user->save();
        return redirect(route('users'));
    }

    public function userEditForm(Request $request){
        $user=User::where('id',$request->id)->first();
        return view('editUser', compact('user'));
    }

    public function editUser(Request $request){
        $this->validate($request, [
            'email'=>'required',
            'password'=>'required',
            'role'=>'required'
        ]);
        $user=User::where('id',$request->id)->first();
        $user->email=$request->email;
        $user->password=$request->password;
        $user->save();
        return redirect(route('users'));
    }

    public function deleteUser(Request $request){
        $user=User::where('id',$request->id)->first();
        if($user->role=="user") {$user->delete();}
        return redirect(route('users'));
    }
}