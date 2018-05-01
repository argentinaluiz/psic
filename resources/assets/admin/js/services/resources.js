import 'vue-resource';
import ADMIN_CONFIG from './adminConfig';
import Vue from 'vue';

//Caminho para configurar um header que será passado na requisição
Vue.http.headers.common['X-CSRF-Token'] = $('meta[name=csrf-token]').attr('content');

let ClassPatient = Vue.resource(`${ADMIN_CONFIG.ADMIN_URL}/class_informations/{class_information}/patients/{patient}`);
let ClassMeeting = Vue.resource(`${ADMIN_CONFIG.ADMIN_URL}/class_informations/{class_information}/meetings/{meeting}`);
let ClassChoosing = Vue.resource(`${ADMIN_CONFIG.ADMIN_URL}/type_choices/{type_choice}/choosings/{choosing}`);
let ClassPsychoanalyst = Vue.resource(`${ADMIN_CONFIG.ADMIN_URL}/researches/{research}/psychoanalysts/{psychoanalyst}`);

export {
    ClassPatient, ClassMeeting, ClassChoosing, ClassPsychoanalyst
};