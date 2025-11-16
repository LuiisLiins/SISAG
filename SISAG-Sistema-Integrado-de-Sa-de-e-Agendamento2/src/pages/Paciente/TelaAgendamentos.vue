<template>
  <div class="conteudo-principal">
    <h1>Meus agendamentos</h1>

    <!-- Botões para trocar a view interna -->
    <div class="info-agendamentos">
      <button class="inf-ag" @click="$router.push({ name: 'Agendamentos' })">
        Agendamentos pendentes
      </button>

      <button class="inf-ag" @click="$router.push({ name: 'Historico' })">
        Histórico de encaminhamentos
      </button>
    </div>

    <!-- Aqui será renderizado Agendamentos ou Histórico -->
    <div class="lista-consultas">
      <router-view />
    </div>
  </div>
</template>

<script>
export default {
  name: 'TelaAgendamentos'
}
</script>
