<template>
  <main>
    <div class="menu-lateral">
      <img class="logo-lateral" :src="logo2" alt="Logo" />

      <div class="icone">
        <i class="fi fi-rr-home" @click="$router.push('/')"></i>
      </div>

      <div class="icone">
        <i class="fi fi-rr-laptop-medical" @click="$router.push('/TelaAgendamentos')" style="font-size: 48px"></i>
      </div>

      <div class="icone">
      <i class="fi fi-rs-person-dots-from-line"  @click="$router.push('/TelaCadastro')"></i>
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

  },
    methods: {
      teste(){
        console.log('teste');
      }
    }
};
</script>
