<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function dangnhap () {
        return view('login.login');
    }
    public function dangky(){
        return view('login.register');
    }
    public function logout(){
       
    }
}
