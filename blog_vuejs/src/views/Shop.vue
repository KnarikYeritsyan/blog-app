<template>
  <div>
    <!-- Page Content -->
    <div>
      <h2 class="text-center mt-5 mb-4">Products</h2>
    </div>
    <div class="container products-category mb-4">
      <!--<a><button class="btn category active">Best Sellers</button></a>-->
      <router-link :to="`/${$i18n.locale}/products`"><button class="btn category" :class="{'active':!$route.query.category}">Ամբողջը</button></router-link>
      <a v-for="category in categories" @click="sortCategory(category.slug)"><button class="btn category" :class="{'active':$route.query.category == category.slug}">{{category.name}}</button></a>
    </div>
    <div>
      <select @change="sortCategory($event.target.value)" class="products-category-responsive d-none mb-4" style="width:70%;height:45px;margin: auto;
        border-top: 1px solid;">
        <option value="all">
          Ամբողջը
        </option>
        <option v-for="category in categories" :value="category.slug" :selected="$route.query.category == category.slug">
          {{category.name}}
        </option>

      </select>
    </div>
    <div class="container">
      <div class="row">
        <div v-for="product in products" class="image-div text-center col-6 col-lg-4 mb-4">
          <router-link :to="`/${$i18n.locale}${product.slug}`">
            <div v-if="product.tag" class="product-tag pl-2 pr-2" :style="`background: ${product.tag.color}`">
              {{product.tag.name}}
            </div>
            <img :src="product.image_name" class="w-100" :alt="product.name">
            <h4>{{product.name}}</h4>
          </router-link>
          <p>${{product.price}} USD</p>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  export default {
    data() {
      return {
        products:[],
        categories:[],
      };
    },
    beforeCreate() {
    },
    created() {
      // console.log(this.$route)
      if(this.$route.query){
        let queryString = $.param(this.$route.query);
        this.getProducts(this.$ApiHost+'/api/get-products?'+queryString);
      }else {
        this.getProducts();
      }
    },
    methods: {
      getProducts(page_url) {
        page_url = page_url || this.$ApiHost+'/api/get-products';
        this.$http.get(page_url)
            .then( (response) =>{
              this.products = response.data['products'];
              this.categories = response.data['categories'];
            });
      },
      sortCategory(value) {
        let query = {
          // category: event.target.value
          category: value
        };
        if(value == 'all'){
          this.$router.push({ query: '' })
        }else{
          this.$router.push({ query: query })
        }
      },
    },
    watch: {
      '$route.query': function () {
        if(this.$route.query){
          let queryString = $.param(this.$route.query);
          this.getProducts(this.$ApiHost+'/api/get-products?'+queryString);
        }else {
          this.getProducts();
        }
      }
    }
  };
</script>
<style scoped>
  .btn-filter{
    display: none;
  }
  @media only screen and (max-width: 767px) {
    .btn-filter{
      display: inline-block;
    }
    #filter-area{
      display: none;
    }
  }
</style>