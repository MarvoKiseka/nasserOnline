<script>
    import collection from "../../../core/collection";
    import CategoryNav from "./CategoryNav"
    export default {
        name: "admin-products",
        mixins: [collection],
        components: {CategoryNav},
        props:{

        },
        data() {
            return {
                url: '/admin/products',
                productId: '',
                filter:'all',
                categories:{},
            }
        },
        mounted() {
         
        },
        methods: {
          
         
        }

    }
</script>
