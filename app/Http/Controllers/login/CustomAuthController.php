<?php

namespace App\Http\Controllers\login;

use App\Enums\UserTypesEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\LoginRequest;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
class CustomAuthController extends Controller
{
    public function index()
    {
        if (auth('web')->check())
        {
            toastr(__('main.UserLoginSuccess'),'success');
            return view('pages.home');
        }
        return view('pages.auth.login');
    }
    public function register()
    {
        return view('pages.auth.register');
    }
    public function PostRegister()
    {
        return view('pages.auth.register');
    }

    public function PostLogin(LoginRequest $request)
    {
        $credentials = $request->only(['email','password']);
        if (auth('web')->attempt($credentials)) {
            toastr()->success(__('main.UserLoginSuccess'));
            return redirect('/home');
        }
        toastr()->error(__('main.HaveMistakeIndata'));
        return back()->withInput();
    }
    public function signOut() {
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }
}
