@extends('layouts.app')

@section('content')
<home-show-product product-id="{{$product->id}}" inline-template v-cloak>
   
   <div>
   
        <div class="container-fluid">
                <div class="row">
                    <div  class="col-md-2 custom-product side-menu-items">
                    @foreach($product_features as $key =>  $feature)
                    <select @change="changeSort"  class="form-control" name="" id="">
                        <option hidden value="" selected="">--{{$key}}--</option>
                        @foreach($feature as $values)
                        <option value="{{$key}}:{{$values}}">{{$values}}</option>
                        @endforeach
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
                                <a href="#!">All Products >></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-10">
                        <ul class="breadcrumb mbreadcrumb">
                            <li><a href="/">Home</a></li>
                            <li>{{$product->name}}</li>
                        </ul>

                        {!!$product->over_view!!}
                         
                        <div class="row">
                                <div v-for="design in items" style="margin-bottom:20px;" class="col-md-6 design-card">
                                    <div class="card ">
                                        <div style="padding:0px" class="card-body">
                                            <div class="d-flex">
                                                <div class="p-2">
                                                    <img height="150" width="170" :src="design.cover_link" class="" alt="">
                                                </div>
                                                <div class="p-2  flex-grow-1">
                                                    <hr class='dotted' />
                                                    <span v-for=" feature in design.features">
                                                        <span>@{{feature.feature_name}} :  <span class="text-muted">@{{feature.feature_value}}</span></span><br>
                                                    </span>
                                                    <span>Price :  <span class="text-muted">@{{design.formatted_price }} each</span></span><br>
                                                </div>
                                            </div>

                                            <a :href="design.order_now_link" role="button" class="btn btn-secondary btn-sm float-right order-now">Order Now</a>  
                                        </div>
                                    </div>
                            
                                </div>
                        </div>
                        <infinite-loading :identifier="infiniteId" @infinite="infiniteHandler"></infinite-loading>
                    </div>
                </div>

            <div class="col-md">

            </div>

            </div>
            @include('footer')

   
   </div>

</home-show-product>
@endsection
