import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import BuscarCepView from '../views/BuscarCep.vue'
import App from '@/views/app/App.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/login',
      name: 'login',
      component: () => import('@/views/Login.vue')
    },
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/app',
      name: 'app_root',
      component: App,
      children: [
        {
          name: 'medico.meusAtendimentos',
          path: 'meus-atendimentos',
          component: () => import('@/views/medico/Atendimentos.vue')
        },
        {
          name: 'recepcionista.agendamentos',
          path: 'agendamentos',
          component: () => import('@/views/recepcionista/Agendamentos.vue')
        }
      ]
    }
  ]
})

export default router
