<script setup>

import useConsulta from '@/hooks/useConsulta'

const { data, getRequestIsRunning } = useConsulta()

</script>

<template>
  <div id="recepcionista" class="listagem-atendimentos">
    <header class="flex justify-between">
      <h2 class="text-white m-0">Agendamentos</h2>
      <button class="btn btn-success">Novo agentamento</button>
    </header>

    <div class="filters">
      <form action="" class="row items-end">
        <div class="form-group col col-2">
          <label for="" class="text-white">Tipo de animal</label>
          <select class="form-control" name="" id="">
            <option data="" type="">selecione</option>
            <option data="" type="">Cão</option>
            <option data="" type="">Gato</option>
          </select>
        </div>

        <div class="form-group col col-2">
          <label for="" class="text-white">Mês / Ano</label>
          <input type="date" class="form-control" />
        </div>

        <div class="form-group col col-2">
          <button class="btn btn-primary">Buscar</button>
        </div>
      </form>
    </div>

    <div v-if="getRequestIsRunning" class="flex justify-center mt-5">
      <div class="spinner-border text-white" role="status" style="width: 20px; height: 20px">
      </div>
    </div>

    <table v-else class="table table-striped table-dark mt-5">
      <thead>
        <tr>
          <th scope="col">Médico(a)</th>
          <th scope="col">Cliente</th>
          <th scope="col">Pet</th>
          <!-- <th scope="col">Sintomas</th> -->
          <th scope="col">Data</th>
          <!-- <th scope="col">Período</th> -->
          <th scope="col">Status</th>
          <th scope="col">Solicitado em</th>
          <!-- <th scope="col">Atualizado em</th> -->
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(consulta, index) in data" :key="index">
          <td>{{ consulta.medico.nome }}</td>
          <td>{{ consulta.cliente.nome }}</td>
          <td>{{ consulta.pet.nome }}</td>
          <!-- <td>{{ consulta.sintomas }}</td> -->
          <td>{{ consulta.data }}</td>
          <!-- <td>{{ consulta.periodo === 'pm' ? 'Tarde': 'Manhã' }} ({{ consulta.data.split(' ').pop() }} {{ consulta.periodo }})</td> -->
          <td>{{ consulta.status }}</td>
          <td>{{ consulta.created_at }}</td>
          <td>
            <router-link :to="{ name: 'recepcionista.detalhesConsulta', params: { id: consulta.id } }">Detalhes</router-link>
          </td>
          <!-- <td>{{ consulta.updated_at }}</td> -->
        </tr>
      </tbody>
    </table>
  </div>
</template>


<style scoped>
</style>
