<div class="card">
 <div class="card-header">
 <h5>Product Categories</h5>
 </div>
    <div style="padding:0px !important" class="side-menu-items cat_nav card-body">
        <ul>
    
                <li v-for="category in categories"
                    :class="@{active:filter ==category.id}" 
                    @click.prevent="selectFilter('category.id')"
                    >
                    <a  href="#">@{{category.name}}</a>
                </li>
                
        </ul>
    </div>

</div>