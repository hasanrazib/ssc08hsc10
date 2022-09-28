<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use App\Models\Division;
use App\Models\BloodGroup;
use App\Models\MaritalStatus;
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






}
