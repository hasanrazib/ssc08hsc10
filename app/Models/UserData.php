<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;
    protected $guarded = [];



    public function presentDivision(){

        return $this->belongsTo(Division::class,'present_division_id','id');

    }

    public function presentDistrict(){

        return $this->belongsTo(District::class,'present_district_id','id');

    }
    public function presentSubDistrict(){

        return $this->belongsTo(SubDistrict::class,'present_subdistrict_id','id');

    }

/*  permanent  */
    public function permanentDivision(){

        return $this->belongsTo(Division::class,'permanent_division_id','id');

    }

    public function permanentDistrict(){

        return $this->belongsTo(District::class,'permanent_district_id','id');

    }
    public function permanentSubDistrict(){

        return $this->belongsTo(SubDistrict::class,'permanent_subdistrict_id','id');

    }
}
