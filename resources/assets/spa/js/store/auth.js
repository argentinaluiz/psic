import JwtToken from '../services/jwt-token';

const state = {
    user: null,
    check: null
};

const mutations = {
    authenticated(state){
        
    },
    unauthenticated(state){
        
    }
};

const actions = {
    login(username, password){
        return JwtToken.accessToken(username, password);
    },
    logout(){
        return JwtToken.revokeToken();
    }
};

const module = {
    namespaced: true, // consegue acessar o state, um dispatch() para disparar uma ação, fazer commit etc. 
    state,mutations,actions
};

export default module;