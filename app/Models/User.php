<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $guarded = [];

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];





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


    public function blood(){

        return $this->belongsTo(BloodGroup::class,'blood_id','id');

    }

    public function marital(){

        return $this->belongsTo(MaritalStatus::class,'marital_id','id');

    }

    public function religion(){

        return $this->belongsTo(Religion::class,'religion_id','id');

    }







}
