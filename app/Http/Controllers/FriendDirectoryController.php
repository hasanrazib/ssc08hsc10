<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\District;
use App\Models\BloodGroup;
use App\Models\MaritalStatus;
use App\Models\Religion;
use App\Models\Gender;
use App\Models\JobIndustry;
use App\Models\User;
use DB;

class FriendDirectoryController extends Controller
{

    public function viewFriendAll(){

        $divisions = Division::latest()->get();
        $districts = District::latest()->get();
        $bloods = BloodGroup::latest()->get();
        $maritals = MaritalStatus::latest()->get();
        $religions = Religion::latest()->get();
        $genders = Gender::latest()->get();
        $jobindustries = JobIndustry::latest()->get();

        return view('backend.modules.frienddirectory.view_all_friends',compact('jobindustries','bloods','religions','divisions','genders'));

    }


    public function getAllFriend(){

        $gender_id = 1;
        $marital_id = 2;

        if($gender_id){

            $friends =  User::where('gender_id', $gender_id)->get();

        }

        if($marital_id){

            $friends =  User::where('marital_id', $marital_id)->get();

        }

        //$friends =  User::all();

        return response()->json($friends);

    }




}
