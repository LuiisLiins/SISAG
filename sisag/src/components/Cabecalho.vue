<template>
  <main>
        <header class="header">
            <img class="logo-cabecalho" :src="logo3" alt="Logo">
            
            <div class="usuario-info">
                <h1>Sistema Integrado de Saúde e Agendamento</h1>
                <p>{{ userStore.nomeUsuario || 'Usuário não identificado' }}</p>

                <div class="user-down">
                    <p>{{ nivelPermissao }}</p>
                    <i class="fi fi-rr-angle-small-down"></i>
                </div>    
            </div>    
        </header>

        <div class="linha-separadora"></div>
    </main>
</template>

<script>
    import { useUserStore } from '../stores/userStore';
    import logo3 from '../assets/logo3.png';

    export default {
    name: 'Cabecalho',

    setup() {
        const userStore = useUserStore();
        return { userStore };
    },

    data() {
        return {
        logo3
        }
    },

    computed: {
        nivelPermissao() {
            const tipo = this.userStore.tipoUsuario;
            if (tipo === 'admin') return 'Administrador';
            if (tipo === 'agente') return 'Agente de Saúde';
            if (tipo === 'paciente') return 'Paciente';
            return 'Não definido';
        }
    },

    mounted() {
        // Carrega os dados do usuário do localStorage se necessário
        this.userStore.loadUsuarioFromStorage();
    }
    }
</script>