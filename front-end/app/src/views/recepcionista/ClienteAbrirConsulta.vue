<script setup>
import { ref, onMounted, defineProps } from 'vue'
import { useRoute } from 'vue-router'
import useCliente from '@/hooks/useCliente'
import useMedico from '@/hooks/useMedico'

import useConsulta from '@/hooks/useConsulta'

const { params } = useRoute()

const {
    abrirConsulta,
    postRequestIsRunnig,
    getRequestIsRunnig: getClienteRequestIsRunning,

    cliente,
    getCliente
} = useCliente()

const {
    getRequestIsRunning: getMedicosRequestIsRunning,
    medicos,
    getMedicos
} = useMedico()

const {
    postRequestIsRunnig: postNovaConsultaRequestIsRunning,
    abrirConsuta,
    novaConsultaPayload
} = useConsulta()

onMounted(async () => {
    await getMedicos()
    await getCliente(params.id)

    novaConsultaPayload.value.cliente_id = cliente.value.id
})

</script>

<template>
    <div>
        <header class="mb-5 flex gap-3 items-center">
            <h2 class="h2-responsive m-0 text-white font-thin">Cliente - abrir consulta</h2>
            <div v-if="postNovaConsultaRequestIsRunning || getClienteRequestIsRunning || getMedicosRequestIsRunning" class="spinner-border text-white" role="status"></div>
        </header>

        <form class="">
            <div class="row items-center mb-3">
                <div class="col col-4 text-end p-0">
                    <label class="text-white text-start fs-5 w-50">
                        <span class="text-danger me-2">*</span>
                        <span>Nome</span>
                    </label>
                </div>
                <div class="col col-6 text-start">
                    <input disabled type="text" class="form-control bg-dark text-white p-3" :value="cliente.nome">
                </div>
            </div>

            <div class="row items-center mb-3">
                <div class="col col-4 text-end p-0">
                    <label class="text-white text-start fs-5 w-50">
                        <span class="text-danger me-2">*</span>
                        <span>Pet</span>
                    </label>
                </div>
                <div class="col col-6 text-start">
                    <select class="form-control p-3 bg-dark text-white" v-model="novaConsultaPayload.pet_id">
                        <option v-for="(data, index) in cliente.pets" :key="index" :value="data.id">
                            {{ data.nome }}
                        </option>
                    </select>
                </div>
            </div>

            <div class="row items-center mb-3">
                <div class="col col-4 text-end p-0">
                    <label class="text-white text-start fs-5 w-50">
                        <span class="text-danger me-2">*</span>
                        <span>Data</span>
                    </label>
                </div>
                <div class="col col-6 text-start">
                    <input type="datetime-local" class="form-control bg-dark text-white p-3" v-model="novaConsultaPayload.data">
                </div>
            </div>

            <div class="row items-center mb-3">
                <div class="col col-4 text-end p-0">
                    <label class="text-white text-start fs-5 w-50">
                        <span class="text-danger me-2">*</span>
                        <span>Período</span>
                    </label>
                </div>
                <div class="col col-6 text-start">
                    <select class="form-control p-3 bg-dark text-white" v-model="novaConsultaPayload.periodo">
                        <option value="am">Manhã</option>
                        <option value="pm">Tarde / Noite</option>
                    </select>
                </div>
            </div>

            <div class="row items-center mb-3">
                <div class="col col-4 text-end p-0">
                    <label class="text-white text-start fs-5 w-50">
                        <span class="text-danger me-2">*</span>
                        <span>Sintomas</span>
                    </label>
                </div>
                <div class="col col-6 text-start">
                    <input type="text" class="form-control bg-dark text-white p-3" v-model="novaConsultaPayload.sintomas">
                </div>
            </div>

            <div class="row items-center mb-3">
                <div class="col col-4 text-end p-0">
                    <label class="text-white text-start fs-5 w-50">
                        <span class="text-danger me-2">*</span>
                        <span>Status</span>
                    </label>
                </div>
                <div class="col col-6 text-start">
                    <select class="form-control p-3 bg-dark text-white" v-model="novaConsultaPayload.status">
                        <option value="solicitada" selected>Solicitada</option>
                        <option value="agendada">Agendada</option>
                        <!-- <option value="finalizada">Finalizada</option> -->
                    </select>
                </div>
            </div>

            <div class="row items-center mb-3">
                <div class="col col-4 text-end p-0">
                    <label class="text-white text-start fs-5 w-50">
                        <span class="text-danger me-2">*</span>
                        <span>Médico</span>
                    </label>
                </div>
                <div class="col col-6 text-start">
                    <select class="form-control p-3 bg-dark text-white" v-model="novaConsultaPayload.medico_id">
                        <option v-for="(data, index) in medicos" :key="index" :value="data.id">{{ data.nome }}</option>
                    </select>
                </div>
            </div>

            <footer class="text-end col-8 mx-auto">
                <button type="button" :disabled="postNovaConsultaRequestIsRunning" @click="abrirConsuta" class="btn btn-primary btn-lg">
                    <span v-if="postNovaConsultaRequestIsRunning">Cadastrando...</span>
                    <span v-else>Cadastrar</span>
                </button>
            </footer>
        </form>
    </div>
</template>


<style scoped>
</style>
