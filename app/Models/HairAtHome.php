<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HairAtHome extends Model
{
    protected $table='hair_at_homes';
    protected $fillable = [
    'category_group', 
    'service_name', 
    'duration', 
    'price_standard', 
    'price_majirel', 
    'price_inoa', 
    'description'
];
}
