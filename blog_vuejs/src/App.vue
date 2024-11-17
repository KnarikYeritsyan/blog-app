<template>
  <div id="app">
    <header class="bg-success pt-1 text-right pr-5">
      <div>
        <a target="_blank" v-for="(item,index) in social_items" :href="item.link"><i class="h5 item-link header-link" :class="{'fab': item.type != 'envelope','fa': item.type == 'envelope',['fa-'+item.type]:true,'ml-2':index !==0,'mr-2':(index+1 == social_items.length)}"></i></a>
      </div>
    </header>
    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg bg-warning position-sticky p-0 m-0">
      <div class="container">
        <router-link class="navbar-brand" :to="`/${$i18n.locale}`" data-toggle="collapse" data-target=".navbar-collapse.show"><img style="background:transparent;" src="/img/logo.png"/></router-link>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <!--<span class="navbar-toggler-icon"></span>-->
          <span class="fas fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <router-link class="nav-link menu-link h5" :to="`/${$i18n.locale}/about`" data-toggle="collapse" data-target=".navbar-collapse.show">Մեր Մասին</router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link menu-link h5" :to="`/${$i18n.locale}/products`" data-toggle="collapse" data-target=".navbar-collapse.show">Ապրանքներ</router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link menu-link h5" :to="`/${$i18n.locale}/marketing`" data-toggle="collapse" data-target=".navbar-collapse.show">Մարկետինգ</router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link menu-link h5" :to="`/${$i18n.locale}/videos`" data-toggle="collapse" data-target=".navbar-collapse.show">Վիդեոներ</router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link menu-link h5" :to="`/${$i18n.locale}/webinar`" data-toggle="collapse" data-target=".navbar-collapse.show">Վեբինար</router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link menu-link h5" :to="`/${$i18n.locale}/register`" data-toggle="collapse" data-target=".navbar-collapse.show">Գրանցվել</router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link menu-link h5" :to="`/${$i18n.locale}/contact`" data-toggle="collapse" data-target=".navbar-collapse.show">Կապ</router-link>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <router-view></router-view>
    <!-- Footer -->
    <footer style="background: blueviolet;">
      <div class="row m-0">
        <div class="col-xl-3 col-lg-3 col-md-6 text-center">
          <div class="container">
            <router-link class="navbar-brand" :to="`/${$i18n.locale}`"><img style="background:transparent;" src="/img/logo.png" class="w-50"/></router-link>
          </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-6">
          <div class="container">
            <nav class="navbar fixed-top navbar-expand-lg position-sticky p-0 m-0"  style="z-index:1;">
              <div class="collapse navbar-collapse d-inline-block justify-content-center" id="navbarResponsive">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <router-link class="nav-link h5 pl-2 footer-link" :to="`/${$i18n.locale}/about`">Մեր Մասին</router-link>
                  </li>
                  <li class="nav-item">
                    <router-link class="nav-link h5 pl-2 footer-link" :to="`/${$i18n.locale}/products`">Ապրանքներ</router-link>
                  </li>
                  <li class="nav-item">
                    <router-link class="nav-link h5 pl-2 footer-link" :to="`/${$i18n.locale}/marketing`">Մարկետինգ</router-link>
                  </li>
                  <li class="nav-item">
                    <router-link class="nav-link h5 pl-2 footer-link" :to="`/${$i18n.locale}/videos`">Վիդեոներ</router-link>
                  </li>
                  <li class="nav-item">
                    <router-link class="nav-link h5 pl-2 footer-link" :to="`/${$i18n.locale}/webinar`">Վեբինար</router-link>
                  </li>
                  <li class="nav-item">
                    <router-link class="nav-link h5 pl-2 footer-link" :to="`/${$i18n.locale}/register`">Գրանցվել</router-link>
                  </li>
                  <li class="nav-item">
                    <router-link class="nav-link h5 pl-2 footer-link" :to="`/${$i18n.locale}/contact`">Կապ</router-link>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
      <div class="row mt-3 mr-0 ml-0">
        <div class="col-sm-6">
          <div class="container">
            <p class="m-0 text-white">Copyright &copy; Your Website {{year}}</p>
          </div>
        </div>
        <div class="col-sm-6 text-right">
          <div class="container">
            <a target="_blank" v-for="(item,index) in social_items" :href="item.link"><i class="h5 footer-link" :class="{'fab': item.type != 'envelope','fa': item.type == 'envelope',['fa-'+item.type]:true,'ml-2':index !==0,'mr-2':(index+1 == social_items.length)}"></i></a>
          </div>
        </div>
      </div>

      <!-- /.container -->
    </footer>

  </div>
</template>

<script>
    import { mapGetters } from 'vuex';

    export default {
  data () {
    return {
      langs: ['am', 'en', 'ru'],
      year: new Date().getFullYear(),
      slider: "",
      settings:'',
      menu:[],
      social_items:[],
    }
  },
  beforeCreate() {
    this.$http.get(this.$ApiHost+'/api/settings')
        .then( (response) =>{
          this.social_items = response.data['social_items'];
        });
  },
  mounted() {
  },
  methods: {
    stripTrailingSlash: function(str) {
      return str.replace(/\/$/, '')
    },
    setlocale(locale){
      this.$i18n.locale = locale;
      this.$router.push({
        params:{lang:locale}
      });
      window.location.href = this.stripTrailingSlash(location.href);
    },
  }
}
</script>

<style scoped>
  .adisabled{
      pointer-events: none;
  }
</style>
