<template>
  <div>
    <div class="conteudo-principal">
      <h1>Bem-vindo, Bruno Albertoni</h1>

      <div class="janelas">

        <!-- Bloco 1: consultas -->
        <div class="janela">
          <p>Próxima consulta/exame:</p>
          <p><span>Especialidade:</span> Neuropediatria</p>
          <p><span>Data:</span> 20/08/2024</p>
          <p><span>Hora:</span> 14:30</p>
        </div>

        <!-- Bloco 2: encaminhamentos -->
        <div class="janela">
          <p>Meus encaminhamentos:</p>
          <p>Neuropediatria - aguardando agendamento</p>
          <p>Cardiologia - agendado</p>
          <p>Ortopedia - aguardando agendamento</p>
        </div>

        <!-- Bloco 3: notificações gerais -->
        <div class="janela-notificacao">
          <p><strong>Notificações:</strong></p>
          <p>📢 Lembrete: Atualize seu cadastro!</p>
          <p>📅 Novo exame disponível para agendamento.</p>
        </div>

        <!-- BLOCOS EXCLUSIVOS DO AGENTE (ACS) -->
        <!-- Mostra apenas se for Agente -->
        <div class="janela" v-if="userStore.tipoUsuario === 'Agente'">
          <p><strong>Visitas para realizar na semana:</strong></p>
          <p style="font-size: 40px; text-align: center;">20</p>
        </div>

        <div class="janela" v-if="userStore.tipoUsuario === 'Agente'">
          <p><strong>Visitas registradas hoje:</strong></p>
          <p style="color: green; font-size: 40px; text-align: center;">10</p>
        </div>
        
        <div class="janela-notificacao" v-if="userStore.tipoUsuario === 'Agente'">
          <p style="color: red; font-size: 25px;"><strong>Pacientes com confirmação pendente!</strong></p>
          <p style="color: red; font-size: 40px; text-align: center;">15</p>
        </div>

      </div>
    </div>
  </div>
</template>

<script>
import userStore from "@/store/userStore.js";

export default {
  name: "TelaInicial",

  data() {
    return {
      userStore // <-- disponível no template
    }
  }
};
</script>
