
<div class="modal fade" id="design-modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Create Product Design</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
     <form method="POST" enctype= "multipart/form-data" action="/admin/products/{{$product->id}}/design">
     @csrf
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
          <button class="btn btn-primary btn-sm float-right" @click.prevent="addMore">Add Feature</button>  
          </div> 
        </div>
        <div v-for="item in feturesItems" class="row feature-row"> 
          <div class="col-md-6">
          <input style="margin-top:2px" placeholder="Enter feature" type="text" class="form-control" :name="item.FeatureName" id="">
          </div>
          <div class="col-md-6">
          <input style="margin-top:2px" placeholder="Enter Value" type="text" class="form-control" :name="item.ValueName" id="">
          </div>
        </div>

        <div style="margin-top:30px" class="form-group">
          <label for="unit_price">Unit Price</label>
          <input placeholder="Enter price per unit quantity" type="number" class="form-control" name="unit_price" id="">
        </div>

        <h6>Add Design Images</h6>
        <div v-for="item in ImageItems" class="form-group">
            <input  @change="otherImages" :name="item.input_name" :id="item.input_name"  type="file"><br><br>
            <img width="200" height="100" :id="item.image_name" alt="">
            <hr>
        </div>
        <button @click.prevent="plusImages" class="btn btn-secondary btn-sm">+ Add Image</button>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <button type="submit"  class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

