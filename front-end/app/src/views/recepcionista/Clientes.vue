<script setup>
import { onMounted } from 'vue'
import useCliente from '@/hooks/useCliente'

const {
    clientes,

    getClientes,
    getRequestIsRunnig,

    postCliente,
    postRequestIsRunnig,

    putCliente,
    putRequestIsRunnig,

    deleteCliente,
    deleteRequestIsRunnig
} = useCliente()

onMounted(async () => await getClientes())

</script>

<template>
    <div class="container-view">
        <header class="mb-5 flex gap-3 items-center">
            <h2 class="h2-responsive m-0 text-white font-thin">Clientes</h2>
            <div v-if="getRequestIsRunnig" class="spinner-border text-white" role="status"></div>
        </header>

        <table class="table table-app-rounded table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col" class="p-3">Nome</th>
                    <th scope="col" class="p-3">E-mail</th>
                    <th scope="col" class="p-3">Pets</th>
                    <th scope="col" class="p-3"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(data, index) in clientes" :key="index">
                    <td class="p-3">{{ data.nome }}</td>
                    <td class="p-3">{{ data.email }}</td>
                    <td class="p-3">{{ data.pets.length }}</td>
                    <td class="p-3">
                        <router-link :to="{ name: 'recepcionista.clientes.abrirConsulta', params: { id: data.id } }" tag="button" class="btn btn-primary">Abrir consulta</router-link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>


<style scoped>
</style>
