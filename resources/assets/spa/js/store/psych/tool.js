import {Psychoanalyst} from '../../services/resources';

const state = {
    tools:[],
    tool: null
};

const mutations = {
    setTools(state, tools){
        state.tools = tools;
    },
    setTool(state, tool){
        state.tool = tool;
    }
};

const actions = {
    query(context){
        Psychoanalyst.tool.query()
            .then(response => {
                context.commit('setTools', response.data);
            });
    },
    get(context, toolId){
        Psychoanalyst.tool.get({tools: toolId})
            .then(response => {
                context.commit('setTool', response.data);
            });
    }
};

export default {
    namespaced: true,
    state, mutations, actions
}