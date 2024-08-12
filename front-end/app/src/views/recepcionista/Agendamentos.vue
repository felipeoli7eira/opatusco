<script setup>
import { onMounted } from 'vue'
import useConsulta from '@/hooks/useConsulta'
import usePet from '@/hooks/usePet'

const {
  data,
  getRequestIsRunning,
  buscarConsultas
} = useConsulta()

const {
  getTiposDePets,
  tiposDePets
} = usePet()

onMounted(async () => {
  await Promise.all([
    buscarConsultas(),
    getTiposDePets()
  ])
})
</script>

<template>
  <div>
    <header class="mb-5 flex gap-3 items-center">
        <h2 class="h2-responsive m-0 text-white font-thin">Agendamentos</h2>
    </header>

    <div class="mb-5">
      <form class="row items-end">
        <div class="form-group col col-2">
          <label for="" class="text-white mb-2 fw-bold">Tipo de pet</label>
          <select class="form-control bg-dark text-white p-3">
            <option v-for="(data, index) in tiposDePets" :value="data.nome" :key="index">{{ data.nome }}</option>
          </select>
        </div>

        <div class="form-group col col-2">
          <label for="" class="text-white mb-2 fw-bold">Data do agendamento</label>
          <input type="date" class="form-control bg-dark text-white p-3" />
        </div>
      </form>
    </div>

    <div v-if="getRequestIsRunning" class="flex justify-center mt-5">
      <div class="spinner-border text-white" role="status" style="width: 20px; height: 20px">
      </div>
    </div>

    <table v-else class="table table-app-rounded table-striped table-dark">
      <thead>
        <tr>
          <th scope="col" class="p-3">Médico(a)</th>
          <th scope="col" class="p-3">Cliente</th>
          <th scope="col" class="p-3">Pet</th>
          <th scope="col" class="p-3">Data</th>
          <th scope="col" class="p-3">Status</th>
          <th scope="col" class="p-3">Solicitado em</th>
          <th scope="col" class="p-3"></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(consulta, index) in data" :key="index">
          <td class="p-3">{{ consulta.medico.nome }}</td>
          <td class="p-3">{{ consulta.cliente.nome }}</td>
          <td class="p-3">{{ consulta.pet.nome }}</td>
          <td class="p-3">{{ consulta.data }}</td>
          <td class="p-3">{{ consulta.status }}</td>
          <td class="p-3">{{ consulta.created_at }}</td>
          <td class="p-3">
            <router-link :to="{ name: 'recepcionista.detalhesConsulta', params: { id: consulta.id } }">Detalhes</router-link>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>


<style scoped>
</style>
