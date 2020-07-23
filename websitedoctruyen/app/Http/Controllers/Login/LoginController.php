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
    public function dangnhap () {
        return view('login.login');
    }

    public function makedangnhap(Request $request){
        /*$messages = [
            'email.required' => 'Vui Lòng Điền Email',
            'email.email' => 'Địa Chỉ Email Không Hợp Lệ',
            'email.max' => 'Tối Đa 255 Ký Tự',
            'password.required' => 'Vui Lòng Điền Mật Khẩu',
        ];
        $validatedData = $request->validate([
            'email' => 'required|email:rfc,dns|max:255',
            'password'         => 'required',
        ],$messages);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('admin.home');
        }else{
            return redirect()->route('login.dangnhap');
        }*/

        // Kiểm tra dữ liệu nhập vào
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
            return redirect()->route('login.dangnhap')->withErrors($validator)->withInput();
        } else {
            // Nếu dữ liệu hợp lệ sẽ kiểm tra trong csdl
            $email = $request->input('email');
            $password = $request->input('password');
    
            if( Auth::attempt(['email' => $email, 'password' =>$password])) {
                // Kiểm tra đúng email và mật khẩu sẽ chuyển trang
                return redirect()->route('admin.home');
            } else {
                // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
                Session::flash('error', 'Email hoặc Mật Khẩu Không Đúng!');
                return redirect()->route('login.dangnhap');
            }
        }
    }
    public function dangky(){
        return view('login.register');
    }
    public function store(Request $request){
        /*$validatedData = $request->validate([
            'email' => 'required|unique:users|email:rfc,dns|max:255',
            'password'         => 'required|min:4|max:15|confirmed',
            'password_confirmation' => 'required_with:password'
        ],[
            'email.required' => 'Vui Lòng Nhập Email',
            'email.unique' => 'Email Đã Tồn Tại',
            'email.max' => 'Tối Đa 255 Ký Tự',
            'email.email' => 'Email Không Hợp Lý',
            'password.required' => 'Vui Lòng Nhập Mật Khẩu',
            'password.min' => 'Nhập Hơn 4 Ký Tự',
            'password.max' => 'Tối Đa 15 Ký Tự',
            'password.confirmed' => 'Mật Khẩu Không Trùng Khớp',
            'password_confirmation.required' => 'Chưa Nhập Lại Mật Khẩu',
        ]);

        $user = new Users();
        $user->email = $request->email;
        $user->name = $request->email;
        $user->password = bcrypt($request->password);
        $user->updated_at = $user['created_at'];
        $user->save();

        return redirect()->route('login.dangky');*/
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
            'password.regex'=> 'ít nhất 1 chữ in hoa và in thường',
            'password.min' => 'Nhập Hơn 6 Ký Tự',
            'password.max' => 'Tối Đa 15 Ký Tự',
            'password.confirmed' => 'Mật Khẩu Không Trùng Khớp',
            'password_confirmation.required_with' => 'Chưa Nhập Lại Mật Khẩu'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        

        if ($validator->fails()) {
            // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
            return redirect()->route('login.dangky')->withErrors($validator)->withInput();
        } else {
            // Nếu dữ liệu hợp lệ sẽ kiểm tra trong csdl
            $user = new Users();
            $user->email = $request->email;
            $user->name = $request->email;
            $user->password = bcrypt($request->password);
            $user->updated_at = $user['created_at'];
            $user->save();
            if($user->save() == 1) {
                // Insert thành công sẽ hiển thị thông báo
                Session::flash('success', 'Đăng ký thành viên thành công!');
			    return redirect()->route('login.dangky');
            } else {
                // Insert thất bại sẽ hiển thị thông báo lỗi
                Session::flash('error', 'Đăng ký thành viên thất bại!');
                return redirect()->route('login.dangky');
            }
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login.dangnhap');
    }   
}
