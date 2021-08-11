<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller{
    //
    public function index(Request $request){
        $active = "manage";
        $limit = 10;
        if ($request->usern == "r" && $request->insc == "r") {
            $users=User::orderBy('users.username', 'asc')->paginate($limit);
        }
        else if ($request->usern == "r" && $request->desc == "r") {
            $users=User::orderBy('users.username', 'desc')->paginate($limit);
        }
        else if ($request->rol == "r" && $request->desc == "r") {
            $users=User::orderBy('users.role', 'desc')->paginate($limit);
        }
        else if ($request->rol == "r" && $request->insc == "r") {
            $users=User::orderBy('users.role', 'asc')->paginate($limit);
        }
        else if ($request->mail == "r" && $request->desc == "r") {
            $users=User::orderBy('users.email', 'desc')->paginate($limit);
        }
        else if ($request->mail == "r" && $request->insc == "r") {
            $users=User::orderBy('users.email', 'asc')->paginate($limit);
        }
        else {
        $users=User::paginate($limit);
    }
        return view('users',compact('users', 'active'));
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
        // dd($user);
        return view('editUser',compact('user'));
    }

    public function editUser(Request $request){
        $this->validate($request, [
            'username'=>'required',
            'password'=>'required',
            'role'=>'required'
        ]);
        $user = User::where('id',$request->id)->first();
        $username=User::where('username',$request['username'])->get();
        $checkDuplicate = false;

        if (!empty($request->email))
            $email=User::where('email',$request->email)->get();
        if (count($username) >= 1) {
            $request->session()->flash('uerror','Username is already existed!');
            $checkDuplicate = true;
        }
        if (isset($email) && count($email) >= 1) {
            $request->session()->flash('merror','Email is already existed!');
            $checkDuplicate = true;
        }
        // if ($user->username == $username->username)
        if($checkDuplicate){
            return view('editUser',compact('user'));
        }
        $user->username=$request->username;
        $user->email=$request->email;

//         if ($request->password == $user->password) {
//             //van dang luu ma Hash, khong thay doi mat khau -> khong cap nhat moi
//         } else {
//             $user->password=Hash::make($request->password);
//         }
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