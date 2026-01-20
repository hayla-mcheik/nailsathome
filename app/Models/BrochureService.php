<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrochureService extends Model
{
    protected $table='brochure_services';
    protected $fillable=['category_type','theme_color','side_title','section_title','title','description','duration','price'];
}
