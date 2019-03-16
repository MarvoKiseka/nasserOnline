<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
class ProductCategoryController extends Controller
{
public function index(){
        $product_category = ProductCategory::orderBy('created_at','desc')
                                ->withCount('products')
                                ->get();

        return view('admin.product_category.index',[
            'product_category'=>$product_category
        ]);
    }

    public function create(){
        return view('admin.product_category.create');
    }

    public function store(Request $request){
        $category= ProductCategory::create([
            'name'=>$request->category_name,
            'top_description'=>$request->top_description,
            'over_view'=>$request->over_view,
        ]);

        $this->storeImage($request,$category);

        return redirect('/admin/categories');
    }


    public function storeImage($request,$category)
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
        $category->update([
            'cover_image'=>$fileNameToStore
        ]);
    }


    public function getCategories(){

        if(request('q') != null){
            $categories = ProductCategory::orderBy('name')
                ->where('name','LIKE','%'.request('q').'%')
                ->withCount('products')
                ->get();
        }else {
            $categories = ProductCategory::orderBy('name')
                ->withCount('products')
                ->get();
        }
       
        return response()->json($categories);
    }
}
