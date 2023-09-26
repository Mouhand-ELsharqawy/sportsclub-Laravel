<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'membership_types_id', 'FirtName', 'LastName', 'address', 'PostCode', 'HomePhone', 'MobilePhone', 'DOB', 'method', 'SubsAmount'];
    public function fixtureStatus(){
        return $this->hasMany(FixtureStatus::class);
    }
    public function MembershipType(){
        return $this->belongsTo(MembershipType::class);
    }
}
