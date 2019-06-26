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
        error (state) {
            return state.error;
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
            state.issues.data.unshift(issue);
        },
        ['FETCHING_ISSUES'](state, issues) {
            state.issues = issues;
        },
        ['ISSUES_ERROR'](state, error) {
            state.error = error;
            console.log(error);
            state.issues = [];
        },
    },
    actions: {
        createIssues ({commit}, message) {
            commit('CREATING_ISSUES');
            return IssuesAPI.create(message)
                .then(res => commit('CREATING_ISSUES_SUCCESS', res.data))
                .catch(err => commit('ISSUES_ERROR', err));
        },
        fetchIssues(context) {
            return IssuesAPI.getAll()
                .then(issues => context.commit('FETCHING_ISSUES', issues))
                .catch(err => context.commit('ISSUES_ERROR', err));
        }
    },
}