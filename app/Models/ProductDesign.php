<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDesign extends Model
{
    protected $fillable =[
        'product_id',
        'unit_price',
        'default'
    ];

    protected $appends=[
        'cover_link',
        'formatted_price',
        'order_now_link'
    ];

    public function features(){
        return $this->hasMany(DesignFeature::class);
    }

    public function images(){
        return $this->hasMany(ProductDesignImage::class);
    }

    public function getCoverLinkAttribute(){
        return "/storage/products/".$this->images->first()->image_url;
    }

    public function getFormattedPriceAttribute(){
        return number_format($this->unit_price,2);
    }

    public function getOrderNowLinkAttribute(){
        return "/products/".$this->product_id."/order/".$this->id;
    }
    
}
