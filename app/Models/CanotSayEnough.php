<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CanotSayEnough extends Model
{
    protected $table='canot_say_enoughs';
        protected $fillable=['title','subtitle','description','duration','price','image','advance_booking'];
}
