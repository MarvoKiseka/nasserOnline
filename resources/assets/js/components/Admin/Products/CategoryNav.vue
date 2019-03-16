<template>
    <div class="card">
    <div class="card-header">
    <h5>Product Categories</h5>
    </div>
        <div style="padding:0px !important" class="side-menu-items cat_nav card-body">
            <ul>
        
                    <li v-for="(category,index) in categories"
                        :key="index"
                        :class="{active:filter ===category.id}" 
                        @click.prevent="selectFilter(category.id)"
                        >
                        <a  href="#">{{category.name}}
                            <span class="badge badge-pill badge-light">{{category.products_count}}</span>
                        </a>
                    </li>
                    
            </ul>
        </div>

    </div>
</template>
<script>
    export default {
        name: "CategoryNav",
        data() {
            return {
                filter: 'all',
                categories:{},
            }
        },
        mounted() {
         this.getCategories();
        },
        methods: {
            async getCategories() {
                try {
                    let res = await axios.get('/get/categories');
                    this.categories = res.data;
                } catch (e) {
                    console.table(e);
                }
            },

           
            selectFilter(filter) {
                this.filter = filter;
                this.$emit('filter-selected', filter);
            }
        }
    }
</script>
