<script setup>
  import useConsulta from '@/hooks/useConsulta'
  import { onMounted } from 'vue'
  import { useRoute } from 'vue-router'

  const { params } = useRoute()
  const {
    buscarConsultaPorId,
    byIdData,
    getRequestIsRunning,

    atualizar,
    putRequestIsRunning
  } = useConsulta()

  onMounted(async () => {
    await buscarConsultaPorId(params.id)
  })
</script>

<template>
  <div>
    <header class="mb-5">
      <h2 class="m-0 h2 h2-responsive text-white">Detalhes da consulta</h2>
    </header>

    <div v-if="!getRequestIsRunning" class="container-fluid p-0">
      <form>
        <div class="row mb-3">
          <div class="col col-3">
            <label for="" class="m-0 text-white h-100 d-flex flex-col align-items-center">Cliente</label>
          </div>
          <div class="col col-9">
            <input
              v-model="byIdData.cliente.nome"
              type="text"
              id=""
              class="form-control bg-dark text-white"
              placeholder=""
              required
              min="3"
              max="191"
            />
          </div>
        </div>

        <div class="row mb-3">
          <div class="col col-3">
            <label for="" class="m-0 text-white h-100 d-flex flex-col align-items-center">Paciente (Pet)</label>
          </div>
          <div class="col col-9">
            <input
              v-model="byIdData.pet.nome"
              id=""
              type="text"
              class="form-control bg-dark text-white"
              placeholder=""
              required
              min="3"
              max="191"
            />
          </div>
        </div>

        <div class="row mb-3">
          <div class="col col-3 text-left">
            <label for="password_input" class="m-0 text-white h-100 d-flex flex-col align-items-center">Data</label>
          </div>
          <div class="col col-9">
            <input
              :v-model="byIdData.data"
              :value="byIdData.data"
              id=""
              type="datetime-local"
              class="form-control bg-dark text-white"
              required
            />
          </div>
        </div>

        <div class="row mb-3">
          <div class="col col-3 text-left">
            <label for="password_input" class="m-0 text-white h-100 d-flex flex-col align-items-center">Sintomas</label>
          </div>
          <div class="col col-9">
            <input
              :v-model="byIdData.sintomas"
              :value="byIdData.sintomas"
              id=""
              type="text"
              class="form-control bg-dark text-white"
              required
            />
          </div>
        </div>

        <div class="row mb-3">
          <div class="col col-3 text-left">
            <label for="password_input" class="m-0 text-white h-100 d-flex flex-col align-items-center">Período</label>
          </div>
          <div class="col col-9">
            <input
              :v-model="byIdData.periodo"
              :value="byIdData.periodo"
              id=""
              type="text"
              class="form-control bg-dark text-white"
              required
            />
          </div>
        </div>

        <div class="row mb-3">
          <div class="col col-3 text-left">
            <label for="password_input" class="m-0 text-white h-100 d-flex flex-col align-items-center">Médico</label>
          </div>
          <div class="col col-9">
            <input
              :v-model="byIdData.medico.nome"
              :value="byIdData.medico.nome"
              id=""
              type="text"
              class="form-control bg-dark text-white"
              required
            />
          </div>
        </div>

        <div class="row mb-3">
          <div class="col col-3 text-left">
            <label for="password_input" class="m-0 text-white h-100 d-flex flex-col align-items-center">Status</label>
          </div>
          <div class="col col-9">
            <input
              :v-model="byIdData.status"
              :value="byIdData.status"
              id=""
              type="text"
              class="form-control bg-dark text-white"
              required
            />
          </div>
        </div>

        <div class="row mb-3">
          <div class="col col-3 text-left">
            <label for="password_input" class="m-0 text-white h-100 d-flex flex-col align-items-center">Data de solicitação</label>
          </div>
          <div class="col col-9">
            <input
              :value="byIdData.created_at"
              id=""
              type="datetime-local"
              class="form-control bg-dark text-white"
            />
          </div>
        </div>

        <!-- <div class="row mb-5">
          <div class="col col-3">
            <label
              for="role_select"
              class="m-0 text-white h-100 d-flex flex-col align-items-center"
              >Papel</label
            >
          </div>
          <div class="col col-9">
            <select
              name="role"
              id="role_select"
              class="form-control form-control-dark"
              required
            >
              <option v-for="(role, index) in roles" :key="index" :value="role" :selected="payload.role === role">
                            {{ role }}
                        </option>
            </select>
          </div>
        </div> -->

        <footer class="text-end">
          <button @click="atualizar" type="button" class="btn btn-primary text-uppercase shadow-sm fw-bold">
            <span>ATUALIZAR</span>
            <!-- <span v-if="updating" class="ms-2 spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> -->
          </button>
        </footer>
      </form>
    </div>

    <!-- <div v-if="getRequestIsRunning" class="flex justify-center mt-5">
      <div class="spinner-border text-white" role="status" style="width: 20px; height: 20px">
      </div>
    </div> -->
  </div>
</template>


<style scoped>
</style>
