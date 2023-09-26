<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FixtureStatus extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'status', 'fixtures_id', 'members_id', 'sports_id', 'NoOf_fixture', 'captain'];
    public function fixture(){
       return $this->belongsTo(Fixture::class);
    }
    public function member(){
        return $this->belongsTo(Member::class);
    }
    public function sport(){
        return $this->belongsTo(Sport::class);
    }
}
