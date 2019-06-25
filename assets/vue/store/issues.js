import IssuesAPI from '../api/issue';

export default {
    namespaced: true,
    state: {
        isLoading: false,
        error: null,
        issues: [],
    },
    getters: {
        isLoading (state) {
            return state.isLoading;
        },
        hasError (state) {
            return state.error !== null;
        },
        error (state) {
            return state.error;
        },
        hasIssues (state) {
            return state.issues.length > 0;
        },
        issues (state) {
            return state.issues;
        },
    },
    mutations: {
        ['CREATING_ISSUES'](state) {
            state.isLoading = true;
            state.error = null;
        },
        ['CREATING_ISSUES_SUCCESS'](state, issue) {
            state.isLoading = false;
            state.error = null;
            state.issues.unshift(issue);
        },
        ['CREATING_ISSUES_ERROR'](state, error) {
            state.isLoading = false;
            state.error = error;
            state.issues = [];
        },
        ['FETCHING_ISSUES'](state) {
            state.isLoading = true;
            state.error = null;
            state.issues = [];
        },
        ['FETCHING_ISSUES_SUCCESS'](state, issues) {
            state.isLoading = false;
            state.error = null;
            state.issues = issues;
        },
        ['FETCHING_ISSUES_ERROR'](state, error) {
            state.isLoading = false;
            state.error = error;
            state.issues = [];
        },
    },
    actions: {
        createIssues ({commit}, message) {
            commit('CREATING_ISSUES');
            return IssuesAPI.create(message)
                .then(res => commit('CREATING_ISSUES_SUCCESS', res.data))
                .catch(err => commit('CREATING_ISSUES_ERROR', err));
        },
        fetchIssues ({commit}) {
            commit('FETCHING_ISSUES');
            return IssuesAPI.getAll()
                .then(res => commit('FETCHING_ISSUES_SUCCESS', res.data))
                .catch(err => commit('FETCHING_ISSUES_ERROR', err));
        },
    },
}