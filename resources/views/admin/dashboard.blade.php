@extends('layouts.admin')
@section('content')
<div class="dashboard">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-muted">02</h4>
                        <h6>Orders</h6>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
            <div class="card">
                    <div class="card-body">
                        <h4 class="text-muted">{{count($products)}}</h4>
                        <h6>Products</h6>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                        <div class="card-body">
                            <h4 class="text-muted">56</h4>
                            <h6>Users</h6>
                            
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

@endsection
