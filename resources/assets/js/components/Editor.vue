<template>
  <div id="app">
    <froala :tag="'textarea'" :config="config" v-model="model"></froala>
    <textarea hidden :name="input_name" :value="model" id="" cols="30" rows="10"></textarea>
  </div>
</template>

<script>
import VueFroala from 'vue-froala-wysiwyg';

export default {
  name: 'app',
  props:{
    input_name:{
      type:String,
      required:true,
    },

    OverView:{
        type:String,
        required:false
    }
  },
  data () {
    return {
      config: {
        events: {
          'froalaEditor.initialized': function () {
            console.log('initialized')
          }
        }
      },
      model: 'Edit Your Content Here!'
    }
  },

  
  
  mounted(){
      if(window.location.href.includes("edit")){
       this.model = this.OverView;
      }
  }


}
</script>

<style>
.fr-toolbar{
  border-top: 1px solid #006fb7 !important;
}
</style>
