<template>
  <div>
    <div class="conteudo-principal">
      <h1>Bem-vindo, Bruno Albertoni</h1>

      <div class="janelas">
        <!-- Bloco 1: consultas e encaminhamentos -->
        <div class="janela">
          <p>Próxima consulta/exame:</p>
          <p><span>Especialidade:</span> Neuropediatria</p>
          <p><span>Data:</span> 20/08/2024</p>
          <p><span>Hora:</span> 14:30</p>
        </div>

        <div class="janela">
          <p>Meus encaminhamentos:</p>
          <p>Neuropediatria - aguardando agendamento</p>
          <p>Cardiologia - agendado</p>
          <p>Ortopedia - aguardando agendamento</p>
        </div>

        <!-- Bloco 2: notificações -->
        <div class="janela-notificacao">
          <p><strong>Notificações:</strong></p>
          <p>📢 Lembrete: Atualize seu cadastro!</p>
          <p>📅 Novo exame disponível para agendamento.</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'TelaPrinc',
};
</script>
