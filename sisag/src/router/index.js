import { createRouter, createWebHistory } from 'vue-router';

import TelaPrinc from '../pages/TelaPrinc.vue';
import TelaAgendamentos from '../pages/TelaAgendamentos.vue';
import Agendamentos from '../components/Agendamentos.vue';
import HistoricoEncaminhamentos from '../components/HistoricoEncaminhamentos.vue';
import TelaInformacoesAgendamento from '../pages/TelaInformacoesAgendamento.vue';
import TelaCadastro from '../pages/TelaCadastro.vue';

const routes = [
  {
    path: '/',
    name: 'TelaPrinc',
    component: TelaPrinc
  },
  {
    path: '/TelaAgendamentos',
    name: 'TelaAgendamentos',
    component: TelaAgendamentos,
    children: [
        {
            path: '', 
            redirect: { name: 'Agendamentos' } // usa o nome da rota
        },
        {
            path: 'Agendamentos',
            name: 'Agendamentos',
            component: Agendamentos
        },
        {
            path: 'Historico',
            name: 'HistoricoEncaminhamentos',
            component: HistoricoEncaminhamentos
        }
    ]
  },
  {
    path: '/TelaInformacoesAgendamento',
    name: 'TelaInformacoesAgendamento',
    component: TelaInformacoesAgendamento
  },
  {
    path: '/TelaCadastro',
    name: 'TelaCadastro',
    component: TelaCadastro
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
