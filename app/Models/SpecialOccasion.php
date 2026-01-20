<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecialOccasion extends Model
{
    protected $table='special_occasions';
    protected $fillable=['title','description','image'];
}
