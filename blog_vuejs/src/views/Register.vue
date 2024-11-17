<template>
  <!-- Page Content -->
  <div>
    <div class="container">
      <div class="pt-5">
        <img src="/img/register/register1.png" class="w-100"
             style="border:2px solid #489877;box-shadow: 0px 0px 0px 5px #2ec788;"/>
      </div>
      <div class="pt-5">
        <img src="/img/register/register2.png" class="w-100"
             style="border:2px solid #489877;box-shadow: 0px 0px 0px 5px #2ec788;"/>
      </div>
    </div>

    <div style="background:#f2f2f2;" class="text-center pb-4 mt-5">
      <h2 class="pb-4 pt-4">Միացիր մեր ընտանիքին, Մենք սպասում ենք քեզ!</h2>
      <a href="https://retail.totallifechanges.com/Khanoyankima/enrollment" target="_blank">
        <button class="btn p-3 pl-5 pr-5 register-button ">ԳՐԱՆՑՎԵԼ
          <i class="fa fa-arrow-right ml-3" aria-hidden="true"></i>
        </button>
      </a>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        user: "",
      };
    },
    beforeCreate() {
    },
    created() {
      // this.getVideos();
    },
    methods: {
      getVideos: function () {
      }
    }
  };
</script>