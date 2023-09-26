<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opponent extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'phone', 'ContactFirstname', 'ContactLastname', 'club'];

    public function fixture(){
        return $this->hasMany(Fixture::class);
    }
}
