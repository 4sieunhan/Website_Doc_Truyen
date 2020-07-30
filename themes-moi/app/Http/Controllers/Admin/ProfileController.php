<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;

class ProfileController extends Controller
{
    public function index(){
        return view('admin.profile.profile-master');
    }
    public function profile_settings(Request $request){
        // $profile = new Users;
        $request->validate([
            'name' => 'max:30'
        ],[
            'name.max' => 'NickName Không Được Quá 10 Ký Tự'
        ]);

        $data = array (
            'name' => $request->name
        );
        $id_user = auth()->user()->id;
        Users::where('id',$id_user)->update($data);
        return redirect()->route('admin.profile.index');
    }
}
