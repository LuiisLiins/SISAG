<template>
  <div class="novo-encaminhamento">
    <div class="caixa-encaminhamento">
      <h1>Novo Encaminhamento</h1>

      <form class="encaminhamento-form">
        <div class="linha">
          <div class="form-group">
            <label>Nome do Paciente</label>
            <input type="text" placeholder="Digite o nome do paciente" />
          </div>

          <div class="form-group">
            <label>Prioridade</label>
            <select>
              <option value="">Selecione</option>
              <option value="Urgência">Urgência</option>
              <option value="Eletivo">Eletivo</option>
              <option value="Prioritário">Prioritário</option>
            </select>
          </div>
        </div>

        <div class="linha">
          <div class="form-group">
            <label>Data de Nascimento</label>
            <input type="date" />
          </div>

          <div class="form-group">
            <label>Especialidade / Exame</label>
            <input type="text" placeholder="Digite a especialidade ou exame" />
          </div>
        </div>

        <div class="linha">
          <div class="form-group">
            <label>Nome da Mãe</label>
            <input type="text" placeholder="Digite o nome da mãe" />
          </div>

          <div class="form-group">
            <label>Telefone</label>
            <input type="tel" placeholder="(xx) xxxxx-xxxx" />
          </div>
        </div>

        <div class="form-group transporte">
          <label>Precisa de transporte?</label>
          <button type="button" class="btn-transporte">Sim</button>
        </div>

        <button type="submit" class="btn-confirmar">Salvar Encaminhamento</button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: "AdicionarEncaminhamento",
};
</script>

<style scoped>
.novo-encaminhamento {
  margin-left: 100px; /* espaço para o menu lateral */
  margin-top: 80px; /* espaço para o cabeçalho */
  min-height: calc(100vh - 100px);
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 20px;
}

.caixa-encaminhamento {
  background-color: #e3f2fd;
  padding: 25px 35px;
  border-radius: 14px;
  box-shadow: 0 3px 15px rgba(0, 0, 0, 0.1);
  width: 100%;
  max-width: 520px;
  text-align: left;
}

h1 {
  color: #1565c0;
  font-size: 22px;
  font-weight: 700;
  margin-bottom: 25px;
  text-align: center;
}

.encaminhamento-form {
  display: flex;
  flex-direction: column;
  gap: 14px;
}

.linha {
  display: flex;
  gap: 10px;
}

.form-group {
  flex: 1;
  display: flex;
  flex-direction: column;
}

label {
  font-weight: 600;
  color: #0d47a1;
  margin-bottom: 4px;
  font-size: 14px;
}

input,
select {
  padding: 8px 10px;
  border: 1px solid #bbdefb;
  border-radius: 6px;
  font-size: 14px;
  outline: none;
  transition: border-color 0.3s ease;
}

input:focus,
select:focus {
  border-color: #1565c0;
}

.btn-transporte {
  background-color: #1565c0;
  color: #fff;
  border: none;
  border-radius: 6px;
  padding: 8px 14px;
  font-size: 14px;
  cursor: pointer;
  transition: all 0.3s ease;
  width: fit-content;
}

.btn-transporte:hover {
  background-color: #0d47a1;
  transform: scale(1.05);
}

.btn-confirmar {
  background-color: #0d47a1;
  color: white;
  border: none;
  border-radius: 6px;
  padding: 10px 16px;
  font-size: 14px;
  font-weight: 600;
  cursor: pointer;
  margin-top: 15px;
  width: 100%;
  transition: all 0.3s ease;
}

.btn-confirmar:hover {
  background-color: #083b88;
  transform: scale(1.02);
}
</style>
