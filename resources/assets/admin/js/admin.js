require('./bootstrap');

window.Vue = require('vue');

//Vue.component('example', require('./components/Example.vue'));
Vue.component('class-patient', require('./components/class_information/ClassPatient.vue'));
Vue.component('class-meeting', require('./components/class_information/ClassMeeting.vue'));

const app = new Vue({
    el: '#wrapper'
});