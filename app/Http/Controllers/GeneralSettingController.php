<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use App\Models\BloodGroup;
use App\Models\Gender;
use App\Models\MaritalStatus;
use App\Models\Religion;
use App\Models\JobIndustry;
use App\Models\User;



class GeneralSettingController extends Controller
{


/*********************************************
 * Blood Group
 *********************************************/

    // view all
    public function viewBloodGroup(){

        $bloods = BloodGroup::all();

        return view('backend.modules.bloodgroup.view_all_bloods',compact('bloods'));

    }//end method

     //insert method
    public function insertBloodGroup(Request $request){

        BloodGroup::insert([
            'blood_group' => $request->blood_group,
            'created_at' => Carbon::now(),

        ]);

    return redirect()->route('view.bloods');

}//end method

// get blood ajax
public function editBlood(Request $request){

    $blood_id = $request->id;

    $bloods = BloodGroup::where('id', $blood_id)->get();

    return response()->json($bloods);
}


 // update method
 public function updateBlood(Request $request){

    $blood_id = $request->id;

    BloodGroup::findOrFail($blood_id)->update([
        'blood_group' => $request->blood_group,
        'updated_at' => Carbon::now(),

    ]);

    return redirect()->route('view.bloods');

}// end method


// delete method for single item
public function deleteBloodGroup($id){

    BloodGroup::findOrFail($id)->delete();

    return redirect()->back();

} // End Method



/*********************************************
 * Gender
 *********************************************/


// view all
public function viewGender(){

    $genders = Gender::all();

    return view('backend.modules.gender.view_all_genders', compact('genders'));

}//end method

 //insert method
public function insertGender(Request $request){

    Gender::insert([
        'gender_name' => $request->gender_name,
        'created_at' => Carbon::now(),

    ]);

return redirect()->route('view.gender');

}//end method

// get blood ajax
public function editGender(Request $request){

$gender_id = $request->id;

$genders = Gender::where('id', $gender_id)->get();

return response()->json($genders);
}


// update method
public function updateGender(Request $request){

$gender_id = $request->id;

Gender::findOrFail($gender_id)->update([
    'gender_name' => $request->gender_name,
    'updated_at' => Carbon::now(),

]);

return redirect()->route('view.gender');

}// end method


// delete method for single item
public function deleteGender($id){

    Gender::findOrFail($id)->delete();

return redirect()->back();

} // End Method


/*********************************************
 * Marital Status
 *********************************************/


// view all
public function viewMarital(){

    $maritals = MaritalStatus::all();

    return view('backend.modules.marital.view_all_maritals',compact('maritals'));

}//end method

 //insert method
public function insertMarital(Request $request){

    MaritalStatus::insert([
        'marital_name' => $request->marital_name,
        'created_at' => Carbon::now(),

    ]);

return redirect()->route('view.marital');

}//end method

// get blood ajax
public function editMarital(Request $request){

$marital_id = $request->id;

$maritals = MaritalStatus::where('id', $marital_id)->get();

return response()->json($maritals);
}


// update method
public function updateMarital(Request $request){

$marital_id = $request->id;

MaritalStatus::findOrFail($marital_id)->update([
    'marital_name' => $request->marital_name,
    'updated_at' => Carbon::now(),

]);

return redirect()->route('view.bloods');

}// end method


// delete method for single item
public function deleteMarital($id){

MaritalStatus::findOrFail($id)->delete();

return redirect()->back();

} // End Method



/*********************************************
 * Religion
 *********************************************/


// view all
public function viewReligion(){

    $religions = Religion::all();

    return view('backend.modules.religion.view_all_religions',compact('religions'));

}//end method

 //insert method
public function insertReligion(Request $request){

    Religion::insert([
        'religion_name' => $request->religion_name,
        'created_at' => Carbon::now(),

    ]);

return redirect()->route('view.religion');

}//end method

// get blood ajax
public function editReligion(Request $request){

$religion_id = $request->id;

$religions = Religion::where('id', $religion_id)->get();

return response()->json($religions);
}


// update method
public function updateReligion(Request $request){

$religion_id = $request->id;

Religion::findOrFail($religion_id)->update([
    'religion_name' => $request->religion_name,
    'updated_at' => Carbon::now(),

]);

return redirect()->route('view.religion');

}// end method


// delete method for single item
public function deleteReligion($id){

    Religion::findOrFail($id)->delete();

return redirect()->back();

} // End Method





/*********************************************
 * Job Industry
 *********************************************/


// view all
public function viewJobIndustry(){

    $jobindustries = JobIndustry::all();

    return view('backend.modules.jobindustry.view_all_jobindustry',compact('jobindustries'));

}//end method

 //insert method
public function insertJobIndustry(Request $request){

    JobIndustry::insert([
        'jobindustry_name' => $request->jobindustry_name,
        'created_at' => Carbon::now(),

    ]);

return redirect()->route('view.jobindustry');

}//end method

// get blood ajax
public function editJobIndustry(Request $request){

$jobindustry_id = $request->id;

$jobindustries = JobIndustry::where('id', $jobindustry_id)->get();

return response()->json($jobindustries);
}


// update method
public function updateJobIndustry(Request $request){

$jobindustry_id = $request->id;

JobIndustry::findOrFail($jobindustry_id)->update([
    'jobindustry_name' => $request->jobindustry_name,
    'updated_at' => Carbon::now(),

]);

return redirect()->route('view.jobindustry');

}// end method


// delete method for single item
public function deleteJobIndustry($id){

    JobIndustry::findOrFail($id)->delete();

return redirect()->back();

} // End Method

}
