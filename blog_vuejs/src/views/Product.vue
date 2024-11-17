<template>
  <!-- Page Content -->
  <div>
    <div class="text-center product-title-top d-none mt-3">
      <h2>{{product.name}}</h2>
      <p>${{product.price}} USD</p>
    </div>
    <div class="row mr-0 justify-content-center">
      <div class="text-center col-12 col-md-6">
        <img :src="product.image_name" class="w-100"/>
      </div>
      <div class="d-flex flex-column justify-content-center col-11 col-md-6">
        <div class="product-title text-center">
          <h2>{{product.name}}</h2>
          <p>${{product.price}} USD</p>
        </div>
        <div v-html="product.description">}</div>
      </div>
      <div class="flex-row pb-5 pt-3 justify-content-between">
        <router-link :to="`/${$i18n.locale}${previous}`" class="mr-2">
          <button class="btn btn-primary"><i class="fa fa-arrow-left"></i> Նախորդը</button>
        </router-link>
        <router-link :to="`/${$i18n.locale}${next}`" class="ml-2">
          <button class="btn btn-primary">Հաջորդը <i class="fa fa-arrow-right"></i></button>
        </router-link>
      </div>
    </div>
  </div>
</template>
<script>
  export default {
    data() {
      return {
        product:[],
        category:[],
        previous:'',
        next:'',
      };
    },
    beforeCreate() {
      this.$http.get(this.$ApiHost+'/api/get-product?slug='+this.$route.params.slug)
          .then( (response) =>{
            this.product = response.data['product'];
            window.document.title = this.product.name + this.$Project_seotitle[this.$i18n.locale];
            this.previous = response.data['previous']['slug'];
            this.next = response.data['next']['slug'];
          });
    },
    methods: {
      getProduct() {
        this.$http.get(this.$ApiHost+'/api/get-product?slug='+this.$route.params.slug)
            .then( (response) =>{
              this.product = response.data['product'];
              window.document.title = this.product.name + this.$Project_seotitle[this.$i18n.locale];
              this.previous = response.data['previous']['slug'];
              this.next = response.data['next']['slug'];
            });
      },
    },
    watch: {
      '$route.params.slug': function () {
        this.getProduct()
      }
    }
  };
</script>
<style scoped>
</style>