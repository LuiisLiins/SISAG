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
    </div>
  </main>
</template>

<script>
import logo2 from '../assets/logo2.png';

export default {
  name: 'MenuLateral',
  data() {
    return {
      logo2
    }
  }
};
</script>
