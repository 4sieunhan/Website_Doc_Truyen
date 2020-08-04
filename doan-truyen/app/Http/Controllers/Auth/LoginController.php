<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function showLoginForm(){
        return view('auth.user-login.user-master-login');
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        $rules = [
            'email' =>'required|email:rfc,dns',
            'password' => 'required|min:6'
        ];
        $messages = [
            'email.required' => 'Vui Lòng Nhập Đầy Đủ Email',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Vui Lòng Nhập Đầy Đủ Mật Khẩu',
            'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
            return redirect()->route('login')->withErrors($validator)->withInput();
        } else {
            // Nếu dữ liệu hợp lệ sẽ kiểm tra trong csdl
            $credentials = $request->only('email', 'password');

            if  (Auth::attempt($credentials)) {
                // Authentication passed...
                return redirect()->route('home');
            } else {
                // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
                Session::flash('error-user-log', 'Email hoặc Mật Khẩu Không Đúng!');
                return redirect()->route('login');
            }
        }
    }

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout','userLogout');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function userLogout(){
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }
}
