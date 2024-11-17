<template>
  <div>
    <!-- Page Content -->
    <div>
      <h2 class="text-center mt-5 mb-4">Products</h2>
    </div>
    <div class="container products-category mb-4">
      <a><button class="btn category active">Best Sellers</button></a>
      <a><button class="btn category">Kits and Packs</button></a>
      <a><button class="btn category"> Top Rated</button></a>
      <a><button class="btn category">Health and Wellness</button></a>
      <a><button class="btn category"> Coffee</button></a>
      <a><button class="btn category">Body and Soul</button></a>
      <a><button class="btn category"> TLC Swag</button></a>
      <a><button class="btn category">TLC Tools</button></a>
      <a><button class="btn category">Become A Life Changer</button></a>
    </div>
    <div>
      <select class="products-category-responsive d-none mb-4" style="width:70%;height:45px;margin: auto;
        border-top: 1px solid;">
        <option>
          <a href="">Best Sellers</a>
        </option>
        <option>
          <a href="">Kits and Packs</a>
        </option>
        <option>
          <a href="">Top Rated</a>
        </option>
        <option>
          <a href="">Health and Wellness</a>
        </option>
        <option>
          <a href="">Coffee</a>
        </option>
        <option>
          <a href="">Body and Soul</a>
        </option>
        <option>
          <a href="">TLC Swag</a>
        </option>
        <option>
          <a href="">TLC Tools</a>
        </option>
        <option>
          <a href="">Become A Life Changer</a>
        </option>

      </select>
    </div>
    <div class="container">
      <div class="row">
        <div class="image-div text-center col-6 col-lg-4 mb-4">
          <a href="product.html">
            <div class="product-tag pl-2 pr-2" style="background: #e61d47">
              sale
            </div>
            <img src="/img/products/product1.jpg" class="w-100">
            <h4>INSTANT IASO TEA - 50 SACHETS</h4>
          </a>
          <p>$59.95 USD</p>
        </div>
        <div class="image-div text-center col-6 col-lg-4 mb-4">
          <a href="product.html">
            <div class="product-tag pl-2 pr-2" style="background: #e61d47">
              sale
            </div>
            <img src="/img/products/product2.jpg" class="w-100">
            <h4>IASO TEA 5 PACK</h4>
          </a>
          <p>$49.95 USD</p>
        </div>
        <div class="image-div text-center col-6 col-lg-4 mb-4">
          <a href="product.html">
            <div class="product-tag pl-2 pr-2" style="background: #e61d47">
              sale
            </div>
            <img src="/img/products/product3.jpg" class="w-100">
            <h4>NutraBurst</h4>
          </a>
          <p>$54.95 USD</p>
        </div>
        <div class="image-div text-center col-6 col-lg-4 mb-4">
          <a href="product.html">
            <div class="product-tag pl-2 pr-2" style="background: #e61d47">
              sale
            </div>
            <img src="/img/products/product4.jpg" class="w-100">
            <h4>NRG</h4>
          </a>
          <p>$54.95 USD</p>
        </div>
        <div class="image-div text-center col-6 col-lg-4 mb-4">
          <a href="product.html">
            <div class="product-tag pl-2 pr-2" style="background: #e61d47">
              sale
            </div>
            <img src="/img/products/product5.jpg" class="w-100">
            <h4>RESOLUTION NO 20</h4>
          </a>
          <p>$59.95 USD</p>
        </div>
        <div class="image-div text-center col-6 col-lg-4 mb-4">
          <a href="product.html">
            <div class="product-tag pl-2 pr-2" style="background: #e61d47">
              sale
            </div>
            <img src="/img/products/product6.jpg" class="w-100">
            <h4>DELGADA COFFEE</h4>
          </a>
          <p>$54.95 USD</p>
        </div>
      </div>
    </div>
  </div>
</template>
<script>

  export default {
    data() {
      return {
        category:[],
        products:[],
      };
    },
    created() {
      // console.log(this.$route)
      if(this.$route.query){
        let queryString = $.param(this.$route.query);
        this.getCategory(this.$ApiHost+'/api/get-category?slug='+this.$route.params.slug+'&'+queryString);
      }else {
        this.getCategory();
      }
    },
    methods: {
      getCategory(page_url) {
        page_url = page_url || this.$ApiHost+'/api/get-category?slug='+this.$route.params.slug;
        this.$http.get(page_url)
            .then( (response) =>{
              this.category = response.data['category'];
              window.document.title = this.category.name + this.$Project_seotitle[this.$i18n.locale];
              this.products = response.data['products']['data']
            });
      },
      showProducts(event) {
        let query = {
          // page: this.$route.query.page,
          show_items: event.target.value,
          sort_by: this.$route.query.sort_by,
        };
        this.$router.push({ query: query })
      },
    },
    watch: {
      '$route.params.slug': function () {
        this.getCategory()
      },
      '$route.query': function () {
        if(this.$route.query){
          let queryString = $.param(this.$route.query);
          this.getCategory(this.$ApiHost+'/api/get-category?slug='+this.$route.params.slug+'&'+queryString);
        }else {
          this.getCategory();
        }
      }
    }
  };
</script>
<style scoped>
</style>