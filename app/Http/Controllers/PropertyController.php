<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class PropertyController extends Controller
{

    // view
    public function viewAllProperty(){

    }

    // add
    public function addProperty(){

        $owners = User::latest()->get();
        $propertycategories = PropertyCategory::latest()->get();

        return view('backend.modules.property.add_property',compact('owners','propertycategories'));

    }// end method

    // insert
    public function insertProperty(Request $request){

        Property::insert([
            'property_name' => $request->property_name,
            'property_mobile' => $request->property_mobile,
            'property_phone' => $request->property_phone,
            'property_email' => $request->property_email,
            'property_website' => $request->property_website,
            'property_address' => $request->property_address,
            'property_shortdescription' => $request->property_shortdescription,
            'property_description' => $request->property_description,
            'property_owner_id' => $request->property_owner_id,
            'property_category_id' => $request->property_category_id,
            'property_logo' => $request->property_logo,
            'property_cover' => $request->property_cover,
            'property_map' => $request->property_map,
            'property_facebook_page' => $request->property_facebook_page,
            'property_instagram_page' => $request->property_instagram_page,
            'property_linkedin_page' => $request->property_linkedin_page,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);


        return redirect()->route('add.property');

    }// end insert


/*********************************************
 * Property Category
 *********************************************/

    // view
    public function viewPropertyCategory(){

        $propertycategories = PropertyCategory::all();

        return view('backend.modules.property.view_all_propertycategory',compact('propertycategories'));

    }//end method

    //insert
    public function insertPropertyCategory(Request $request){

        PropertyCategory::insert([
            'property_category_name' => $request->property_category_name,
            'created_at' => Carbon::now(),

        ]);

        return redirect()->route('view.property.category');

    }//end method

    // get property category ajax
    public function editPropertyCategory(Request $request){

        $property_cat_id = $request->id;
        $propertycategories = PropertyCategory::where('id', $property_cat_id)->get();

        return response()->json($propertycategories);

    }// end method


    // update
    public function updatePropertyCategory(Request $request){

        $property_cat_id = $request->id;

        PropertyCategory::findOrFail($property_cat_id)->update([
            'property_category_name' => $request->property_category_name,
            'updated_at' => Carbon::now(),

        ]);

        return redirect()->route('view.property.category');

    }// end method


    // delete
    public function deletePropertyCategory($id){

        PropertyCategory::findOrFail($id)->delete();

        return redirect()->back();

    } // End Method


}
