<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showRegisterForm(){
        return view('auth.admin-login.admin-master-register');
    }

    public function register(Request $request){
        $rules = [
            'email' => 'required|unique:users|email:rfc,dns|ends_with:laravel.com,gmail.com',
            'password'         => 'required|min:6|max:15|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])./',
            'password_confirmation' => 'required_with:password'
        ];
        $messages = [
            'email.required' => 'Vui Lòng Nhập Email',
            'email.unique' => 'Email Đã Tồn Tại',
            'email.max' => 'Tối Đa 255 Ký Tự',
            'email.email' => 'Email Không Hợp Lý',
            'email.ends_with'=> 'vidu@gmail.com,@laravel.com',
            'password.required' => 'Vui Lòng Nhập Mật Khẩu',
            'password.regex'=> 'ít nhất 1 chữ hoa và thường',
            'password.min' => 'Nhập Hơn 6 Ký Tự',
            'password.max' => 'Tối Đa 15 Ký Tự',
            'password.confirmed' => 'Mật Khẩu Không Trùng Khớp',
            'password_confirmation.required_with' => 'Chưa Nhập Lại Mật Khẩu'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
            return redirect()->route('admin.register')->withErrors($validator)->withInput();
        } else {
            $user = new Admin();
            $user->email = $request->email;
            $user->name = "NickName";
            $user->password = bcrypt($request->password);
            $user->avatar = "avatar-default.jpg";
            $user->updated_at = $user['created_at'];
            $user->save();
            if($user->save() == 1) {
                // Insert thành công sẽ hiển thị thông báo
                Session::flash('success-admin', 'Đăng ký thành viên thành công!');
			    return redirect()->route('admin.register');
            } else {
                // Insert thất bại sẽ hiển thị thông báo lỗi
                Session::flash('error-admin', 'Đăng ký thành viên thất bại!');
                return redirect()->route('admin.register');
            }
        }
    }
}
