<template>
  <div class="Typeahead">
    <i class="fa fa-spinner fa-spin" v-if="loading"></i>
    <template v-else>
      <i class="fa fa-search" v-show="isEmpty"></i>
      <i class="fa fa-times" v-show="isDirty" @click="reset"></i>
    </template>

    <input type="text"
           class="Typeahead__input"
           placeholder="Search for print products"
           autocomplete="off"
           v-model="query"
           @keydown.down="down"
           @keydown.up="up"
           @keydown.enter="hit"
           @keydown.esc="reset"
           @blur="reset"
           @input="update"/>

    <ul v-show="hasItems">
  <li v-for="(item, $item) in items" :key="$item" :class="activeClass($item)" @mousedown="hit" @mousemove="setActive($item)">        <div class="d-flex">
          <div class="p-2">
            <img id="cat_vover" :src="item.cover_url" alt="">
          </div>
          <div class="p-2 flex-grow-1">
          <span class="name" v-text="item.name"></span>
          <span class="screen-name" >starts from ugx {{item.starts_from}}</span>

          </div>
        </div>
      </li>
    </ul>
  </div>
</template>



<script>
import VueTypeahead from 'vue-typeahead'
import Axios from 'axios'
Vue.prototype.$http = Axios
export default {
  extends: VueTypeahead,
  data () {
    return {
      src: '/get/products',
      limit: 10,
      minChars: 1
    }
  },
  methods: {
    onHit (item) {
      window.location.href = '/products/' + item.id
    }
  }
}
</script>



<style scoped>
.Typeahead {
  margin-bottom:10px !important;
  position: relative;
}
.Typeahead__input {
  width: 260%;
  font-size: 14px;
  color: #2c3e50;
  line-height: 1.42857143;
  /* box-shadow: inset 0 1px 4px rgba(0,0,0,.4); */
  -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
  transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
  font-weight: 300;
  padding: 8px 12px;
  border: 1px solid #ccc;
  border-radius: 2px;
  letter-spacing: 1px;
  box-sizing: border-box;
  padding-left: 30px !important;
}
.Typeahead__input:focus {
  /* border-color: #006fb7; */
  outline: 0;
  /* box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px #006fb7; */
}
.fa-times {
  cursor: pointer;
}
i {
  float: left;
  position: relative;
  top: 26px;
  left: 10px;
  opacity: 0.4;
}
ul {
  position: absolute;
  padding: 0;
  margin-top: 8px;
  min-width: 200%;
  background-color: #fff;
  list-style: none;
  border-radius: 2px;
  box-shadow: 0 0 10px rgba(0,0,0, 0.25);
  z-index: 1000;
}
li {
  padding: 10px 16px;
  border-bottom: 1px solid #ccc;
  cursor: pointer;
}
li:first-child {
  border-top-left-radius: 4px;
  border-top-right-radius: 4px;
}
li:last-child {
  border-bottom-left-radius: 4px;
  border-bottom-right-radius: 4px;
  border-bottom: 0;
}
span {
  display: block;
  color: #2c3e50;
}
.active {
  background-color: #006fb7;
}
.active span {
  color: white;
}
.name {
  font-weight: 700;
  font-size: 18px;
}
.screen-name {
  font-style: italic;
}

#cat_vover{
  width:50px;
  height: 50px;
}
</style>