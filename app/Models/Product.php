<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'paper_specs',
        'over_view',
        'cover_image',
       
    ];

    protected $appends =[
        'cover_url',
        'details_link',
        'designs_link',
        'starts_from',
        'edit_link'
    ];

    public function category(){
        return $this->belongsTo("App\Models\ProductCategory","product_category_id");
    }

    public function getCoverUrlAttribute(){
        return "/storage/products/".$this->cover_image;
    }

    public function getDetailsLinkAttribute(){
        return "/admin/products/".$this->id;
    }

    public function designs(){
        return $this->hasMany(ProductDesign::class);
    }

    public function getEditLinkAttribute(){
        return "/admin/products/".$this->id."/edit";
    }

    public function getDesignsLinkAttribute(){
        return "/admin/products/".$this->id."/designs";
    }
    
    public function getStartsFromAttribute(){
        $product = $this->load('designs');
        $starts_from = number_format($product->designs->pluck('unit_price')->min(),2);
        if($starts_from==0){
            return "n/a";
        }else{
            return $starts_from;
        }
    }

}
