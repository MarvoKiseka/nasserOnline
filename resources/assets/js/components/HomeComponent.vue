<template>

</template>

<script>

   import PrintProduct from './Product';
    export default {
        mixins: [],
      
        components:{PrintProduct},
        data() {
            return {
              
             pane_one:true,
            }
        },
        mounted() {
             $('.trip-card').mouseover(function(event)
            {
            $(this).find('.card-overlay').css("display", "block");
            console.log("ffff");
            });

            $('.trip-card').mouseout(function(event)
            {
            $(this).find('.card-overlay').css("display", "none");
            console.log("dddd");
            });
        },

        methods:{
        
        },
    }
</script>
