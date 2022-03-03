<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session ;

class LoginController extends Controller
{
    public function index(){
        return view('admin.users.login',[
            'title' => 'Đăng nhập'
        ]);
    }

    public function process(Request $request){
        
        $this->validate($request, [
            'username' => 'required|min:5|max:255|alpha_dash',
            'password' => 'required'
        ]);

        if(Auth::attempt([
            'username' =>$request->input('username'),
            'password' => $request->input('password')     
        ], $request->input('remember'))){
            return redirect()->route('home');
        }

        Session::flash('error','Invalid username or password!');
        return redirect()->back();
    }

}
