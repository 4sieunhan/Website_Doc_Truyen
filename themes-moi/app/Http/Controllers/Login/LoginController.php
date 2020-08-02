<?php

namespace App\Http\Controllers\Login;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function dangnhap(){
        return view('login.login-master');
    }
    public function dangnhapvao(Request $request){
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
            return redirect()->route('dangnhap')->withErrors($validator)->withInput();
        } else {
            // Nếu dữ liệu hợp lệ sẽ kiểm tra trong csdl
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                // Authentication passed...
                return redirect()->route('admin.home');
            } else {
                // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
                Session::flash('error', 'Email hoặc Mật Khẩu Không Đúng!');
                return redirect()->route('dangnhap');
            }
        }
    }
    public function dangky(){
        return view('login.register-master');
    }
    public function dangkyvao(Request $request){
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
            return redirect()->route('dangky')->withErrors($validator)->withInput();
        } else {
            $user = new Users();
            $user->email = $request->email;
            $user->name = "Chưa Có NickName";
            $user->password = bcrypt($request->password);
            $user->avatar = "avatar-default.jpg";
            $user->updated_at = $user['created_at'];
            $user->save();
            if($user->save() == 1) {
                // Insert thành công sẽ hiển thị thông báo
                Session::flash('success', 'Đăng ký thành viên thành công!');
			    return redirect()->route('dangky');
            } else {
                // Insert thất bại sẽ hiển thị thông báo lỗi
                Session::flash('error', 'Đăng ký thành viên thất bại!');
                return redirect()->route('dangky');
            }
        }
    }
    public function dangxuat(){
        Auth::logout();
        return redirect()->route('dangnhap');
    }
}
