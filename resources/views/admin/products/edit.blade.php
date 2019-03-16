@extends('layouts.admin')
@section('content')
<edit-product  inline-template v-cloak>
<div class="container">
 <h5>Edit Products</h5>
 <div class="card">
    <div class="card-body">
        <form  method="POST" enctype= "multipart/form-data" action="{{route('admin.product.update')}}">
            @csrf
            <div class="form-group">
                <label for="name">Product Name</label>
                <input value="{{$product->name}}" type="text" class="form-control" name="product_name" required>
            </div>
            <input hidden type="text" name="product" value="{{$product->id}}" id="">
        
            <div>
            <label for="cover_image">Cover Image</label><br>
            <input name="cover_image" @change="CoverImage" type="file"><br><br>
            <img src="/storage/products/{{$product->cover_image}}" width="200" height="100" id="output_image" alt="">
            </div>
           
            <br>
            <br>
            <label for="over_view"> <b>Overview</b> </label>
            <vue-editor over-view="{{$product->over_view}}" input_name="over_view"></vue-editor>
            <br>
            <button type="submit" class="btn btn-primary pull-right">Save</button>
        
        </form>
    </div>
 </div>
</div>
</edit-product>
@endsection
