<div class="container">
    <div style="margin-bottom:10px" class="row">
        <div class="col-md-6">
            <h5 style="margin-top:20px">Flyers Designs</h5>
        </div>
        <div class="col-md-6">
            <a style="margin-bottom:20px"  role="button" data-toggle="modal" data-target="#design-modal" href="#!" class="btn btn-primary btn-sm float-right features-btn">+New Design</a>
        </div>
    </div>
    
    @foreach($product_designs->chunk(2) as $designs)
        <div class="row">
            @foreach($designs as $design)
                <div style="margin-bottom:20px;" class="col-md-6 design-card">
                    <div class="card ">
                        <div style="padding:0px" class="card-body">
                            @if($design->default)
                            <span  class="badge badge-pill badge-primary float-right">Default</span>
                            @endif
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

                            <div class="dropdown float-right">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item">Edit</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                    <a class="dropdown-item" href="#">Disable</a>
                                </div>
                            </div>
                                
                        </div>
                    </div>
            
                </div>
            @endforeach
        </div>
    @endforeach
</div>