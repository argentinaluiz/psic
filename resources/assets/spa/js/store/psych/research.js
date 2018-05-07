import {Psychoanalyst} from '../../services/resources';

const state = {
    researches:[],
    research: null
};

const mutations = {
    setResearches(state, researches){
        state.researches = researches;
    },
    setResearch(state, research){
        state.research = research;
    }
};

const actions = {
    query(context){
        Psychoanalyst.research.query()
            .then(response => {
                context.commit('setResearches', response.data);
            });
    },
    get(context, researchId){
        Psychoanalyst.research.get({class_information: researchId})
            .then(response => {
                context.commit('setResearch', response.data);
            });
    }
};

export default {
    namespaced: true,
    state, mutations, actions
}