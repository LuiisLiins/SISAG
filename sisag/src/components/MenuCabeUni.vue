<template>
  <div class="conteudo">
    <Cabecalho />
    <MenuLateralUni />

    <router-view />
  </div>
</template>

<script>
import Cabecalho from './Cabecalho.vue';
import MenuLateralUni from './MenuLateralUni.vue';

export default {
  name: 'MenuCabeUni',
  components: {
    Cabecalho,
    MenuLateralUni
  }
}
</script>
