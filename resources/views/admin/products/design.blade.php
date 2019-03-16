@extends('layouts.admin')
@section('content')
<show-products inline-template v-cloak>
  <div class="container-fluid">
  <div class="d-flex">
      <div class="p-2 flex-grow-1">
     
    <p style="display:none"> @{{index}} @{{imageCount}}</p> 
   

      <div class="container">

      @include('admin.products.includes.design')

      </div>

      </div>
      <div class="p-2">
          <div class="card">
              <div style="padding:0px !important" class="card-body product-card">
                  <img src="/storage/products/{{$product->cover_image}}" alt="">
                
                  <div class="prod-body">
                      <h6>Product Name: <b><span class="text-muted">{{$product->name}}</span></b> </h6>
                      <h6>Designs: <span class="text-muted"> {{$product->designs_count}} </span></h6>
                      <h6>Running Oders <span class="text-muted"> 0 </span></h6>
                      <h6>Starts from <span class="text-muted"> ugx {{$product->starts_from}} </span></h6>
                  </div>
              </div>
          </div>
      </div>
  </div>
  @include('admin.products.new_design')
  </div>
</show-products>
@endsection
