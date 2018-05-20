import {Psychoanalyst} from '../../services/resources';

const state = {
    categories:[],
    category: null
};

const mutations = {
    setCategories(state, categories){
        state.categories = categories;
    },
    setCategory(state, category){
        state.category = category;
    }
};

const actions = {
    query(context){
        Psychoanalyst.category.query()
            .then(response => {
                context.commit('setCategories', response.data);
            });
    },
    get(context, categoryId){
        Psychoanalyst.category.get({category: categoryId})
            .then(response => {
                context.commit('setCategory', response.data);
            });
    }
};

export default {
    namespaced: true,
    state, mutations, actions
}