@extends('layouts.admin')
@section('content')
<admin-products inline-template v-cloak>
<div class="container">
<div class="row">
<div class="col-md-12">
<a role="button" href="{{route('admin.create.product')}}"  style="margin-bottom:20px !important" class="btn btn-primary btn-sm float-right">+ New Product</a>
</div>
</div>
    <div class="d-flex">
        
        <div class="p-2 flex-grow-1">

        <table class="table">
            <thead >
                <tr>
                <th>#</th>
                <th>Cover</th>
                <th>Product Name</th>
            
                <th>Designs</th>
                <th>starts from (ugx)</th>
                <th>action</th>
                </tr>
            </thead>
            
            <tbody>
            <tr v-for="(item,key) in items">
                <td>@{{key}}</td>
                <td><img :src="item.cover_url" width="100" height="50" id="" alt=""></td>
                <td>@{{item.name}}</td>
             
                <th>@{{item.designs_count}}</th>
                <th>@{{item.starts_from}}</th>
                <td>
                <div class="dropdown">
                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">
                    action
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" :href="item.designs_link">Designs</a>
                    <a class="dropdown-item" :href="item.edit_link">Edit</a>
                    <a class="dropdown-item" href="#">Disable</a>
                </div>
                </div>
            </td>
            </tr>
            </tbody>
        </table>
        <infinite-loading :identifier="infiniteId" @infinite="infiniteHandler"></infinite-loading>

        </div>
    </div>
</div>
</admin-products>
@endsection
