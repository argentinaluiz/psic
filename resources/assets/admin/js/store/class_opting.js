import {ClassOpting} from '../services/resources';
import Vue from 'vue';
import ADMIN_CONFIG from '../services/adminConfig';

const state = {
    optings: []
};

const mutations = {
    add(state, question_choice){
        state.optings.push(question_choice);
    },
    set(state,optings){
        state.optings = optings;
    },
    destroy(state,optingId){
        let index = state.optings.findIndex((item) => {
            return item.id == optingId;
        });
        if(index!=-1){
            state.optings.splice(index,1);
        }
    }
};

const actions = {
    query(context,typeChoiceId){
        return Vue.http.get(`${ADMIN_CONFIG.ADMIN_URL}/type_choices/${typeChoiceId}/optings`)
            .then(response => {
                context.commit('set',response.data);
            })
    },
    store(context, {questionChoiceId, typeChoiceId}){
        return ClassOpting.save({type_choice:typeChoiceId},
            {question_choice_id:questionChoiceId})
            .then(response => {
                context.commit('add',response.data)
            });
    },
    destroy(context,{optingId, typeChoiceId}){
        return ClassOpting.delete({type_choice: typeChoiceId,opting: optingId})
            .then(response => {
                context.commit('destroy',optingId)
            });
    }
};

const module = {
    namespaced: true,
    state,mutations,actions
};

export default module;