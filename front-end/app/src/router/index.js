import { createRouter, createWebHistory, onBeforeRouteLeave } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import BuscarCepView from '../views/BuscarCep.vue'
import App from '@/views/app/App.vue'
import useAuth from '../hooks/useAuth'

const { guardApp } = useAuth()

const routes = [
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
    beforeEnter: guardApp,
    path: '/app',
    name: 'app_root',
    component: App,
    meta: {
      auth: true,
      isAppGroupRoutes: true
    },
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
      },
      {
        name: 'recepcionista.detalhesConsulta',
        path: 'agendamentos/:id/detalhes',
        component: () => import('@/views/recepcionista/DetalhesConsulta.vue'),
        props: true
      }
    ]
  }
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes
})

// router.beforeEach((to, from) => {

// })

// router.beforeResolve(() => {
//   console.log('depois que a rota carregou, mas antes da navegação até ela')
// })

// router.afterEach((a = null, b = null, c = null) => {
//   console.log(a, b, c)
// })

export default router
