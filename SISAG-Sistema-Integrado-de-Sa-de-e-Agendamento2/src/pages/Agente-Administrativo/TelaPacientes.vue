<template>
  <div class="meus-pacientes">
    <div class="caixa-pacientes">
      <h1>
        <span class="icon">&#128100;</span> Meus Pacientes
      </h1>

      <!-- Campos de pesquisa -->
      <div class="filtros">
        <input
          type="text"
          v-model="filtroNome"
          placeholder="Pesquisar por nome"
        />
        <input
          type="date"
          v-model="filtroData"
          placeholder="Pesquisar por data de nascimento"
        />
        <button class="btn-filtrar" @click="filtrarPacientes">Pesquisar</button>
        <button class="btn-limpar" @click="limparFiltros">Limpar</button>
      </div>

      <!-- Lista de pacientes -->
      <div class="tabela-container">
        <table class="tabela-pacientes">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Data de Nascimento</th>
              <th>Telefone</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(paciente, index) in pacientesFiltrados" :key="index">
              <td>{{ paciente.nome }}</td>
              <td>{{ paciente.dataNascimento }}</td>
              <td>{{ paciente.telefone }}</td>
              <td>
                <button class="btn-detalhes" @click="verDetalhes(paciente)">Ver Detalhes</button>
              </td>
            </tr>
            <tr v-if="pacientesFiltrados.length === 0">
              <td colspan="4" class="nenhum">Nenhum paciente encontrado</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "MeusPacientes",
  data() {
    return {
      filtroNome: "",
      filtroData: "",
      pacientes: [
        { nome: "Ana Souza", dataNascimento: "1992-03-15", telefone: "(14) 98877-1234" },
        { nome: "Carlos Lima", dataNascimento: "1988-10-22", telefone: "(14) 99654-8765" },
        { nome: "Fernanda Alves", dataNascimento: "2000-01-09", telefone: "(14) 98456-3321" },
        { nome: "João Silva", dataNascimento: "1990-05-20", telefone: "(14) 99888-4455" },
      ],
      pacientesFiltrados: [],
    };
  },
  methods: {
    filtrarPacientes() {
      this.pacientesFiltrados = this.pacientes.filter(p => {
        const nomeMatch = p.nome.toLowerCase().includes(this.filtroNome.toLowerCase());
        const dataMatch = !this.filtroData || p.dataNascimento === this.filtroData;
        return nomeMatch && dataMatch;
      });
    },
    limparFiltros() {
      this.filtroNome = "";
      this.filtroData = "";
      this.pacientesFiltrados = [...this.pacientes];
    },
    verDetalhes(paciente) {
      alert(`Detalhes de ${paciente.nome}`);
    }
  },
  mounted() {
    this.pacientesFiltrados = [...this.pacientes];
  }
};
</script>

<style scoped>
.meus-pacientes {
  margin-left: 80px; /* mantém espaço para menu lateral */
  margin-top: 100px; /* abaixo do cabeçalho */
  display: flex;
  justify-content: center;
  align-items: flex-start;
  min-height: calc(100vh - 100px);
  padding: 20px;
}

.caixa-pacientes {
  background-color: #e3f2fd;
  padding: 30px 40px;
  border-radius: 16px;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
  width: 100%;
  max-width: 800px;
  display: flex;
  flex-direction: column;
}

h1 {
  color: #1565c0;
  font-size: 24px;
  text-align: center;
  margin-bottom: 25px;
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 8px;
}

.icon {
  font-size: 28px;
}

.filtros {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  justify-content: space-between;
  margin-bottom: 20px;
}

.filtros input {
  flex: 1;
  min-width: 200px;
  padding: 8px 10px;
  border: 1px solid #bbdefb;
  border-radius: 8px;
  font-size: 14px;
}

.btn-filtrar,
.btn-limpar {
  border-radius: 8px;
  padding: 8px 14px;
  font-size: 14px;
  cursor: pointer;
  border: none;
  color: #fff;
  transition: all 0.3s ease;
}

.btn-filtrar {
  background-color: #1565c0;
}

.btn-limpar {
  background-color: #9e9e9e;
}

.btn-filtrar:hover {
  background-color: #0d47a1;
  transform: scale(1.05);
}

.btn-limpar:hover {
  background-color: #757575;
  transform: scale(1.05);
}

.tabela-container {
  flex: 1;
  overflow-y: auto;
  max-height: 400px;
  border-radius: 8px;
  background-color: #fff;
  scrollbar-width: thin;
  scrollbar-color: #90caf9 #e3f2fd;
}

.tabela-container::-webkit-scrollbar {
  width: 8px;
}

.tabela-container::-webkit-scrollbar-track {
  background: #e3f2fd;
  border-radius: 8px;
}

.tabela-container::-webkit-scrollbar-thumb {
  background-color: #90caf9;
  border-radius: 8px;
}

.tabela-pacientes {
  width: 100%;
  border-collapse: collapse;
}

.tabela-pacientes th,
.tabela-pacientes td {
  padding: 10px 12px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

.tabela-pacientes th {
  background-color: #bbdefb;
  color: #0d47a1;
  font-size: 14px;
  position: sticky;
  top: 0;
  z-index: 1;
}

.tabela-pacientes td {
  font-size: 14px;
}

.nenhum {
  text-align: center;
  color: #555;
  padding: 15px;
}

.btn-detalhes {
  background-color: #1565c0;
  color: white;
  border: none;
  border-radius: 8px;
  padding: 6px 10px;
  font-size: 13px;
  cursor: pointer;
  transition: all 0.3s ease;
}

.btn-detalhes:hover {
  background-color: #0d47a1;
  transform: scale(1.05);
}

/* Responsividade */
@media (max-width: 768px) {
  .filtros {
    flex-direction: column;
  }
  .filtros input,
  .btn-filtrar,
  .btn-limpar {
    width: 100%;
  }
  .caixa-pacientes {
    padding: 20px;
  }
}
</style>
