<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DesignFeature extends Model
{
    protected $fillable = [
        'product_design_id',
        'feature_name',
        'feature_value'
    ];
 
}
