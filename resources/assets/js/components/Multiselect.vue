<template>

<div>
  
  <multiselect v-model="value" tag-placeholder="Add this as new tag" placeholder="Search or add a tag" label="name" track-by="code" :options="options" :multiple="true" :taggable="true" @tag="addTag"></multiselect>
  <!-- <pre class="language-json"><code>{{ value  }}</code></pre> -->

  <select hidden  :name="inputName"  multiple class="form-control" id="sel2">
          <option selected v-for="(option,index) in value" :key="index" :value="option.name">{{option.name}}</option>
  </select>
</div>
   
</template>

<script>
import Multiselect from 'vue-multiselect'

export default {
  components: {
    Multiselect
  },
  props:['inputName'],
  data () {
    return {
      value: [
        
      ],
      options: []
    }
  },
  methods: {
    addTag (newTag) {
      const tag = {
        name: newTag,
        code: newTag.substring(0, 2) + Math.floor((Math.random() * 10000000))
      }
      this.options.push(tag)
      this.value.push(tag)
    }
  }
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style>
.mul_width{
min-width:100% !important;
}
.multiselect__tag{
background:#CCCCCC !important;
color: #000000;
}

.multiselect__content-wrapper{
position: absolute;;
min-width:500px;
}

 .multiselect__option--highlight{
background:#006fb7;
}

.multiselect__option--highlight:after {
background:#006fb7;
}
.multiselect__option--selected.multiselect__option--highlight{
    background: #9a9fa8 !important;
}
.multiselect__option--selected.multiselect__option--highlight:after{
    background: #9a9fa8 !important;
}


</style>
