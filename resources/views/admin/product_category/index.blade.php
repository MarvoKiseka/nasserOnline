@extends('layouts.admin')
@section('content')
<div class="container">
    
    <a role="button" href="{{route('admin.create.category')}}"  style="margin-bottom:10px !important" class="btn btn-primary btn-sm float-right">+ New Category</a>
    <table  class="table ">
        <thead>
            <tr>
                <th>#</th>
                <th>Cover</th>
                <th>Name</th>
                <th>Products</th>
                <th>action</th>
            </tr>
        </thead>
        <?php
        $j=0;
        ?>
        <tbody>
            @foreach($product_category as $category)
            <tr>
            <td>{{++$j}}</td>
            <td><img src="/storage/products/{{$category->cover_image}}" width="100" height="50" id="" alt=""></td>
            <td>{{$category->name}}</td>
            <td>{{$category->products_count}}</td>
            <td>
                <div class="dropdown">
                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">
                    action
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Disable</a>
                    <a class="dropdown-item" href="#">Products</a>
                </div>
                </div>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
