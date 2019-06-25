<template>
    <div>
        <div class="row col">
            <h1>Issues</h1>
        </div>

        <div class="row col">
            <form>
                <div class="form-row">
                    <div class="col-8">
                        <input v-model="message" type="text" class="form-control">
                    </div>
                    <div class="col-4">
                        <button @click="createIssue()" :disabled="message.length === 0 || isLoading" type="button" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>

        <div v-if="isLoading" class="row col">
            <p>Loading...</p>
        </div>

        <div v-else-if="hasError" class="row col">
            <div class="alert alert-danger" role="alert">
                {{ error }}
            </div>
        </div>

        <div v-else-if="!hasIssues" class="row col">
            No Issues!
        </div>

        <div v-else v-for="issue in issues" :key="issue" class="row col">
            <issue :message="issue.message"></issue>
        </div>
    </div>
</template>

<script>
    import Issues from '../components/Issue';

    export default {
        name: 'issues',
        components: {
            Issues
        },
        data () {
            return {
                message: '',
            };
        },
        created () {
            this.$store.dispatch('issue/fetchIssues');
        },
        computed: {
            isLoading () {
                return this.$store.getters['issues/isLoading'];
            },
            hasError () {
                return this.$store.getters['issues/hasError'];
            },
            error () {
                return this.$store.getters['issues/error'];
            },
            hasIssues () {
                return this.$store.getters['issues/hasIssues'];
            },
            issues () {
                return this.$store.getters['issues/issues'];
            },
        },
        methods: {
            createIssue () {
                this.$store.dispatch('issue/createIssues', this.$data.message)
                    .then(() => this.$data.message = '')
            },
        },
    }
</script>