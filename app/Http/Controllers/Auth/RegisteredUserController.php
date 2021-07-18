<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

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
                session(['username'=>$username,
                'password' => $password
                ]);
                $user = User::where('username', $username)->first();
                $nameUser = $user->name;
                session(['nameUser'=> $nameUser]);
                return redirect()->route('index');
            } else {
                return redirect(route('signin'));
            }
        }
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required',
            'name' => 'required',
        ]);

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'name' => $request->name,
        ]);

        session(['nameUser'=> $request->name]);
        return redirect(route('index'));
    }
}
