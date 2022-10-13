<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Image;

class PropertyController extends Controller
{

    // view
    public function viewAllProperty(){

        $properties = Property::all();

        return view('backend.modules.property.view_all_properties', compact('properties'));
    } // end method

    // view single
    public function viewSingleProperty($id){

        $property = Property::findOrFail($id);

        return view('backend.modules.property.single_property', compact('property'));

    }// end

    // add
    public function addProperty(){

        $owners = User::latest()->get();
        $propertycategories = PropertyCategory::latest()->get();

        return view('backend.modules.property.add_property',compact('owners','propertycategories'));

    }// end method

    // insert
    public function insertProperty(Request $request){

        $data = new Property();
        $data->property_name  = $request->property_name;
        $data->property_mobile  = $request->property_mobile;
        $data->property_phone  = $request->property_phone;
        $data->property_email  = $request->property_email;
        $data->property_website  = $request->property_website;
        $data->property_address  = $request->property_address;
        $data->property_shortdescription  = $request->property_shortdescription;
        $data->property_description  = $request->property_description;
        $data->property_owner_id  = $request->property_owner_id;
        $data->property_category_id  = $request->property_category_id;

        if ($request->file('property_logo')) {
            $image = $request->file('property_logo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image)->resize(300,300)->save('upload/admin_images/'.$name_gen);
            $save_url = 'upload/admin_images/'.$name_gen;
            $data->property_logo  = $save_url;
        }
        if ($request->file('property_cover')) {
            $image = $request->file('property_cover');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image)->resize(300,300)->save('upload/admin_images/'.$name_gen);
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
