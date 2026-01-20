<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransportationArea extends Model
{
    protected $fillable = ['name'];

    public function fee()
    {
        return $this->hasOne(TransportationFee::class);
    }
}
