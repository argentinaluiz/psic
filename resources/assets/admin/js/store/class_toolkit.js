import {ClassToolkit} from '../services/resources';
import Vue from 'vue';
import ADMIN_CONFIG from '../services/adminConfig';

const state = {
    toolkits: []
};

const mutations = {
    add(state, tool){
        state.toolkits.push(tool);
    },
    set(state,toolkits){
        state.toolkits = toolkits;
    },
    destroy(state,toolkitId){
        let index = state.toolkits.findIndex((item) => {
            return item.id == toolkitId;
        });
        if(index!=-1){
            state.toolkits.splice(index,1);
        }
    }
};

const actions = {
    query(context,toolId){
        return Vue.http.get(`${ADMIN_CONFIG.ADMIN_URL}/tools/${toolId}/toolkits`)
            .then(response => {
                context.commit('set',response.data);
            })
    },
    store(context, {rankId,subRankId, subSubRankId, toolId}){
        return ClassToolkit.save({tool: toolId},
            {rank_id:rankId,sub_rank_id:subRankId ,sub_sub_rank_id: subSubRankId}
            )
            .then(response => {
                context.commit('add',response.data)
            });
    },
    destroy(context,{toolkitId, toolId}){
        return ClassToolkit.delete({tool: toolId,toolkit: toolkitId})
            .then(response => {
                context.commit('destroy',toolkitId)
            });
    }
};

const module = {
    namespaced: true,
    state,mutations,actions
};

export default module;