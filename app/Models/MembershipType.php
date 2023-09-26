<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipType extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'type', 'SubAmount'];

    public function Member(){
        return $this->hasMany(Member::class);
    }
}
