<template>
  <div>
      <div class="owl-carousel owl-theme" id="home-carousel">
          <div class="carousel-item" v-for="slider in sliders" :style="`background-image: url(${slider.image_name})`"></div>
      </div>
      <!-- Page Content -->
      <div class="container mb-5">
          <div class="row text-center justify-content-center">
              <div class="col-10 col-sm-6 col-md-3 mt-4">
                  <img src="/img/Always-Hungry.png"/>
                  <h5>Մենք Միշտ Ձգտում ենք Ավելիին</h5>
              </div>
              <div class="col-10 col-sm-6 col-md-3 mt-4">
                  <img src="/img/Passion.png"/>
                  <h5>Կիրքը մեր Վառելիքն է</h5>
              </div>
              <div class="col-10 col-sm-6 col-md-3 mt-4">
                  <img src="/img/HavingFun.png"/>
                  <h5>Զվարճանալով Մենք ավելի շատ ենք Աշխատում</h5>
              </div>
              <div class="col-10 col-sm-6 col-md-3 mt-4">
                  <img src="/img/Love.png"/>
                  <h5>Մենք Սիրում ենք Միմյանց</h5>
              </div>
              <div class="col-10 col-sm-6 col-md-3 mt-4">
                  <img src="/img/Grateful.png"/>
                  <h5>Երախտագիտությունը մեր Մտածելակերպն է</h5>
              </div>
              <div class="col-10 col-sm-6 col-md-3 mt-4">
                  <img src="/img/GiveMore.png"/>
                  <h5>Մեր Ստանդարտն է-Տալ Ավլին քան Սպասվում է</h5>
              </div>
              <div class="col-10 col-sm-6 col-md-3 mt-4">
                  <img src="/img/DoWhatsRight.png"/>
                  <h5>Մենք չենք փնտրում Հեշտ ուղիներ։ Անում ենք այն, ինչ Ճիշտ է</h5>
              </div>
          </div>
      </div>
      <!-- Page 2 Content -->
      <div id="fb_vid" style="max-height: 500px" class="fb-video" :data-href="href" data-show-text="false" data-width="auto"></div>

      <div class="content2">
          <div class="background-layer">
              <h2 class="text-center pt-5">Մեր ընտանիքի անդամ լինելու առավելությունները</h2>
              <div class="row mr-0 text-center justify-content-center mt-5 pt-5 mr-0">
                  <div class="col-md-4 mb-1">
                      <i class="far fa-3x fa-gem mb-3 text-danger"></i>
                      <h5>Արդյունավետության Բոնուսներ</h5>
                  </div>
                  <div class="col-md-4 mb-1">
                      <i class="far fa-3x fa-handshake mb-3 text-danger"></i>
                      <h5>Մրցանակներ և Ճանաչում</h5>
                  </div>
                  <div class="col-md-4 pb-5">
                      <i class="far fa-3x fa-thumbs-up mb-3 text-danger"></i>
                      <h5>Ոգեշնչող իրադարձություններ</h5>
                  </div>
              </div>
          </div>
      </div>
      <!-- Page 3 Content -->
      <div class="bg-dark pt-1">
          <div class="container text-center text-warning pt-2">
              <h5>Հետաքրքրե՞ց մեր արտադրանքը: Գրանցվիր և օգտվիր աննախադեպ հնարավորություններից</h5>
          </div>
          <div class="text-center">
              <a target="_blank" href="https://retail.totallifechanges.com/Khanoyankima/enrollment">
                  <button class="btn inp-home pb-2" style=" color: #FFFFFF;">Գրանցվել հիմա!</button>
              </a>
          </div>
      </div>
      <div class="content3">
          <div class="background-layer1">
              <div class="container pt-3">
                  <div class="text-center text-danger mb-3">
                      <h2 class="display-4" style="text-shadow: 3px 2px blue;">ԹՎԵՐ և ՓԱՍՏԵՐ</h2>
                  </div>
                  <div class="row text-center justify-content-center">
                      <div class="col-7 col-sm-6 col-md-5 col-lg-4 col-xl-3  mt-4" style="min-width: 270px;">
                          <div class="content3-1-1" style="min-width: 260px;">
                              <div class="bg-success text-white content3-1">
                                  <h5>ՔԱՇԻ ԿՈՐՈՒՍՏ</h5>
                                  <h3>$ 212</h3>
                                  <h5>ՄԼՐԴ</h5>
                              </div>
                          </div>
                      </div>
                      <div class="col-7 col-sm-6 col-md-5 col-lg-4 col-xl-3  mt-4" style="min-width: 270px;">
                          <div class="content3-1-1" style="min-width: 260px;">
                              <div class="bg-warning text-white content3-1">
                                  <!--<h5>ԱՌՈՂՋՈՒԹՅՈՒՆ և ԼԱՎ ԻՆՔՆԱԶԳԱՑՈՂՈՒԹՅՈՒՆ</h5>-->
                                  <h5>Առողջություն <br>և Լավ Ինքնազգացողություն</h5>
                                  <h3>$ 4.2</h3>
                                  <h5>ՏՐԼՆ</h5>
                              </div>
                          </div>
                      </div>
                      <div class="col-7 col-sm-6 col-md-5 col-lg-4 col-xl-3  mt-4" style="min-width: 270px;">
                          <div class="content3-1-1" style="min-width: 260px;">
                              <div class="bg-primary text-white content3-1">
                                  <h5>CBD<br/>&#40;ԿԱՆԱԲԻԴԻՈԼ&#41;</h5>
                                  <h3>$ 591</h3>
                                  <h5>ՄԼՆ</h5>
                              </div>
                          </div>
                      </div>

                      <div class="col-7 col-sm-6 col-md-5 col-lg-4 col-xl-3 mt-4 pb-4" style="min-width: 270px;">
                          <div class="content3-1-1" style="min-width: 260px;">
                              <div class="bg-danger text-white content3-1">
                                  <!--<h5>ՍՈՒՐՃԻ<br/> ԱՐԴՅՈՒՆԱԲԵՐՈՒԹՅՈՒՆ</h5>-->
                                  <h5>ՍՈՒՐՃԻ<br/> Արդյունաբերություն</h5>
                                  <h3>$ 100</h3>
                                  <h5>ՄԼՐԴ</h5>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
  export default {
  name: 'Home',
  data () {
    return {
      slider: "",
      // href: "",
      href: "",
      sliders: [],
    }
  },
  mounted(){
    // console.log($('.hero-post-slides'))
    // require('magnific-popup');
    // require('owl.carousel');
    // require('../../public/js/active')
  },
  beforeCreate(){
    // this.getCat();
  },
  created() {
    this.getSliders();
    require('../../public/vendor/owlcarousel/owl.carousel.min');
    // require('../../public/js/bootstrap/bootstrap.min');
    // require('owl.carousel');
  },
  methods: {
    getSliders: function () {
      this.$http.get(this.$ApiHost+'/api/sliders')
          .then( (response) =>{
            this.sliders = response.data['sliders'];
            $(document).ready(function(){
              $("#home-carousel").owlCarousel({
                items: 1,
                loop: true,
                nav: true,
                autoplay: true,
                autoplayTimeout:5000,
                autoplayHoverPause:true,
                smartSpeed: 2000
              });
              $( ".owl-prev").html('<i style="position: absolute;top: 150px;left: 3%;" class="fa fa-2x fa-chevron-left"></i>');
              $( ".owl-next").html('<i style="position: absolute;top: 150px;right: 3%;" class="fa fa-2x fa-chevron-right"></i>');
            });
          });
    }
  }
}
</script>
<style scoped>
</style>
