<template>
    <div class="conteudo">
        <AppCabecalho />
        <MenuLateral />

        <router-view />
    </div>
</template>

<script>
import AppCabecalho from './AppCabecalho.vue';
import MenuLateral from './MenuLateral.vue';


export default {
    name: 'MenuCabe',
    components: {
        AppCabecalho,
        MenuLateral
    }
}
</script>