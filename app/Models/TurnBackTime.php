<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TurnBackTime extends Model
{
    protected $table='turn_back_times';
        protected $fillable=['title','subtitle','description','duration','price','image','advance_booking'];
}
