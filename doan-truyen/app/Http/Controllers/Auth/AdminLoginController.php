<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm(){
        return view('auth.admin-login.admin-master-login');
    }

    public function login(Request $request){
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
            return redirect()->route('admin.login')->withErrors($validator)->withInput();
        } else {
            // Nếu dữ liệu hợp lệ sẽ kiểm tra trong csdl
            $credentials = $request->only('email', 'password');

            if (Auth::guard('admin')->attempt($credentials)) {
                // Authentication passed...
                return redirect()->route('admin.home');
            } else {
                // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
                Session::flash('error-admin-log', 'Email hoặc Mật Khẩu Không Đúng!');
                return redirect()->route('admin.login');
            }
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
