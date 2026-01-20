<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransportationFee extends Model
{
    protected $fillable = [
        'transportation_area_id',
        'fee'
    ];

    public function area()
    {
        return $this->belongsTo(TransportationArea::class, 'transportation_area_id');
    }
}
