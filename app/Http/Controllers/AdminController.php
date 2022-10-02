<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Division;
use App\Models\BloodGroup;
use App\Models\MaritalStatus;
use App\Models\Religion;
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



    public function editProfile($id){

        $single_user = User::findOrFail($id);
        $divisions = Division::latest()->get();
        $bloods = BloodGroup::latest()->get();
        $maritals = MaritalStatus::latest()->get();
        $religions = Religion::latest()->get();

        return view('backend.modules.profile.edit_profile',compact('single_user','divisions','bloods','maritals','religions'));
    }


    public function updateProfile(Request $request){
        $id = Auth::user()->id;

        $data = User::find($id);

        $data->first_name  = $request->first_name;
        $data->last_name  = $request->last_name;
        $data->email  = $request->email;
        $data->phone  = $request->phone;
        $data->blood_id  = $request->blood_id;
        $data->gender  = $request->gender;
        $data->marital_id  = $request->marital_id;
        $data->religion_id  = $request->religion_id;
        $data->job_title  = $request->job_title;
        $data->company_name  = $request->company_name;
        $data->company_location  = $request->company_location;
        $data->university_name  = $request->university_name;
        $data->college_name  = $request->college_name;
        $data->school_name  = $request->school_name;
        $data->present_address_line  = $request->present_address_line;
        $data->present_subdistrict_id = $request->present_subdistrict_id;
        $data->present_district_id  = $request->present_district_id;
        $data->present_division_id   = $request->present_division_id;
        $data->update();

        return redirect()->route('admin.profile');

    }// End Method

    public function allUserList(){

        return view('backend.modules.admin.view_all_users');
    }




}
