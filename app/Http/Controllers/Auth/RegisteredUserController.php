<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\Book;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('signin');
    }
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // dd($request->all());
        if (isset($request->login)) {
            $username = $request->username;
            $password = $request->password;
            if (Auth::attempt(['username' => $username, 'password' => $password])) {
                session(['username'=>$username
                ]);
                $user = User::where('username', $username)->first();
                session(['role'=>$user->role]);
                session(['userId'=>$user->id]);
                $userInfo = UserInfo::where('userId', $user->id)->first();
                $nameUser = 'admin';
                if (!empty($userInfo)) $nameUser = $userInfo->name;
                session(['nameUser'=> $nameUser]);
                
                //case borrow book but dont signin, then signin
                // if (asset($request->bookId)) {
                //     $book = Book::where('id', $request->bookId)->first();
                //     if ($book != null) {
                //         return  view('book_detail_byId', compact('book')) ;
                //     }
                // }
                return redirect()->route('index');
            } else {
                toast('Incorrect username or password','info');
                return redirect(route('signin'));
            }
        }

        //handle register request
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|min:6',
            'name' => 'required',
        ]);
        //check username already exists
        $acc = User::where('username', $request->username)->first();
        if (isset($acc)) {
            toast('Username already exists','info');
            return redirect(route('signin'));
        }

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'guest'
        ]);
        session(['role' => 'guess']);
        $last = DB::table('users')->latest()->first();
        $userId = $last->id;
        session(['userId' => $userId]);
        // dd($userId);
        UserInfo::create([
            'userId' => $userId,
            'name'=>$request->name
        ]);
        session(['nameUser'=> $request->name]);
                        
        //case borrow book but dont signin, then sign up
        // if (asset($request->bookId)) {
        //     $book = Book::where('id', $request->bookId)->first();
        //     if ($book != null) {
        //         return  view('book_detail_byId', compact('book')) ;
        //     }
        // }
        toast('Register successfully','success');
        return redirect(route('index'));
    }
}
