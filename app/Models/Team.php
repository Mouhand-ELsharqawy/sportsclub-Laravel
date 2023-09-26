<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [ 'id', 'name', 'sports_id', 'leagues_id', 'fixtures_id', 'league_division', 'captin_name', 'GoalKeeper', 'AltGoalkeeper', 'CenterBack', 'AltCenterBack', 'RightBack', 'AltRightBack', 'LeftBack', 'AltLeftBack', 'RightWingBack', 'AltRightWingBack', 'LeftWingBack', 'AltLeftWingBack', 'CenterDefensiveMidfeilder', 'AltCenterDefensiveMidfeilder', 'CenterMidfeilder', 'AltCenterMidfeilder', 'RightMidfeilder', 'AltRightMidfeilder', 'LeftMidfeilder', 'AltLeftMidfeilder', 'CentralAttackingMidfeilder', 'AltCentralAttackingMidfeilder', 'Striker', 'AltStriker', 'CenterForword', 'AltCenterForword', 'RightWing', 'AltRightWing', 'LeftWing', 'AltLeftWing', 'RightForward', 'AltRightForward', 'LeftForward', 'AltLeftForward'];
    public function sport(){
        return $this->belongsTo(Sport::class);
    }
    public function league(){
        return $this->belongsTo(League::class);
    } 
    public function fixture(){
        return $this->belongsTo(Fixture::class);
    }
}
