import { createRouter, createWebHistory } from 'vue-router'

// Login
import Login from '@/pages/TelaLogin.vue'

// Cabeçalho e menu
import MenuCabe from '@/components/MenuCabe.vue'

// Telas principais
import TelaInicial from '@/pages/Paciente/TelaInicial.vue'
import TelaAgendamentos from '@/pages/Paciente/TelaAgendamentos.vue'
import TelaCadastro from '@/pages/Paciente/TelaCadastro.vue'
import TelaInformacoes from '@/pages/Paciente/TelaInformacoes.vue'
import MeusPacientes from '@/pages/Agente-Administrativo/TelaPacientes.vue'
import AdicionarEncaminhamento from '@/pages/Agente-Administrativo/Adicionar.vue'

// Componentes internos de Agendamentos
import ListaAgendamentos from '@/components/Agendamentos.vue'
import HistoricoEncaminhamentos from '@/components/Historico.vue'

const routes = [
  {
    path: '/',
    name: 'Login',
    component: Login
  },
  {
    path: '/menu',
    component: MenuCabe,
    children: [
      { path: '', redirect: '/menu/inicial' },
      { path: 'inicial', name: 'TelaInicial', component: TelaInicial },
      {
        path: 'agendamentos',
        name: 'TelaAgendamentos',
        component: TelaAgendamentos,
        children: [
          { path: '', redirect: '/menu/agendamentos/lista' },
          { path: 'lista', name: 'Agendamentos', component: ListaAgendamentos },
          { path: 'historico', name: 'Historico', component: HistoricoEncaminhamentos }
        ]
      },
      {
        path: 'cadastro',
        name: 'TelaCadastro',
        component: TelaCadastro
      },
      {
        path: 'adicionar',
        name: 'AdicionarEncaminhamento',
        component: AdicionarEncaminhamento
      },
      {
        path: 'meus-pacientes',
        name: 'MeusPacientes',
        component: MeusPacientes
      }
    ]
  },
  {
    path: '/informacoes',
    name: 'TelaInformacoes',
    component: TelaInformacoes
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
