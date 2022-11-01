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

        return view('backend.modules.frienddirectory.view_all_friends', compact('jobindustries','bloods','religions','divisions','genders'));

    }

    public function getAllFriend(){

      //  $friends = User::query();

        if (!empty($_GET['jobindustry'])) {

            $slugs = explode(',',$_GET['jobindustry']);

            $catIds = JobIndustry::select('id')->whereIn('category_slug_en',$slugs)->pluck('id')->toArray();

            $friends = $friends->whereIn('category_id', $catIds);

        }else{

             $friends = User::all();
        }




        $friends = User::with('jobIndustry','blood')->get();


       // $categories = Category::orderBy('category_name_en','ASC')->get();

       return response()->json($friends);



    } // end Method


    // search product
    public function searchFriend(Request $request){

        $search_string = $request->search_string;
        // $searched_friends = User::where('name','like','%'.$request->search_string.'%')->orderBy('id','desc')->orWhere('jobindustry_name','like','%'.$request->search_string.'%')->get();
        $searched_friends = User::with('jobIndustry')->where('name','like','%'.$search_string.'%')->whereHas('jobIndustry', function ($query) use ($search_string){
            $query->orWhere('jobindustry_name', 'like', '%'.$search_string.'%');
        })->get();


        return response()->json($searched_friends);


    }


    public function filterFriend(Request $request){


        $friends_filter = DB::table('users');


        if($request->job_inudstry){

            $job_industry = $request->job_inudstry;
            $friends_filter = $friends_filter->orWhereIn('users.job_industry_id', $job_industry);

        }

        if($request->blood_group){

            $blood_group = $request->blood_group;
            $friends_filter = $friends_filter->orWhereIn('users.blood_id', $blood_group);
        }

        if($request->gender){

            $gender = $request->gender;
            $friends_filter = $friends_filter->orWhereIn('users.gender_id', $gender);
        }

        if($request->religion){

            $religion = $request->religion;
            $friends_filter = $friends_filter->orWhereIn('users.religion_id', $religion);
        }

        if($request->division){

            $division = $request->division;
            $friends_filter = $friends_filter->orWhereIn('users.present_division_id', $division);
        }


        $friends_filter = $friends_filter
                ->leftjoin('job_industries','job_industries.id','users.job_industry_id')
                ->get();


        return response()->json($friends_filter);
    }

}
