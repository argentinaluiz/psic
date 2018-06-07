import {ClassSet} from '../services/resources';
import Vue from 'vue';
import ADMIN_CONFIG from '../services/adminConfig';

const state = {
    sets: []
};

const mutations = {
    add(state, research){
        state.sets.push(research);
    },
    set(state,sets){
        state.sets = sets;
    },
    destroy(state,setId){
        let index = state.sets.findIndex((item) => {
            return item.id == setId;
        });
        if(index!=-1){
            state.sets.splice(index,1);
        }
    }
};

const actions = {
    query(context,researchId){
        return Vue.http.get(`${ADMIN_CONFIG.ADMIN_URL}/researches/${researchId}/sets`)
            .then(response => {
                context.commit('set',response.data);
            })
    },
    store(context, {categoryId, researchId, psychoanalystId}){
        return ClassSet.save({research: researchId},
            {category_id:categoryId, psychoanalyst_id: psychoanalystId}
            )
            .then(response => {
                context.commit('add',response.data)
            });
    },
    destroy(context,{setId, researchId}){
        return ClassSet.delete({research: researchId, set: setId})
            .then(response => {
                context.commit('destroy', setId)
            });
    }
};

const module = {
    namespaced: true,
    state,mutations,actions
};

export default module;