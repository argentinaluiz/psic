//Administra todos os modules de armazém
import Vuex from 'vuex';
import classPatient from './class_patient';
import classPsychoanalyst from './class_psychoanalyst';
import classMeeting from './class_meeting';
import classChoosing from './class_choosing';

export default new Vuex.Store({
    modules: {
        //'classPatient': classPatient representado de modo simplificado por classPatient
        classPatient, classPsychoanalyst, classMeeting, classChoosing
    }
});