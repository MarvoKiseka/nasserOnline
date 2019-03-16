<script>
    import collection from "../../core/collection";
    export default {
        name: "home-show-product",
        mixins: [collection],
        components: {},
        props:{
            productId:{
                type:String,
                required:true,
            }
        },
        data() {
            return {
                url: '/get-products/designs',
              
                filter:{},
              
            }
        },
        mounted() {
         this.filter ={
             'id':this.productId
         }
        },
        methods: {
        changeSort(event){
              let val = event.target.value;
       
              this.filter ={
                'id':this.productId,
                'sortBy':val
                }
                this.changeFilter(this.filter);
          }
         
        }

    }
</script>
