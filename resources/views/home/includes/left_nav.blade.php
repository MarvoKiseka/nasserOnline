<div class="card">
 <div class="card-header">
 <h5>Most Popular</h5>
 </div>
    <div style="padding:0px !important" class="side-menu-items card-body">
        <ul>
            @foreach($all_products as $product)
            <a href="/products/{{$product->id}}">
            <li>
                {{$product->name}}
            </li>
            </a>
           @endforeach
            <li>
                <a href="">All Products >></a>
            </li>
        </ul>
    </div>

</div>