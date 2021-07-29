<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller{
    //
    public function index(Request $request){
        if ($request->usern == "r" && $request->insc == "r") {
            $users=DB::table('users')->orderBy('users.username', 'asc')->get();
        }
        else if ($request->usern == "r" && $request->desc == "r") {
            $users=DB::table('users')->orderBy('users.username', 'desc')->get();
        }
        else if ($request->rol == "r" && $request->desc == "r") {
            $users=DB::table('users')->orderBy('users.role', 'desc')->get();
        }
        else if ($request->rol == "r" && $request->insc == "r") {
            $users=DB::table('users')->orderBy('users.username', 'asc')->get();
        }
        else if ($request->mail == "r" && $request->desc == "r") {
            $users=DB::table('users')->orderBy('users.email', 'desc')->get();
        }
        else if ($request->mail == "r" && $request->insc == "r") {
            $users=DB::table('users')->orderBy('users.email', 'asc')->get();
        }
        else {
        $users=DB::table('users')->get();
    }
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
        $username=User::where('username',$request['username'])->first();
        $email=User::where('email',$request['email'])->first();
        if($username || $email){
            if($username) $request->session()->flash('uerror','Username is already existed!');
            if($email) $request->session()->flash('merror','Email is already existed!');
            return view('addUser');
        }
        $user=new User();
        $user->username=$request->username;
        $user->password=Hash::make($request->password);
        $user->email=$request->email;
        $user->role=$request->role;
        $user->save();
        return redirect(route('users'));
    }

    public function userEditForm(Request $request){
        $user=User::where('id',$request->id)->first();
        return view('editUser',compact('user'));
    }

    public function editUser(Request $request){
        $this->validate($request, [
            'username'=>'required',
            'email'=>'required',
            'password'=>'required',
            'role'=>'required'
        ]);
        $username=User::where('username',$request['username'])->first();
        $email=User::where('email',$request['email'])->first();
        $user=User::where('id',$request->id)->first();
        if(($username && $user!=$username) || ($email && $user!=$email)){
            if($username && $user!=$username) $request->session()->flash('uerror','Username is already existed!');
            if($email && $user!=$email) $request->session()->flash('merror','Email is already existed!');
            return view('editUser',compact('user'));
        }
        $user->username=$request->username;
        $user->email=$request->email;
        $user->password=Hash::needsRehash($request->password)?Hash::make($request->password):$request->password;
        $user->role=$request->role;
        $user->save();
        return redirect(route('users'));
    }

    public function deleteUser(Request $request, $id){
        $user=User::where('id',$request->id)->first();
        $user->delete();
        return redirect()->route('users')->with('flash_message_success','Account deleted!');
    }
}