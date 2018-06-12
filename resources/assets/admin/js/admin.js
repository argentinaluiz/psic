require('./bootstrap');

window.Vue = require('vue');

//Vue.component('example', require('./components/Example.vue'));
Vue.component('class-patient', require('./components/class_information/ClassPatient.vue'));
Vue.component('class-psychoanalyst', require('./components/research/ClassPsychoanalyst.vue'));
Vue.component('class-meeting', require('./components/class_information/ClassMeeting.vue'));
Vue.component('class-choosing', require('./components/type_choices/ClassChoosing.vue'));
Vue.component('class-opting', require('./components/type_choices/ClassOpting.vue'));
Vue.component('class-tool', require('./components/tool/ClassTool.vue'));
Vue.component('class-toolkit', require('./components/tool/ClassToolkit.vue'));


const app = new Vue({
    el: '#wrapper'
});