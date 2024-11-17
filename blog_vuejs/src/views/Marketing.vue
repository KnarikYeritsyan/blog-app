<template>
  <div>
    <!-- Page Content -->
    <div style="background: antiquewhite;">
      <div class="container">
        <div class="pt-5">
          <img src="/img/marketing/marketing.png" class="w-100"
               style="border:2px solid #489877;box-shadow: 0px 0px 0px 5px #2ec788;"/>
        </div>
        <div class="mt-5">
          <img src="/img/marketing/marketing1.png" class="w-100"
               style="border:2px solid #489877;box-shadow: 0px 0px 0px 5px #2ec788;"/>
        </div>
        <div class="mt-5">
          <img src="/img/marketing/marketing2.1.png" class="w-100"
               style="border:2px solid #489877;box-shadow: 0px 0px 0px 5px #2ec788;"/>
        </div>
        <div class="mt-5">
          <img src="/img/marketing/marketing2.png" class="w-100"
               style="border:2px solid #489877;box-shadow: 0px 0px 0px 5px #2ec788;"/>
        </div>
        <div class="mt-5">
          <img src="/img/marketing/marketing3.png" class="w-100"
               style="border:2px solid #489877;box-shadow: 0px 0px 0px 5px #2ec788;"/>
        </div>
        <div class="mt-5">
          <img src="/img/marketing/marketing4.png" class="w-100"
               style="border:2px solid #489877;box-shadow: 0px 0px 0px 5px #2ec788;"/>
        </div>
        <div class="mt-5">
          <img src="/img/marketing/marketing5.png" class="w-100"
               style="border:2px solid #489877;box-shadow: 0px 0px 0px 5px #2ec788;"/>
        </div>
        <div class="mt-5">
          <img src="/img/marketing/marketing6.png" class="w-100"
               style="border:2px solid #489877;box-shadow: 0px 0px 0px 5px #2ec788;"/>
        </div>
        <div class="mt-4 pb-5">
          <img src="/img/marketing/marketing7.png" class="w-100"
               style="border:2px solid #489877;box-shadow: 0px 0px 0px 5px #2ec788;"/>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  export default {
    data() {
      return {
        user: ""
      };
    },
    created() {
      // this.getCat();
    },
    methods: {
      /*getCat: function () {
        this.$http.get(this.$ApiHost+'/api/getcategories')
            .then( (response) =>{
              console.log(response.data);
              console.log(response.data['categories'][0].name);
            });
      }*/
    }
  };
</script>