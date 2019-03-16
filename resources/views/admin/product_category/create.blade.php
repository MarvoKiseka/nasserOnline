@extends('layouts.admin')
@section('content')
<create-category inline-template v-cloak>
<div class="container">
 <h5>Create Product Category</h5>
 <div class="card">
    <div class="card-body">
        <form  method="POST" enctype= "multipart/form-data" action="{{route('admin.category.store')}}">
            @csrf
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" class="form-control" name="category_name" required>
            </div>
            <div>
            <label for="cover_image">Cover Image</label><br>
            <input name="cover_image" @change="CoverImage" type="file"><br><br>
            <img width="200" height="100" id="output_image" alt="">
            </div>
            <br>
            <label for="top_description"> <b>Top Description</b> </label>
            <vue-editor input_name="top_description"></vue-editor>
          
            <br>
            <br>
            <label for="over_view"> <b>Overview</b> </label>
            <vue-editor input_name="over_view"></vue-editor>

            <br>
            <button type="submit" class="btn btn-primary pull-right">Save</button>
        
        </form>
    </div>
 </div>
</div>
</create-category>
@endsection
