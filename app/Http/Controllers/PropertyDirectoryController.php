<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyCategory;

class PropertyDirectoryController extends Controller
{
    //
    public function viewPropertyDirectory(){

        $property_directories = Property::all();
        $property_directory_cats = PropertyCategory::all();
        $cats_count = Property::where('id','property_category_id')->count();

        return view('backend.modules.propertydirectory.view_all_propertydirectory', compact('property_directories','property_directory_cats','cats_count'));

    }

     // get property category ajax
     public function getPropertyDirectory(Request $request){


        $property_id = $request->ids;
        $propertycategories =  Property::whereIn('property_category_id', $property_id)->get();

        return response()->json($propertycategories);

    }// end method




}
