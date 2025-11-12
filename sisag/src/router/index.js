import { createRouter, createWebHistory } from 'vue-router';

// ==== IMPORTAÇÕES DO MENU NORMAL ====
import TelaLogin from '../pages/TelaLogin.vue';
import MenuCabe from '../components/MenuCabe.vue';
import TelaPrinc from '../pages/TelaPrinc.vue';
import TelaAgendamentos from '../pages/TelaAgendamentos.vue';
import Agendamentos from '../components/Agendamentos.vue';
import HistoricoEncaminhamentos from '../components/HistoricoEncaminhamentos.vue';
import TelaCadastro from '../pages/TelaCadastro.vue';
import TelaInformacoesAgendamento from '../pages/TelaInformacoesAgendamento.vue';
import NovoEncaminhamento from '../pages/NovoEncaminhamento.vue';
import MeusPacientes from '../pages/TelaMeusPacientes.vue';

// ==== IMPORTAÇÕES DO MENU UNIVERSITÁRIO ====
import MenuCabeUni from '../components/MenuCabeUni.vue';
import AgendamentosUni from '../components/AgendamentosUni.vue';


const routes = [
  // ==== LOGIN ====
  {
    path: '/',
    name: 'TelaLogin',
    component: TelaLogin
  },

  // ==== MENU NORMAL ====
  {
    path: '/MenuCabe',
    component: MenuCabe,
    children: [
      { path: '', redirect: '/MenuCabe/TelaPrinc' },
      { path: 'TelaPrinc', name: 'TelaPrinc', component: TelaPrinc },
      {
        path: 'TelaAgendamentos',
        component: TelaAgendamentos,
        children: [
          { path: '', redirect: { name: 'Agendamentos' } },
          { path: 'Agendamentos', name: 'Agendamentos', component: Agendamentos },
          { path: 'Historico', name: 'HistoricoEncaminhamentos', component: HistoricoEncaminhamentos }
        ]
      },
      { path: 'TelaCadastro', name: 'TelaCadastro', component: TelaCadastro },
      { path: 'NovoEncaminhamento', name: 'NovoEncaminhamento', component: NovoEncaminhamento }
    ]
  },

  // ==== MENU UNIVERSITÁRIO ====
  {
    path: '/MenuCabeUni',
    component: MenuCabeUni,
    children: [
      { path: '', redirect: '/MenuCabeUni/TelaPrincUni' },
      { path: 'TelaPrincUni', name: 'TelaPrincUni', component: TelaPrinc },
      {
        path: 'TelaAgendamentosUni',
        component: TelaAgendamentos,
        children: [
          { path: '', redirect: { name: 'AgendamentosUni' } },
          { path: 'AgendamentosUni', name: 'AgendamentosUni', component: AgendamentosUni },
          { path: 'HistoricoUni', name: 'HistoricoEncaminhamentosUni', component: HistoricoEncaminhamentos }
        ]
      },
      { path: 'TelaCadastroUni', name: 'TelaCadastroUni', component: TelaCadastro },
      { path: 'MeusPacientesUni', name: 'MeusPacientesUni', component: MeusPacientes },
      { path: 'NovoEncaminhamentoUni', name: 'NovoEncaminhamentoUni', component: NovoEncaminhamento }
    ]
  },

  // ==== TELAS ISOLADAS ====
  {
    path: '/TelaInformacoesAgendamento',
    name: 'TelaInformacoesAgendamento',
    component: TelaInformacoesAgendamento
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
