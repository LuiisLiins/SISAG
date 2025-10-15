<template>
  <main>
    <div class="menu-lateral">
      <img class="logo-lateral" :src="logo2" alt="Logo" />

      <div class="icone">
        <i class="fi fi-rr-home" @click="$router.push('/')"></i>
      </div>

      <div class="icone">
      <i class="fi fi-rr-laptop-medical" @click="$router.push('/agendamentos')" style="font-size: 48px; padding-bottom: 13px;"></i>
      </div>

      <div class="icone">
      <i class="fi fi-rs-person-dots-from-line"></i>
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
