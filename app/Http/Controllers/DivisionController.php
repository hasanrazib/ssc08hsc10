<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use App\Models\Division;

class DivisionController extends Controller
{


    // view all category
    public function viewAllDivision(){

        $divisions = Division::latest()->get();
        return view('backend.modules.division.view_all_divisions',compact('divisions'));

    }//end method

    // add category
    public function addDivision(){

        return view('backend.division.add_division');

    }// end method




    //insert method
    public function insertDivision(Request $request){


        Division::insert([
            'division_name' => $request->division_name,

        ]);

        return redirect()->route('view.divisions');

    }//end method


    //

    public function editDivision($id){

        $division = Division::findOrFail($id);

        return response()->json($division);
    }



    // delete method
      public function deleteDivision($id){

        Division::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Division Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method
}
