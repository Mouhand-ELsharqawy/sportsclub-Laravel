<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'FirstDay', 'LastDay'];
    public function fixtureStatus(){
        return $this->hasMany(FixtureStatus::class);
    }
    public function team(){
        return $this->hasMany(Team::class);
    }
}

