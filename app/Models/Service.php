<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
        protected $fillable = [
        'category_id',
        'name',
        'image',
        'description',
        'vat_applicable',
        'advance_booking'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function variants()
    {
        return $this->hasMany(ServiceVariant::class);
    }
}
