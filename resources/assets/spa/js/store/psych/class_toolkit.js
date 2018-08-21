import {Psychoanalyst} from '../../services/resources';

const state = {
    classToolkits:[],
    classToolkit: null
};

const mutations = {
    setClassToolkits(state, classToolkits){
        state.classToolkits = classToolkits;
    },
    setClassToolkit(state, classToolkit){
        state.classToolkit = classToolkit;
    }
};

const actions = {
    query(context){
        Psychoanalyst.classToolkit.query()
            .then(response => {
                context.commit('setClassToolkits', response.data.data.data);
            });
    },
    get(context, classToolkitId){
        Psychoanalyst.classToolkit.get({class_toolkit: classToolkitId})
            .then(response => {
                context.commit('setClassToolkit', response.data);
            });
    }
};

export default {
    namespaced: true,
    state, mutations, actions
}