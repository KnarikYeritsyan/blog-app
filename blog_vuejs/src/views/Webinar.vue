<template>
  <!-- Page Content -->
  <div class="row mr-0 justify-content-center mt-5 mb-4 col-md- flex-row-reverse">
    <div class="col-10 col-md-4 d-flex flex-column justify-content-center">
      <h4 class="text-center">{{webinar.title}}</h4>
      <div v-html="webinar.content"></div>
    </div>
    <div class="col-12 col-md-6 pr-0">
      <iframe v-if='webinar.url_type == "iframe"' class="w-100" id="you_vid" height="409" :src="webinar.link"
              frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen>
      </iframe>
      <div v-if='webinar.url_type == "facebook"' id="fb_vid" style="max-height: 500px" class="fb-video" :data-href="webinar.link" data-show-text="false" data-width="auto"></div>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        webinar:[],
        user: "",
      };
    },
    beforeCreate() {
      (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = '//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v7.0';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
      // this.$store.dispatch('FB_Parse');
    },
    created() {
      this.getVideos();
    },
    methods: {
      getVideos: function () {
        this.$http.get(this.$ApiHost+'/api/get-webinar')
            .then( (response) =>{
              this.webinar = response.data['webinar'];
              $(document).ready(function(){
                FB.XFBML.parse()
              })
            });
      }
    }
  };
</script>