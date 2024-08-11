<script setup>
    import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
    <div id="app_root">
        <h1>App</h1>

        <nav>
            <router-link :to="{ name: 'medico.meusAtendimentos' }">Meus atendimentos (medico)</router-link>
            <router-link :to="{ name: 'recepcionista.agendamentos' }">Agendamentos (recep.)</router-link>
        </nav>

        <div class="">
            <router-view />
        </div>
    </div>
</template>


<style scoped>
</style>
