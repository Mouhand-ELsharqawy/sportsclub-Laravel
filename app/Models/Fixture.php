<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'opponents_id', 'matchDate', 'homeAwayMatch', 'resault', 'score'];

    public function opponent(){
        return $this->belongsTo(Opponent::class);
    }
    public function fixtureStatus(){
        return $this->hasMany(FixtureStatus::class);
    }
    public function team(){
        return $this->hasMany(Team::class);
    }
}
