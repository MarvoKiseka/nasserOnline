<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = [
        'cover_image',
        'name',
        'min_price',
        'top_description',
        'over_view',
    ];

    protected $appends =[
        'active_class',
        'starts_from',
        'cover_url'
    ];
    
    public function products(){
        return $this->hasMany("App\Models\Product");
    }

    public function getActiveClassAttribute(){
        return $this->name."_".$this->id;
    }

    public function getStartsFromAttribute(){
        $products = $this->products->load('designs');
        $designs = $products->pluck('designs')->collapse();
        $starts_from = number_format($designs->pluck('unit_price')->min(),2);
        if($starts_from==0){
            return "n/a";
        }else{
            return $starts_from;
        }
    
    }

    public function getCoverUrlAttribute(){
        return "/storage/products/".$this->cover_image;
    }
}
