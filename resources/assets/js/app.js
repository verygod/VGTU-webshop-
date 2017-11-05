var Vue = require('vue');

var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue!'
  }
})

Vue.component('autocomplete',require('./components/Autocomplete.vue'));
