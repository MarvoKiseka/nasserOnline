<template>
  <div class="card .trip-card">
      <div class="card-body trip-item-body">
          <img :src="image" alt="">
      </div>
      <div class="card-footer trip-item-footer">
          <div  class="trip-title">{{name}}</div>
          <span class="text-muted small trip-date">29th Jan,2019</span>
          <span class="text-center trip-cost">{{price}}</span>
      </div>
  </div>
</template>
<script>
    export default {

        data() {
            return {
               
            }
        },
        props:['image','name','price'],
        mounted() {
            
        },

        methods: {
          
        }
    }
</script>


