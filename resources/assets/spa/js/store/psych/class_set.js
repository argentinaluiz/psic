import {Psychoanalyst} from '../../services/resources';

const state = {
    classSets:[],
    classSet: null
};

const mutations = {
    setClassSets(state, classSets){
        state.classSets = classSets;
    },
    setClassSet(state, classSet){
        state.classSet = classSet;
    }
};

const actions = {
    query(context){
        Psychoanalyst.classSet.query()
            .then(response => {
                context.commit('setClassSets', response.data);
            });
    },
    get(context, classSetId){
        Psychoanalyst.classSet.get({class_set: classSetId})
            .then(response => {
                context.commit('setClassSet', response.data);
            });
    }
};

export default {
    namespaced: true,
    state, mutations, actions
}