<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Division;
use App\Models\District;
use App\Models\BloodGroup;
use App\Models\MaritalStatus;
use App\Models\Religion;
use App\Models\Gender;
use App\Models\JobIndustry;
use App\Models\Property;
use App\Models\PropertyCategory;
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
    }// end method


    // edit single user
    public function editSingleUser($id){

        $single_user = User::findOrFail($id);
        $divisions = Division::latest()->get();
        $districts = District::latest()->get();
        $bloods = BloodGroup::latest()->get();
        $maritals = MaritalStatus::latest()->get();
        $religions = Religion::latest()->get();
        $genders = Gender::latest()->get();
        $jobindustries = JobIndustry::latest()->get();

        return view('backend.modules.admin.edit_user',compact('single_user','divisions','districts','bloods','maritals','religions','genders','jobindustries'));

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





    // add property

    public function addPropertyByUser(){

        $current_owner = Auth::user()->id;
        $property = Property::where('property_owner_id', $current_owner)->first();

        $propertycategories =  PropertyCategory::latest()->get();
        $single_user =  User::latest()->get();
        $owners =  User::latest()->get();

        return view('backend.modules.profile.add_property_by_user', compact('property','propertycategories','single_user','owners'));

    }


    // insert
    public function insertPropertyByUser(Request $request){
        $current_owner = Auth::user()->id;
        $property = Property::where('property_owner_id', $current_owner)->first();

        if(!$property){
            $data = new Property();
            $data->property_name  = $request->property_name;
            $data->property_mobile  = $request->property_mobile;
            $data->property_phone  = $request->property_phone;
            $data->property_email  = $request->property_email;
            $data->property_website  = $request->property_website;
            $data->property_address  = $request->property_address;
            $data->property_description  = $request->property_description;
            $data->property_owner_id  = Auth::user()->id;
            $data->property_category_id  = $request->property_category_id;

                if ($request->file('property_logo')) {
                    $image = $request->file('property_logo');
                    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
                    Image::make($image)->resize(200,200)->save('upload/admin_images/'.$name_gen);
                    $save_url = 'upload/admin_images/'.$name_gen;
                    $data->property_logo  = $save_url;
                }
                if ($request->file('property_cover')) {
                    $image = $request->file('property_cover');
                    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
                    Image::make($image)->resize(847,312)->save('upload/admin_images/'.$name_gen);
                    $save_url = 'upload/admin_images/'.$name_gen;
                    $data->property_cover  = $save_url;
                }
            $data->property_map  = $request->property_map;
            $data->property_facebook_page  = $request->property_facebook_page;
            $data->property_instagram_page  = $request->property_instagram_page;
            $data->property_linkedin_page  = $request->property_linkedin_page;
            $data->created_by  = Auth::user()->id;
            $data->created_at  = Carbon::now();
            $data->save();


            return redirect()->back();

        }elseif($property){

            $data = new Property();
            $data->property_name  = $request->property_name;
            $data->property_mobile  = $request->property_mobile;
            $data->property_phone  = $request->property_phone;
            $data->property_email  = $request->property_email;
            $data->property_website  = $request->property_website;
            $data->property_address  = $request->property_address;
            $data->property_description  = $request->property_description;
            $data->property_owner_id  = Auth::user()->id;
            $data->property_category_id  = $request->property_category_id;

                if ($request->file('property_logo')) {
                    $image = $request->file('property_logo');
                    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
                    Image::make($image)->resize(200,200)->save('upload/admin_images/'.$name_gen);
                    $save_url = 'upload/admin_images/'.$name_gen;
                    $data->property_logo  = $save_url;
                }
                if ($request->file('property_cover')) {
                    $image = $request->file('property_cover');
                    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
                    Image::make($image)->resize(847,312)->save('upload/admin_images/'.$name_gen);
                    $save_url = 'upload/admin_images/'.$name_gen;
                    $data->property_cover  = $save_url;
                }
            $data->property_map  = $request->property_map;
            $data->property_facebook_page  = $request->property_facebook_page;
            $data->property_instagram_page  = $request->property_instagram_page;
            $data->property_linkedin_page  = $request->property_linkedin_page;
            $data->created_by  = Auth::user()->id;
            $data->created_at  = Carbon::now();
            $data->update();

            return redirect()->back();
        }

    }


}

