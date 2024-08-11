<script setup>
    import { RouterLink, RouterView, useRoute, onBeforeRouteLeave } from 'vue-router'
    import sidenav from '@/components/sidenav.vue'

    // const { meta, params, query, path, name, matched, hash } = useRoute()

    // console.log(meta, params, query, path, name, matched, hash)

    // onBeforeRouteLeave((to, from) => {
    //     console.log(to, from)
    //     // const answer = window.confirm(
    //     //   'Do you really want to leave? you have unsaved changes!'
    //     // )
    //     // cancel the navigation and stay on the same page
    //     // if (!answer) return false

    //     return true
    // })
</script>

<template>
    <!-- <div id="app_root">
        <h1>App</h1>

        <nav>
            <router-link :to="{ name: 'medico.meusAtendimentos' }">Meus atendimentos (medico)</router-link>
            <router-link :to="{ name: 'recepcionista.agendamentos' }">Agendamentos (recep.)</router-link>
            <router-link :to="{ name: 'home' }">home</router-link>
        </nav>

        <div class="">
            <router-view />
        </div>
    </div> -->
    <div class="container-fluid admin-main-grid">
        <div class="row">
            <div class="col col-2 p-0 m-0 navigation-side">
                <sidenav />
            </div>

            <div class="admin-content content-side overflow-auto col m-0 p-0 vh-100 col-10 p-5">
                <router-view />
            </div>
        </div>
    </div>
</template>


<style scoped>
    .admin-content
    {
        background-color: #1c1d20
    }
</style>
