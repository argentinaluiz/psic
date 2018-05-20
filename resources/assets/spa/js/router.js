import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './router.map';
import AppComponent from './components/App.vue';
import store from './store/store';

const router = new VueRouter({
   // mode: 'history',  retira a # dos endereços (não usar nesse caso, porque não irá reconhecer as rotas)
    routes
});
//Quando trabalhamos com vue-router, temos um recurso que trabalha como um interceptador nas rotas chamado beforeEach. Isso quer dizer que vamos conferir o token antes que cada página seja renderizada. Também devemos verificar se a página é realmente protegida, pois pode se tratar de uma página liberada para qualquer usuário, mesmo sem autenticação.
router.beforeEach((to, from, next) => {
    if (to.meta.auth && !store.state.auth.check) {
        return router.push({name: 'login'});
    }
    next();
});

router.beforeEach((to, from, next) => {
    if (store.state.auth.user) {
       if(store.getters['auth/isPsych'] && to.name.startsWith('patient')){
            return router.push({name: 'psych.class_meetings.list'});
       }
       if(store.getters['auth/isPatient'] && to.name.startsWith('psych')){
            return router.push({name: 'patient.class_informations.list'});
        }
    }
    next();
});

new Vue({
    store,
    router,
    el: '#wrapper',
    components: {
        'app': AppComponent
    }
});

export default router;