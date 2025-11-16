<template>
  <main>
    <div class="menu-lateral">
      <img class="logo-lateral" :src="logo2" alt="Logo" />

      <div class="icone" @click="$router.push('/menu/inicial')">
        <i class="fi fi-rr-home"></i>
      </div>

      <div class="icone" @click="$router.push('/menu/agendamentos')">
        <i class="fi fi-rr-doctor"></i>
      </div>

      <div class="icone" @click="$router.push('/menu/cadastro')">
        <i class="fi fi-rr-user-add"></i>
      </div>

      <!-- Novo ícone para Meus Pacientes -->
      <div class="icone"  v-if="userStore.tipoUsuario === 'Agente' || userStore.tipoUsuario === 'Administrador'" @click="$router.push('/menu/meus-pacientes')">
        <i class="fi fi-rr-users"></i> <!-- ícone de grupo/pacientes -->
      </div>


      <div class="icone" v-if="userStore.tipoUsuario === 'Administrador'" @click="$router.push('/menu/adicionar')">
        <i class="fi fi-rr-plus"></i> <!-- ícone de adição correto -->
      </div>
      
      <div class="icone" v-if="userStore.tipoUsuario === 'Agente'">
        <i class="fi fi-rr-list-timeline"></i>
      </div>

    </div>
  </main>
</template>

<script>
import logo2 from '../assets/logo2.png';
import userStore from '../store/userStore.js';

export default {
  name: 'MenuLateral',

  data() {
    return {
      logo2,
      userStore
    }
  }
};
</script>
