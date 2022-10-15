<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function propertyCategory(){

        return $this->belongsTo(PropertyCategory::class,'property_category_id','id');

    }

    public function propertyOwner(){

        return $this->belongsTo(User::class,'property_owner_id','id');

    }
}
