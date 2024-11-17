<template>
  <!-- Page Content -->
  <div class="row mr-0 justify-content-center mt-5 mb-4">

    <div v-for="video in videos" class="col-11 col-md-8 p-0 text-center video-div">
      <iframe v-if='video.url_type == "iframe"' class="w-100" id="you_vid" height="409" :src="video.link"
              frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen>
      </iframe>
      <div v-if='video.url_type == "facebook"' id="fb_vid" style="max-height:800px;"
           class="fb-video" :data-href="video.link" data-show-text="false"></div>
      <h2 class="text-center">{{video.title}}</h2>
      <div v-html="video.content"></div>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        videos:[],
        user: "",
        href:"https://www.facebook.com/derrickmonasterio/videos/2767723980016497/"
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
        this.$http.get(this.$ApiHost+'/api/get-videos')
            .then( (response) =>{
              this.videos = response.data['videos'];
              $(document).ready(function(){
                FB.XFBML.parse()
              })
            });
      }
    }
  };
</script>