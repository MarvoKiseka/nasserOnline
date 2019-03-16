@extends('layouts.app')

@section('content')
<home-show-product inline-template v-cloak>
    <div class="container-fluid">
        <div class="row">
            <div  class="col-md-2 custom-product side-menu-items">
                @foreach($product_features as $feature)
                <select  class="form-control" name="" id="">
                    <option value="" selected="">--{{$feature}}--</option>
                    <option value="">22" x 22"</option>
                    <option value="">44" x 44"</option>
                </select>
                @endforeach
            <hr>
            <h6>Other Products</h6>
            <hr>
            <ul>
                        @foreach($all_products as $other)
                        <a href="/products/{{$other->id}}"> 
                        <li>
                            {{$other->name}}
                        </li>
                        </a>
                        @endforeach
                        <li>
                            <a href="">All Products >></a>
                        </li>
                </ul>
            </div>
            <div class="col-md-10">
                <ul class="breadcrumb mbreadcrumb">
                <li><a href="#">Home</a></li>
                <li>{{$product->name}}</li>
                </ul>

            {!!$product->over_view!!}

                @foreach($product->designs->chunk(2) as $designs)
                    <div class="row">
                        @foreach($designs as $design)
                            <div style="margin-bottom:20px;" class="col-md-6 design-card">
                                <div class="card ">
                                    <div style="padding:0px" class="card-body">
                                        <div class="d-flex">
                                            <div class="p-2">
                                            <img height="130" width="140" src="/storage/products/{{$design->images->first()->image_url}}" class="" alt="">
                                            </div>
                                            <div class="p-2  flex-grow-1">
                                            <hr class='dotted' />
                                            @foreach($design->features as $feature)
                                            <span>{{$feature->feature_name}} :  <span class="text-muted">{{$feature->feature_value}}</span></span><br>
                                            @endforeach
                                            <span>Price :  <span class="text-muted">{{ number_format($design->unit_price,2) }} each</span></span><br>
                                            </div>
                                        </div>

                                        <button class="btn btn-secondary btn-sm float-right order-now">Order Now</button>
                                        
                                            
                                    </div>
                                </div>
                        
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>

    <div class="col-md">

    </div>

    </div>
    @include('footer')

</home-show-product>
@endsection
