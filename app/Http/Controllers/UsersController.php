<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    /*
        Show login form
    */
    public function showLogin()
    {
        return view('forms.login');
    }

    /*
        Login using an already created account
    */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'email|max:255',
            'pass' => 'string|max:255'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->pass])) {
            $request->session()->regenerate();
            return redirect('/books');
        }

        return back()->withErrors(['error' => true]);
    }

    /*
        Show register form
    */
    public function showRegister()
    {
        return view('forms.register');
    }

    /*
        Create a new account
    */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'username' => 'string|max:255',
            'email' => 'email|unique:users,email|max:255',
            'pass' => 'string|max:255',
            'confirm' => 'string|max:255'
        ]);

        if ($request->pass != $request->confirm) {
            return back()->withErrors(['confirm' => 'error']);
        }

        User::create([
            'name' => $validated['username'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['pass'])
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->pass])) {
            $request->session()->regenerate();
            return redirect('/books');
        }

        return back();
    }

    /*
        Logout after the user has logged in
    */
    public function logout(Request $request) 
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    /*
        Show user profile
    */
    public function showProfile() {
        return view('forms.profile', ['nav' => true]);
    }

    /*
        Updates user's profile
    */
    public function profileUpdate(Request $request) {
        $request->validate([
            'username' => 'string|max:255',
            'profile' => 'image|file',
        ]);

        if ($request->has('password')) {            
            if ($request->password != $request->confirm) {
                return back()->withErrors(['confirm' => 'error']);
            }
        }

        $user = User::findOrFail(auth()->user()->id);
        $user->name = $request->username;
        $user->password = $request->password ? $request->password : $user->password;

        $profilePath = null;

        if ($request->hasFile('profile')) {
            $profilePath = $request->file('profile')->store('profiles');
            if ($user->profile) {
                Storage::delete($user->profile);
            }
        }

        $user->profile = $profilePath;
        $user->save();

        return back();
    }
}
