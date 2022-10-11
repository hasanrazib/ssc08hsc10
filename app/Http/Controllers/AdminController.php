<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Division;
use App\Models\BloodGroup;
use App\Models\MaritalStatus;
use App\Models\Religion;
use App\Models\Gender;
use App\Models\JobIndustry;
use App\Models\User;
use Image;
use Illuminate\Support\Carbon;

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
        $genders = Gender::latest()->get();
        $jobindustries = JobIndustry::latest()->get();

        return view('backend.modules.profile.edit_profile',compact('single_user','divisions','bloods','maritals','religions','genders','jobindustries'));
    }


    public function updateProfile(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->name  = $request->name;
        $data->email  = $request->email;
        $data->phone  = $request->phone;

        if ($request->file('profile_image')) {

        $image = $request->file('profile_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

        Image::make($image)->resize(300,300)->save('upload/admin_images/'.$name_gen);
        $save_url = 'upload/admin_images/'.$name_gen;
        $data->profile_image  = $save_url;

        }
        //$data->profile_image  = $save_url;
        $data->blood_id  = $request->blood_id;
        $data->gender_id  = $request->gender_id;
        $data->marital_id  = $request->marital_id;
        $data->religion_id  = $request->religion_id;
        $data->job_title  = $request->job_title;
        $data->company_name  = $request->company_name;
        $data->job_industry_id  = $request->job_industry_id;
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

    // all user list
    public function viewAllUser(){

        $users = User::latest()->get();

        return view('backend.modules.admin.view_all_users', compact('users'));

    }

    // view single user
    public function viewSingleUser($id){

        $user = User::findOrFail($id);

        return view('backend.modules.admin.single_user', compact('user'));

    }// end


    //addUser
    public function addUser(){


        $divisions = Division::latest()->get();
        $bloods = BloodGroup::latest()->get();
        $maritals = MaritalStatus::latest()->get();
        $religions = Religion::latest()->get();
        $genders = Gender::latest()->get();
        $jobindustries = JobIndustry::latest()->get();

        return view('backend.modules.admin.add_user',compact('divisions','bloods','maritals','religions','genders','jobindustries'));

    }


    // insert

    public function insertUser(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],

        ]);

        $data = new User();
        $data->name  = $request->name;
        $data->email  = $request->email;
        $data->phone  = $request->phone;


        if ($request->file('profile_image')) {
            $image = $request->file('profile_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image)->resize(300,300)->save('upload/admin_images/'.$name_gen);
            $save_url = 'upload/admin_images/'.$name_gen;
            $data->profile_image  = $save_url;
        }

        $data->blood_id  = $request->blood_id;
        $data->gender_id  = $request->gender_id;
        $data->marital_id  = $request->marital_id;
        $data->religion_id  = $request->religion_id;
        $data->job_title  = $request->job_title;
        $data->company_name  = $request->company_name;
        $data->job_industry_id  = $request->job_industry_id;
        $data->company_location  = $request->company_location;
        $data->university_name  = $request->university_name;
        $data->college_name  = $request->college_name;
        $data->school_name  = $request->school_name;
        $data->present_address_line  = $request->present_address_line;
        $data->present_subdistrict_id = $request->present_subdistrict_id;
        $data->present_district_id  = $request->present_district_id;
        $data->present_division_id   = $request->present_division_id;
        $data->permanent_address_line  = $request->permanent_address_line;
        $data->permanent_subdistrict_id = $request->permanent_subdistrict_id;
        $data->permanent_district_id  = $request->permanent_district_id;
        $data->permanent_division_id   = $request->permanent_division_id;
        $data->password = Hash::make($request->password);
        $data->save();

        return redirect()->route('admin.view.all.user');
    }
    // edit single user
    public function editSingleUser($id){

        $single_user = User::findOrFail($id);
        $divisions = Division::latest()->get();
        $bloods = BloodGroup::latest()->get();
        $maritals = MaritalStatus::latest()->get();
        $religions = Religion::latest()->get();
        $genders = Gender::latest()->get();
        $jobindustries = JobIndustry::latest()->get();

        return view('backend.modules.admin.edit_user',compact('single_user','divisions','bloods','maritals','religions','genders','jobindustries'));

    }// end method


    // update user
    public function updateSingleUser(Request $request){
        $id = $request->id;
        $datad = User::find($id);

        $datad->name  = $request->name;
        $datad->email  = $request->email;
        $datad->phone  = $request->phone;

        if ($request->file('profile_image')) {
            $image = $request->file('profile_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image)->resize(300,300)->save('upload/admin_images/'.$name_gen);
            $save_url = 'upload/admin_images/'.$name_gen;
            $datad->profile_image  = $save_url;
        }

        $datad->blood_id  = $request->blood_id;
        $datad->gender_id  = $request->gender_id;
        $datad->marital_id  = $request->marital_id;
        $datad->religion_id  = $request->religion_id;
        $datad->job_title  = $request->job_title;
        $datad->company_name  = $request->company_name;
        $datad->job_industry_id  = $request->job_industry_id;
        $datad->company_location  = $request->company_location;
        $datad->university_name  = $request->university_name;
        $datad->college_name  = $request->college_name;
        $datad->school_name  = $request->school_name;
        $datad->present_address_line  = $request->present_address_line;
        $datad->present_subdistrict_id = $request->present_subdistrict_id;
        $datad->present_district_id  = $request->present_district_id;
        $datad->present_division_id   = $request->present_division_id;
        $datad->update();

        return redirect()->route('admin.view.all.user');

    }// End Method


}
