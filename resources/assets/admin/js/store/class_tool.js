//trabalhar o vuex voltado para modules
import {ClassTool} from '../services/resources';
import 'vue-resource';
import Vue from 'vue';
import ADMIN_CONFIG from '../services/adminConfig';

const state = {
    psychoanalysts: []
};

const mutations = {
    add(state, psychoanalyst){
        state.psychoanalysts.push(psychoanalyst);
    },
    set(state,psychoanalysts){
        state.psychoanalysts = psychoanalysts;
    },
    destroy(state,psychoanalystId){
        let index = state.psychoanalysts.findIndex((item) => {
            return item.id == psychoanalystId;
        });
        if(index!=-1){
            state.psychoanalysts.splice(index,1);
        }
    }
};

const actions = {
    query(context,toolId){
        return Vue.http.get(`${ADMIN_CONFIG.ADMIN_URL}/tools/${toolId}/psychoanalysts`)
            .then(response => {
                context.commit('set',response.data);
            })
    },
    store(context, {psychoanalystId, toolId}){
        return ClassTool.save({tool: toolId},{psychoanalyst_id: psychoanalystId})
            .then(response => {
                context.commit('add',response.data)
            })
    },
    destroy(context,{psychoanalystId, toolId}){
        return ClassTool.delete({tool: toolId,psychoanalyst: psychoanalystId})
            .then(response => {
                context.commit('destroy',psychoanalystId)
            });
    }
};

const module = {
    namespaced: true, // consegue acessar o state, um dispatch() para disparar uma ação, fazer commit etc. 
    state,mutations,actions
};

export default module;