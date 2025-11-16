# User Store - Documentação

## Descrição
Store do Pinia para gerenciar as informações do usuário logado no sistema SISAG.

## Instalação
A store já está configurada no projeto. Para usar em qualquer componente:

```javascript
import { useUserStore } from '../stores/userStore'

export default {
  setup() {
    const userStore = useUserStore()
    return { userStore }
  }
}
```

## Estado (State)

### `usuario`
- **Tipo:** `Usuario | null`
- **Descrição:** Objeto com os dados do usuário logado
- **Estrutura:**
  ```typescript
  {
    id: number
    nome: string
    email: string
    cpf: string
    tipo: 'paciente' | 'agente' | 'admin'
    created_at?: string
    updated_at?: string
  }
  ```

### `isLoggedIn`
- **Tipo:** `boolean`
- **Descrição:** Indica se há um usuário logado

## Getters (Computed)

### `nomeUsuario`
Retorna o nome do usuário ou string vazia

### `emailUsuario`
Retorna o email do usuário ou string vazia

### `cpfUsuario`
Retorna o CPF do usuário ou string vazia

### `tipoUsuario`
Retorna o tipo do usuário ('paciente', 'agente', 'admin') ou string vazia

### `isAdmin`
Retorna `true` se o usuário é administrador

### `isAgente`
Retorna `true` se o usuário é agente de saúde

### `isPaciente`
Retorna `true` se o usuário é paciente

## Actions (Métodos)

### `setUsuario(data: Usuario)`
Define os dados do usuário e salva no localStorage
```javascript
userStore.setUsuario({
  id: 1,
  nome: 'João Silva',
  email: 'joao@email.com',
  cpf: '12345678900',
  tipo: 'paciente'
})
```

### `clearUsuario()`
Remove os dados do usuário e limpa o localStorage
```javascript
userStore.clearUsuario()
```

### `loadUsuarioFromStorage()`
Carrega os dados do usuário do localStorage (executado automaticamente)
```javascript
userStore.loadUsuarioFromStorage()
```

### `updateUsuario(data: Partial<Usuario>)`
Atualiza parcialmente os dados do usuário
```javascript
userStore.updateUsuario({ nome: 'Novo Nome' })
```

## Exemplos de Uso

### 1. No Login (TelaLogin.vue)
```javascript
import { useUserStore } from '../stores/userStore'

export default {
  setup() {
    const userStore = useUserStore()
    return { userStore }
  },
  
  methods: {
    async login() {
      const response = await this.$axios.post('/api/login', {
        cpf: this.cpf,
        senha: this.senha
      })
      
      if (response.data.success) {
        // Salva o usuário na store
        this.userStore.setUsuario(response.data.usuario)
        this.$router.push('/MenuCabe/TelaPrinc')
      }
    }
  }
}
```

### 2. Exibir Nome do Usuário (Cabecalho.vue)
```vue
<template>
  <div>
    <p>{{ userStore.nomeUsuario }}</p>
    <p>{{ nivelPermissao }}</p>
  </div>
</template>

<script>
import { useUserStore } from '../stores/userStore'

export default {
  setup() {
    const userStore = useUserStore()
    return { userStore }
  },
  
  computed: {
    nivelPermissao() {
      if (this.userStore.isAdmin) return 'Administrador'
      if (this.userStore.isAgente) return 'Agente de Saúde'
      if (this.userStore.isPaciente) return 'Paciente'
      return 'Não definido'
    }
  }
}
</script>
```

### 3. Logout (MenuLateral.vue)
```javascript
import { useUserStore } from '../stores/userStore'

export default {
  setup() {
    const userStore = useUserStore()
    return { userStore }
  },
  
  methods: {
    handleLogout() {
      if (confirm('Deseja sair?')) {
        this.userStore.clearUsuario()
        this.$router.push('/')
      }
    }
  }
}
```

### 4. Verificar Permissões
```javascript
// Verificar se é admin antes de mostrar algo
if (this.userStore.isAdmin) {
  // Mostrar opções de admin
}

// Ou no template
```
```vue
<div v-if="userStore.isAdmin">
  <!-- Conteúdo exclusivo para admin -->
</div>
```

## Persistência
Os dados do usuário são salvos automaticamente no `localStorage` e restaurados quando a aplicação é recarregada, mantendo o usuário logado entre sessões.
