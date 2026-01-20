<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpaTreatment extends Model
{
    protected $table='spa_treatments';
    protected $fillable=['title','subtitle','description','duration','price','image','advance_booking'];
}
