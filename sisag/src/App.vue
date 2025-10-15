<template>
  <div class="app" id="app">
    <Cabecalho />

    <div class="conteudo">
      <MenuLateral />

      <router-view />
    </div>
  </div>
</template>

<script>
import Cabecalho from './components/Cabecalho.vue';
import MenuLateral from './components/MenuLateral.vue';

export default {
  name: 'App',
  components: {
    Cabecalho,
    MenuLateral
  }
};
</script>
