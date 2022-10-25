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

      //  $friends = User::query();

        if (!empty($_GET['jobindustry'])) {

            $slugs = explode(',',$_GET['jobindustry']);

            $catIds = JobIndustry::select('id')->whereIn('category_slug_en',$slugs)->pluck('id')->toArray();

            $friends = $friends->whereIn('category_id', $catIds);

        }else{

             $friends = User::all();
        }


        $friends = User::get();

       // $categories = Category::orderBy('category_name_en','ASC')->get();

       return response()->json($friends);



    } // end Method


    // search product
    public function searchFriend(Request $request){

        $searched_friends = User::where('name','like','%'.$request->search_string.'%')->orderBy('id','desc');

        if($searched_friends->count() >= 1){

            return response()->json($searched_friends);
        }

    }

}
