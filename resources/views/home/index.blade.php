@extends('layouts.app')

@section('content')
<home-component inline-template v-cloak>
    <div>

        @include('home.includes.coursel')

        <div style="margin-top:30px" class="container">
        <div class="d-flex">

        <div class="p-2 my-side">
            @include('home.includes.left_nav')
        </div>

        <div class="p-2 flex-grow-1">
            <h2 id="featured">Featured Products</h2>
            <div>
                @foreach($products->chunk(4) as $items)
                    <div class="row">
                        @foreach($items as $product)
                            <div class="col-md-3">
                                <a class="trip-anchor" href="#!">
                                    <div style="margin-bottom:20px"  class="card trip-card card-1">
                                        <div class="card-overlay" onclick="off()">
                                        <div class="card-button">
                                        <a role="button" href="/products/{{$product->id}}"  class=" order-btn btn btn-sm btn-default">Shop Now</a>
                                        </div>
                                        </div> 
                                        <div class="card-body trip-item-body">
                                            <img id=""   src="/storage/products/{{$product->cover_image}}" alt="">
                                            <h6 class="text-center">{{$product->name}}</h6>
                                            <p class="text-center">starts from  <span> <b>ugx {{$product->starts_from}}</b>  </span> </p>
                                        </div>
                                        
                                    </div>
                                    </a>
                            </div> 
                        @endforeach                  
                    </div>
                @endforeach
            </div>
        </div>

        </div>
        
        </div>
      
        <h3 class="text-center why-us">Why You Should Choose Us</h3>
        <p class="text-center">Here's why 1000+ customers trust us and keep coming back every day.</p>
        <div id="choice">
           <div class="container">
              
           @include('home.includes.choice')
           </div>
        </div>

        <div class="container">
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <h6 class="why-us-more">Proudly Display Your Brand</h6>
                    <p>We offer a variety of online printing services to fit every need, including standard and custom business cards, multi-page printing like brochures and catalogs, and large format banners and posters. Everything we print includes our high quality paper and materials, inks and coatings, to make you look your best, You can order everything you need for your marketing and branding at affordable costs
                    We are proud to represent your brand in print and you will be proud to show it off.</p>
                </div>
                <div class="col-md-6">
                    <h6 class="why-us-more">Our Promise To You</h6>
                    <p>Printing is more than just a piece of paper to us, so we are available to help with your printing questions. We also know that your business doesn't fit into a 40-hour work week, so neither do we. If you have any questions about your order, or our services, give us a call. We are available 24 hours a day during the week, with extended hours on weekends as well.
                    You can count on us to be the online printer providing you professional and on-budget print materials</p>
                </div>
            </div>
            <hr>
            <h3 class="text-center why-us">Customer Testimonies</h3>
            <p class="text-center">Our esteemed customers rated us <b>4.87 out of 5 stars</b></p>

            @include('home.includes.customer_say')
            
        </div>

        @include('footer')
    </div>
</home-component>
@endsection
