<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    // logout method
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'User Logout Successfully',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    } // End Method


    public function profile(){
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('backend.modules.profile.view_profile',compact('adminData'));

    }// End Method



    public function allUserList(){

        return view('backend.modules.admin.view_all_users');
    }


}
