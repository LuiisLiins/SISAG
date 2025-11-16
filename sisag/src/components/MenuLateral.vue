<template>
  <main>
    <div class="menu-lateral">
      <img class="logo-lateral" :src="logo2" alt="Logo" />

      <div class="icone">
        <!-- Tela Principal -->
        <i class="fi fi-rr-home" @click="$router.push('/MenuCabe/TelaPrinc')"></i>
      </div>

      <div class="icone">
        <!-- Tela de Agendamentos -->
        <i class="fi fi-rr-laptop-medical" @click="$router.push('/MenuCabe/TelaAgendamentos')" style="font-size: 48px"></i>
      </div>

      <div class="icone">
        <!-- Tela de Cadastro -->
        <i class="fi fi-rs-person-dots-from-line" @click="$router.push('/MenuCabe/TelaCadastro')"></i>
      </div>

      <div class="icone" style="margin-top: auto;">
        <!-- Logout -->
        <i class="fi fi-rr-sign-out-alt" @click="handleLogout" title="Sair"></i>
      </div>
    </div>
  </main>
</template>

<script>
import { useUserStore } from '../stores/userStore';
import logo2 from '../assets/logo2.png';

export default {
  name: 'MenuLateral',
  
  setup() {
    const userStore = useUserStore();
    return { userStore };
  },

  data() {
    return {
      logo2
    }
  },

  methods: {
    handleLogout() {
      if (confirm('Deseja realmente sair do sistema?')) {
        this.userStore.clearUsuario();
        this.$router.push('/');
      }
    }
  }
};
</script>
