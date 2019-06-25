<template>
    <div class="container">
        <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <router-link class="navbar-brand" to="/">Главная</router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav> -->

        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: 'app',
    }
</script>