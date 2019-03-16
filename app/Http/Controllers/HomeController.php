<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\ProductDesign;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_products = Product::orderBy('name')->get();
        $products = Product::orderBy('name')
                                ->with('designs')
                                ->paginate(12);
    
        return view('home.index',[
            'products'=>$products,
            'all_products'=>$all_products
        ]);
    }

    public function orderNow($product,$design){

        return view('home.order_now');
    }


    public function show_product($product){
        $product = Product::where('id',$product)
                    ->with('designs') 
                    ->with('designs.features')   
                    ->first();
                  
        $product_features = $product->designs->pluck('features')->collapse()->map(function($item){
            return [
                'feature_name'=>$item->feature_name,
                'feature_value'=>$item->feature_value
            ];
        });
   
       $features = $product_features->pluck('feature_name')->unique()->map(function($item) use ($product_features){
            $values = [];
            foreach ($product_features as $key => $product_feature) {
               if($product_feature['feature_name'] ==$item){
                    array_push($values,$product_feature['feature_value']);
               }
            }

            return[
                $item =>$values
            ];

       })->collapse();
       
        $all_products = Product::orderBy('name')->get();
        return view('home.show_product',[
            'all_products'=>$all_products,
            'product'=>$product,
            'product_features'=>$features
        ]);
    }


    public function getProductDesigns(){
        $filter = json_decode(request('filter'));
        $id= $filter->id;
        if(isset($filter->sortBy)){
            $sort_by = $filter->sortBy;
            $feature = explode(":",$sort_by)[0];
            $value  = explode(":",$sort_by)[1];
            $designs = ProductDesign::where('product_id',(int)$id)
                ->with('features')
                ->whereHas('features',function($query) use ($feature,$value){
                    $query->where('feature_name',$feature)->where('feature_value',$value);
                })
                ->paginate(10);
              
        }else {
            $designs = ProductDesign::where('product_id',(int)$id)
                    ->with('features')
                    ->paginate(10);
        }

       
        return response()->json($designs);
    }


}
