<template>
  <div class="tela-informacoes">
    <!-- Botão de Voltar -->
    <button class="voltar" @click="$router.back()">
      ← Voltar
    </button>

    <h1>Informações do Agendamento</h1>

    <div class="bloco-informacoes">
      <p><span>Especialidade:</span> Cardiologia</p>
      <p><span>Médico Solicitante:</span> Dr. João Silva</p>
      <p><span>Data da Solicitação:</span> 02/11/2025</p>
      <p><span>Data do Agendamento:</span> 15/11/2025</p>
      <p><span>Prioridade:</span> Prioritário</p>
      <p><span>Local:</span> Clínica São Lucas</p>
      <p><span>Endereço:</span> Rua das Flores, 123 - Centro</p>
    </div>

    <!-- Botão Confirmar -->
    <button class="btn-confirmar">Confirmar Presença</button>

    <!-- Aviso -->
    <p class="aviso">
      A consulta deve ser confirmada pelo menos <strong>3 dias antes</strong>.
    </p>

    <!-- Botão Transporte -->
    <button class="btn-transporte">Precisa de transporte?</button>
  </div>
</template>

<script>
export default {
  name: "TelaInformacoes",
};
</script>

<style scoped>
.tela-informacoes {
  width: 90%;
  max-width: 600px;
  margin: 80px auto;
  background-color: #e3f2fd;
  padding: 30px;
  border-radius: 16px;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
  font-family: "Nunito", sans-serif;
  color: #0d47a1;
}

.voltar {
  background: none;
  border: none;
  color: #1565c0;
  font-size: 18px;
  cursor: pointer;
  font-weight: 600;
  transition: color 0.3s;
}

.voltar:hover {
  color: #0d47a1;
  text-decoration: underline;
}

h1 {
  text-align: center;
  color: #1565c0;
  margin: 20px 0 30px;
}

.bloco-informacoes {
  background: #fff;
  padding: 20px;
  border-radius: 12px;
  margin-bottom: 25px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
}

.bloco-informacoes p {
  font-size: 17px;
  margin: 8px 0;
}

.bloco-informacoes span {
  font-weight: 700;
  color: #0d47a1;
}

.btn-confirmar,
.btn-transporte {
  display: block;
  width: 100%;
  border: none;
  border-radius: 10px;
  padding: 12px;
  font-size: 17px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s;
}

.btn-confirmar {
  background-color: #1565c0;
  color: #fff;
  margin-bottom: 15px;
}

.btn-confirmar:hover {
  background-color: #0d47a1;
  transform: scale(1.03);
}

.aviso {
  text-align: center;
  font-size: 15px;
  color: #444;
  margin-bottom: 25px;
}

.btn-transporte {
  background-color: #bbdefb;
  color: #0d47a1;
}

.btn-transporte:hover {
  background-color: #90caf9;
  transform: scale(1.03);
}
</style>
