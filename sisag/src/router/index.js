import { createRouter, createWebHistory } from 'vue-router';

import TelaPrinc from '../pages/TelaPrinc.vue';
import TelaAgendamentos from '../pages/TelaAgendamentos.vue';

const routes = [
    {
        path: '/',
        name: 'TelaPrinc',
        component: TelaPrinc
    },
    {
        path: '/agendamentos',
        name: 'Agendamentos',
        component: TelaAgendamentos
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;