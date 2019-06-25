import Vue from 'vue';
import Vuex from 'vuex';
import IssueModule from './issues';

Vue.use(Vuex);

const store = new Vuex.Store ({
    modules: {
        issue: IssueModule,
    }
});

export default store;