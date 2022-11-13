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
        $users = User::latest()->get();
        return view('backend.modules.frienddirectory.view_all_friends', compact('jobindustries','bloods','religions','divisions','genders','users'));

    }

    //
    public function singleFriend($id){

        $friend = User::findOrFail($id);

        return view('backend.modules.frienddirectory.view_single_friend', compact('friend'));
    }

    public function getAllFriend(){

        $friends['friends_all'] = User::with('jobIndustry')->paginate(50);


        $friends['count_all'] = DB::table('users')->leftjoin('job_industries','job_industries.id','users.job_industry_id')
        ->get()->count();


       return response()->json($friends);



    } // end Method


    // search friends
    public function searchFriend(Request $request){

        $search_string = $request->search_string;

        $searched_friends = User::with('jobIndustry')->where('name','like','%'.$search_string.'%')->whereHas('jobIndustry', function ($query) use ($search_string){
                $query->orWhere('jobindustry_name', 'like', '%'.$search_string.'%');
            })->get();


        return response()->json($searched_friends);


    }

    // filtering with count option
    public function filterFriend(Request $request){


        $friends_filter = User::with('jobIndustry');


        if($request->job_inudstry){

            $job_industry = $request->job_inudstry;
            $friends_filter = $friends_filter->WhereIn('users.job_industry_id', $job_industry);

        }

        if($request->blood_group){

            $blood_group = $request->blood_group;
            $friends_filter = $friends_filter->WhereIn('users.blood_id', $blood_group);
        }

        if($request->gender){

            $gender = $request->gender;
            $friends_filter = $friends_filter->WhereIn('users.gender_id', $gender);
        }

        if($request->religion){

            $religion = $request->religion;
            $friends_filter = $friends_filter->WhereIn('users.religion_id', $religion);
        }

        if($request->division){

            $division = $request->division;
            $friends_filter = $friends_filter->WhereIn('users.present_division_id', $division);
        }


        $friends_filter = $friends_filter->get();

        $friends_filter['filter_count'] = count($friends_filter);


        return response()->json($friends_filter);

    }

}
