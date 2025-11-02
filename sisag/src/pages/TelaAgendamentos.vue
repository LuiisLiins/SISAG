<template>
  <div class="conteudo-principal">
    <h1>Meus agendamentos</h1>

    <div class="info-agendamentos">
        <button class="inf-ag" @click="$router.push({ name: 'Agendamentos' })">
                Agendamentos pendentes
        </button>

        <button class="inf-ag" @click="$router.push({ name: 'HistoricoEncaminhamentos' })">
                Histórico de encaminhamentos
        </button>
      
    </div>

    <div class="lista-consultas">
      <router-view />
    </div>
  </div>
</template>

<script>
export default {
  name: 'TelaAgendamentos',
    mounted() {
        if (this.$route.name === 'TelaAgendamentos') {
            this.$router.push({ name: 'Agendamentos' });
        }
    }
}
</script>
