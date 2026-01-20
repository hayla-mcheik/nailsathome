<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpoilYourFeet extends Model
{
      protected $table='spoil_your_feets';
    protected $fillable=['title','subtitle','description','duration','price','image','advance_booking'];
}
