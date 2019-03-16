<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\ProductFeature;
use App\Models\DesignFeature;
use App\Models\ProductDesign;
use App\Models\ProductDesignImage;
class ProductsController extends Controller
{
    public function index(){
      
        if(request()->wantsJson()){
            $products = Product::orderBy('created_at','desc')
                        ->withCount('designs');
            return response()->json($products->paginate(10));

        }
        return view('admin.products.index',[
           
        ]);
    }


    public function designs($product){
       
        $product = Product::where('id',$product)
                        ->withCount('designs')->first();
                        
        $product_designs = ProductDesign::where('product_id',$product->id)
                            ->with('features')
                            ->with('images')
                            ->get();
                        

        return view('admin.products.design',[
            'product'=>$product,
            'product_designs'=>$product_designs
        ]);
    }

    public function create(){

        $categories =  ProductCategory::all();
        return view('admin.products.create',[
            'categories'=>$categories
        ]);
    
    }

    public function getProducts(){

        if(request('q') != null){
            $categories = Product::orderBy('name')
                ->where('name','LIKE','%'.request('q').'%')
                ->get();
        }else {
            $categories = Product::orderBy('name')
                ->get();
        }
       
        return response()->json($categories);
    }

    public function update(Request $request){
      
        $product = Product::find($request->product)->update([
            'name'=>$request->product_name,
            'over_view'=>$request->over_view,
        ]);

        
         // Handle File Upload
         if($request->hasFile('cover_image')) {
            // Get filename with extension           
                $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;                       
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/products', $fileNameToStore);
            
            $product->update([
                'cover_image'=>$fileNameToStore
            ]);
        }

        return redirect('/admin/products');
    }

    public function edit($product){

        $product = Product::find($product);
        
        return view('admin.products.edit',[
            'product'=>$product
        ]);
 
        


    }

    public function storeFeatureCombination(Request $request){
        
    }

    public function storeProductDesign(Request $request,$product){
        
        $data =$request->all();
        unset($data['_token']);
        $product_design =ProductDesign::create([
            'product_id'=>$product,
            'unit_price' =>$request->unit_price
        ]);


        foreach ($data as $key => $value) {
            $valiable = explode("_", $key);
            if ($valiable[0] == "feature") {
                $feature = $value;
                $value = $data['value_'.$valiable[1]];
                DesignFeature::create([
                    'product_design_id'=>$product_design->id,
                    'feature_name'=>$feature,
                    'feature_value' =>$value
                ]);
            }
        
        }

          //store other images
        $other_images= collect($request->all())->map(function($item,$key){
            if(explode('_',$key)[0] =="moreImage"){
                 return $key;
            } 
         })->reject(function ($item) {
             return empty($item);
         });
    
         foreach ($other_images as $key => $other_image) {
             $this->otherImages($other_image,$request,$product_design);
         }

         return redirect('/admin/products/'.$product.'/designs');

    }



    public function otherImages($other_image,$request,$product_design){
        // Handle File Upload
        if($request->hasFile($other_image)) {
            // Get filename with extension           
                $filenameWithExt = $request->file($other_image)->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
            // Get just ext
            $extension = $request->file($other_image)->getClientOriginalExtension();
            
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;                       
            // Upload Image
            $path = $request->file($other_image)->storeAs('public/products', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        ProductDesignImage::create([
            'product_design_id'=>$product_design->id,
            'image_url'=>$fileNameToStore,
        ]);
    }





    public function createFeatureCombination(){
        return view('admin.products.create_feature_combination');
    }


    public function store(Request $request){
       $product= Product::create([
            'name'=>$request->product_name,
            'over_view'=>$request->over_view,
            'product_category_id'=>$request->product_category
        ]);
        $this->storeImage($request,$product);

        return redirect('admin/products');
    }

    public function storeImage($request,$product)
    {       
        // Handle File Upload
        if($request->hasFile('cover_image')) {
            // Get filename with extension           
                $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;                       
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/products', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $product->update([
            'cover_image'=>$fileNameToStore
        ]);
    }
}
