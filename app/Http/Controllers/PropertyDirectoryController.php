<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyCategory;
use DB;

class PropertyDirectoryController extends Controller
{
    //
    public function viewPropertyDirectory(){

        $property_directories = Property::all();
        $property_directory_cats = PropertyCategory::all();
        $cats_count = Property::where('id','property_category_id')->count();

        return view('backend.modules.propertydirectory.view_all_propertydirectory', compact('property_directories','property_directory_cats','cats_count'));

    }



    public function getAllProperty(){

        $properties['property_all'] = Property::with('propertyCategory')->paginate(50);

       return response()->json($properties);

    } // end Method


     // get property category ajax filtering
    public function getPropertyDirectory(Request $request){

        $pro_cat_id = $request->ids;

        $result = DB::table('properties')
                    ->join('property_categories','properties.property_category_id','=','property_categories.id');

        if($pro_cat_id){

            $result = $result->whereIn('property_category_id', $pro_cat_id);

        }


        $result = $result->get();

        return response()->json($result);

    }// end method




}
