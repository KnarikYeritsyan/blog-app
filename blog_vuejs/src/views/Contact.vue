<template>
  <div>
      <div class="container">
        <div class="row justify-content-center pt-5 pb-4">
          <div class="col-12 col-lg-6 justify-content-center">
            <div class="section-heading text-center">
              <h2>Կապվել Մեզ Հետ</h2>
              <p>Ուղարկեք մեզ նամակ և մենք կկապնվենք Ձեր հետ</p>
            </div>
            <div class="card-body mb-100">
              <form id="contact-form" @submit.prevent="send" method="post">
                <input hidden name="term" :value="term">
                <div class="row">
                  <div class="col-12 col-md-6">
                    <div class="form-group">
                      <input type="text" v-validate="'required'" name="name" class="form-control" id="contact-name" placeholder="Անուն"
                             :class="{'is-invalid': (fields.name && errors.has('name')) }" autofocus>
                      <span class="invalid-feedback" role="alert">
                        <label>{{ errors.first('name') }}</label>
                      </span>
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="form-group">
                      <input type="email" v-validate="'required|email'" name="email" class="form-control" id="contact-email" placeholder="Էլ․ փոստ"
                             :class="{'is-invalid': (fields.email && errors.has('email')) }">
                      <span class="invalid-feedback" role="alert">
                        <label>{{ errors.first('email') }}</label>
                      </span>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <input type="text" v-validate="'required'" name="subject" class="form-control" id="contact-subject" placeholder="Թեմա"
                             :class="{'is-invalid': (fields.subject && errors.has('subject')) }">
                      <span class="invalid-feedback" role="alert">
                        <label>{{ errors.first('subject') }}</label>
                      </span>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <textarea class="form-control" v-validate="'required'" name="message" id="message" cols="30" rows="5" placeholder="Նամակ"
                                :class="{'is-invalid': (fields.message && errors.has('message')) }"></textarea>
                      <span class="invalid-feedback" role="alert">
                        <label>{{ errors.first('message') }}</label>
                      </span>
                    </div>
                  </div>
                  <div class="form-group row justify-content-center text-center">
                    <div class="col-12 col-lg-6">
                      <span style="display: block" class="invalid-feedback" role="alert">
                         <label style="font-weight: 600; white-space: nowrap;">{{ error_message }}</label>
                      </span>
                    </div>
                  </div>
                  <div class="form-group row justify-content-center text-center">
                    <div class="col-12 col-lg-6">
                      <span style="display: block" class="valid-feedback" role="alert">
                         <label style="font-weight: 600; white-space: nowrap;">{{ success_message }}</label>
                      </span>
                    </div>
                  </div>
                  <div class="row justify-content-center text-center m-auto">
                    <div class="col-12 col-lg-6 text-center justify-content-center">
                    <i v-show="isLoading" class="fa fa-spinner fa-spin"></i>
                    </div>
                  </div>
                  <div class="col-12 text-center">
                    <button :disabled="isLoading===true" type="submit" class="btn btn-success mt-15">Ուղարկել նամակ</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
  </div>
</template>
<script>
  import Vue from 'vue';
  import i18n from '../i18n'
  import ru from 'vee-validate/dist/locale/ru';
  import hy from '../locales/validation/hy';
  import attributesRu from '../locales/validation/attributesRu'
  import attributesHy from '../locales/validation/attributesHy'
  import VeeValidate, { Validator } from 'vee-validate';
  Vue.use(VeeValidate);
  const dictionary = {
    ru: {
           attributes: attributesRu
        },
    hy: {
           attributes: attributesHy,
        }
  };
  if(i18n.locale == 'ru'){
    Validator.localize('ru', ru);
  }
  if(i18n.locale == 'am'){
    Validator.localize('hy', hy);
  }
  Validator.localize(dictionary);
  export default {
    data() {
      return {
        page:[],
        isLoading:false,
        term:'',
        error_message:'',
        success_message:'',
      };
    },
    beforeCreate(){
      fetch('https://api.ipify.org?format=json')
          .then(x => x.json())
          .then(({ ip }) => {
            this.term = ip;
          });
    },
    created() {
      // this.getPage();
    },
    methods: {
      getPage() {
        this.$http.get(this.$ApiHost+'/api/get-page?slug=contact')
            .then( (response) =>{
              this.page = response.data['page']
            });
      },
      send: function () {
        this.success_message = '';
        this.error_message = '';
        this.$validator.validateAll().then((result) => {
          if (result) {
            this.isLoading = true;
            let data = $('#contact-form').serialize();
            this.$http.post(this.$ApiHost+'/api/send-contact-message',data)
                .then( (response) =>{
                  this.isLoading = false;
                  this.success_message = response.data.message;
                  $('#contact-form')[0].reset();
                }).catch(err => {
            });
          }else {
            console.log('Not Valid');
          }
        })
      }
    },
    watch: {
      '$route.params.slug': function () {
        this.getPage()
      }
    }
  };
</script>
<style scoped>
  .valid-feedback{
    font-size: 100%;
  }
</style>