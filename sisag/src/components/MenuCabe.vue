<template>
    <div class="conteudo">
        <Cabecalho />
        <MenuLateral />

        <router-view />
    </div>
</template>

<script>
import Cabecalho from './Cabecalho.vue';
import MenuLateral from './MenuLateral.vue';


export default {
    name: 'MenuCabe',
    components: {
        Cabecalho,
        MenuLateral
    }
}
</script>