<template>
  <div class="meus-pacientes">
    <div class="caixa-pacientes">
      <h1>Meus Pacientes</h1>

      <!-- Campos de pesquisa -->
      <div class="filtros">
        <input
          type="text"
          v-model="filtroNome"
          placeholder="Pesquisar por nome"
          @input="validarNome"
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
                <button class="btn-detalhes">Ver Detalhes</button>
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
        { nome: "Paula Santos", dataNascimento: "1995-11-02", telefone: "(14) 98777-2233" },
        { nome: "André Costa", dataNascimento: "1989-04-18", telefone: "(14) 98654-7788" },
        { nome: "Larissa Melo", dataNascimento: "1994-09-30", telefone: "(14) 98234-6655" },
        { nome: "Pedro Henrique", dataNascimento: "2001-06-14", telefone: "(14) 98111-4422" },
        { nome: "Beatriz Gomes", dataNascimento: "1998-12-01", telefone: "(14) 98999-1100" },
      ],
      pacientesFiltrados: [],
    };
  },
  methods: {
    validarNome() {
      // remove tudo que não for letra (maiúscula/minúscula) ou espaço
      this.filtroNome = this.filtroNome.replace(/[^a-zA-ZÀ-ÿ\s]/g, "");
    },
    filtrarPacientes() {
      this.pacientesFiltrados = this.pacientes.filter((p) => {
        const nomeMatch = p.nome
          .toLowerCase()
          .includes(this.filtroNome.toLowerCase());
        const dataMatch =
          !this.filtroData || p.dataNascimento === this.filtroData;
        return nomeMatch && dataMatch;
      });
    },
    limparFiltros() {
      this.filtroNome = "";
      this.filtroData = "";
      this.pacientesFiltrados = [...this.pacientes];
    },
  },
  mounted() {
    this.pacientesFiltrados = [...this.pacientes];
  },
};
</script>


<style scoped>
.meus-pacientes {
  margin-left: 100px; /* espaço para menu lateral */
  margin-top: 80px;
  display: flex;
  justify-content: center;
  align-items: flex-start;
  min-height: calc(100vh - 100px);
  padding: 20px;
}

.caixa-pacientes {
  background-color: #e3f2fd;
  padding: 30px 40px;
  border-radius: 14px;
  box-shadow: 0 4px 18px rgba(0, 0, 0, 0.1);
  width: 100%;
  max-width: 800px;
  height: 500px; /* altura fixa */
  display: flex;
  flex-direction: column;
}

h1 {
  color: #1565c0;
  font-size: 24px;
  text-align: center;
  margin-bottom: 20px;
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
  border-radius: 6px;
  font-size: 14px;
}

.btn-filtrar,
.btn-limpar {
  background-color: #1565c0;
  color: white;
  border: none;
  border-radius: 6px;
  padding: 8px 14px;
  font-size: 14px;
  cursor: pointer;
  transition: all 0.3s ease;
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

/* Container da tabela com rolagem */
.tabela-container {
  flex: 1;
  overflow-y: auto;
  border-radius: 8px;
  background-color: white;
  scrollbar-width: thin;
  scrollbar-color: #90caf9 #e3f2fd;
}

/* Scroll bonito */
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
  top: 0; /* mantém o cabeçalho fixo ao rolar */
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
  border-radius: 6px;
  padding: 6px 10px;
  font-size: 13px;
  cursor: pointer;
  transition: all 0.3s ease;
}

.btn-detalhes:hover {
  background-color: #0d47a1;
  transform: scale(1.05);
}
</style>
