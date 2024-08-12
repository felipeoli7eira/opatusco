<script setup>
import { RouterLink } from "vue-router";
import { ArrowRightIcon } from "@heroicons/vue/24/solid";
import useLogin from "@/hooks/useLogin"

const {
  email,
  senha,
  requestIsRunning,
  handleSubmit
} = useLogin()

</script>

<template>
  <div class="h-screen w-screen flex gap-10 flex-col items-center justify-center p-5">
    <form class="flex flex-col items-center">
      <img src="./../assets/img/png/pet.png" width="200" class="mb-4" />

      <div class="flex items-center mb-2 border p-1 px-4 bg-body rounded-pill">
        <img src="./../assets/img/svg/user.svg" />
        <input
          type="email"
          placeholder="E-mail"
          required="required"
          class="form-control border-0 bg-none shadow-none"
          v-model="email"
          @keydown.enter="handleSubmit"
        />
      </div>

      <div class="flex items-center mb-2 border p-1 px-4 bg-body rounded-pill">
        <img src="./../assets/img/svg/lock.svg" />
        <input
          type="password"
          placeholder="****"
          required="required"
          class="form-control border-0 bg-none shadow-none"
          v-model="senha"
          @keydown.enter="handleSubmit"
        />
      </div>

      <div class="d-grid w-100">
        <button
          @click="handleSubmit"
          type="button"
          class="btn rounded-pill p-2 fw-bold shadow-success shadow-none"
          :disable="requestIsRunning"
        >
          <span v-if="requestIsRunning">AGUARDE...</span>
          <span v-else>LOGIN</span>
        </button>
      </div>
    </form>
    <!-- <img class="img-home-app block mx-auto" src="./../assets/img/svg/map.svg" alt="Icone de um rapaz segurando um map point" /> -->

    <!-- <p class="dark:text-white text-lg lg:text-2xl text-center">Bem-vindo(a) ao VueMaps, seu app de informações de CEP.</p> -->

    <!-- <RouterLink :to="{name: 'buscarCep'}" class="flex items-center justify-center gap-3 bg-emerald-500 rounded-full hover:bg-emerald-600 text-white uppercase text-sm p-3 transition">
      <arrow-right-icon class="size-6" />
    </RouterLink> -->
  </div>
</template>


<style scoped>
form button, form button:hover, form button:active {
  color: #fff !important;
  background-color: #96CE9D;
}

form button:active {
  background-color: #a9f5b3 !important;
}
</style>
