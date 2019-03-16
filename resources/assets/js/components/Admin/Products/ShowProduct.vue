<template>

</template>

<script>

   
    export default {
        mixins: [],
        components:{},
  
        data() {
            return {
               
                items:[],
                count:-1,
                index:-1,
                feturesItems:[],

                ImageItems:[],
                imageCount:0,
                ImageIndex:0,
           
            }
        },
        mounted() {
            this.addMore();      
            this.plusImages();

            console.log(this.feturesItems);
        },
        computed: {
          
        },

        methods:{
    
            addMore(){
                var increment = ++this.index;
                this.items.push(this.count++);
                this.feturesItems[increment] = {
                    "ValueName":'value_'+this.index,
                    "FeatureName":'feature_'+this.index,
                }

            },


            otherImages(){
                var img_id = "otherImage_"+event.target.id.split("_")[1];
                var reader = new FileReader();
                reader.onload = function()
                {
                var output = document.getElementById(img_id);
                output.src = reader.result;
                }
                reader.readAsDataURL(event.target.files[0]);
            },

            
         plusImages(){
           
                this.ImageItems[this.imageCount++] = {
                    'input_name':"moreImage_"+this.imageCount,
                    'image_name':"otherImage_"+this.imageCount,
                }
                 console.log(this.ImageItems);
         },

        },
    }
</script>
