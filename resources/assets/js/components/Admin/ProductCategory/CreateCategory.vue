<template>

</template>

<script>

    export default {
        mixins: [],
      
        components:{},
        data() {
            return {
           
            }
        },
        mounted() {
        
        },

        methods:{
         CoverImage(){
            var reader = new FileReader();
            reader.onload = function()
            {
            var output = document.getElementById('output_image');
            output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
         },

        


        },
    }
</script>
