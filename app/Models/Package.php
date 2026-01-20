<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'name',
        'image',
        'description',
        'price',
        'vat_applicable'
    ];

    public function services()
    {
        return $this->belongsToMany(Service::class, 'package_services');
    }
}
