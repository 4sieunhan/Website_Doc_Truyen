<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
class ProfileController extends Controller
{
    public function index(){
        return view('admin.profile.profile-master');
    }
    public function profile_settings(Request $request){
        // // $profile = new Users;
        // $message = ([
        //     'name.required' => 'Chưa điền NickName',
        //     'name.unique' => 'NickName này đã tồn tại'
        // ]);
        // $request->validate([
        //     'name' => 'required|unique:users'
        // ],$message);
        // $data = array (
        //     'name' => $request->name
        // );
        // $id_user = auth()->user()->id;
        // Users::where('id',$id_user)->update($data);
        // return redirect()->back();
        $rules = [
            'name' => 'required|unique:users'
        ];
        $messages = [
            'name.required' => 'Chưa điền NickName',
            'name.unique' => 'NickName này đã tồn tại'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang profile và thông báo lỗi
            return redirect()->route('admin.profile.index')->withErrors($validator)->withInput();
        } else {
            $data = array (
                'name' => $request->name
            );
            $id_user = auth()->user()->id;
            $update = Users::where('id',$id_user)->update($data);
            if($update == 1) {
                // Insert thành công sẽ hiển thị thông báo
                Session::flash('success-profile', 'Bạn đã thay đổi nickname thành công!');
			    return redirect()->back();
            } else {
                // Insert thất bại sẽ hiển thị thông báo lỗi
                Session::flash('error-profile', 'Bạn đã thay đổi nickname thất bại!');
                return redirect()->back();
            }
        }
    }
    public function profile_change_password(Request $request){
        // $message = ([
        //     'OldPassword.required' => 'Vui lòng nhập mật khẩu cũ',
        //     'NewPassword.required' => 'Vui lòng nhập mật khẩu mới',
        //     'NewPasswordConfirm.same' => 'Nhập lại mật khẩu mới không giống nhau',
        //     'NewPasswordConfirm.required_with' => 'Bạn chưa nhập lại mật khẩu mới'
        // ]);
        // $request->validate([
        //     'OldPassword' => ['required', new MatchOldPassword],
        //     'NewPassword' => ['required'],
        //     'NewPasswordConfirm' => ['required_with:NewPassword','same:NewPassword'],
        // ],$message);
        // $data = array (
        //     'password'=> Hash::make($request->NewPassword)
        // );
        // $id_user = auth()->user()->id;
        // Users::where('id',$id_user)->update($data);
        $rules = [
            'OldPassword' => ['required', new MatchOldPassword],
            'NewPassword' => ['required'],
            'NewPasswordConfirm' => ['required_with:NewPassword','same:NewPassword'],
        ];
        $messages = [
            'OldPassword.required' => 'Vui lòng nhập mật khẩu cũ',
            'NewPassword.required' => 'Vui lòng nhập mật khẩu mới',
            'NewPasswordConfirm.same' => 'Nhập lại mật khẩu mới không giống nhau',
            'NewPasswordConfirm.required_with' => 'Bạn chưa nhập lại mật khẩu mới'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang profile và thông báo lỗi
            return redirect()->route('admin.profile.index')->withErrors($validator)->withInput();
        } else {
            $data = array (
            'password'=> Hash::make($request->NewPassword)
            );
            $id_user = auth()->user()->id;
            $update = Users::where('id',$id_user)->update($data);
            if($update == 1) {
                // Insert thành công sẽ hiển thị thông báo
                Session::flash('success-password', 'Bạn đã thay đổi mật khẩu thành công!');
			    return redirect()->back();
            } else {
                // Insert thất bại sẽ hiển thị thông báo lỗi
                Session::flash('error-password', 'Bạn đã thay đổi mật khẩu thất bại!');
                return redirect()->back();
            }
        }
    }
}
