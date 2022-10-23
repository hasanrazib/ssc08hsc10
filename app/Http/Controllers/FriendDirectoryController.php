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
}
