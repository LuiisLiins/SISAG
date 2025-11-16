import { defineStore } from 'pinia'
import { ref, computed } from 'vue'

interface Usuario {
  id: number
  nome: string
  email: string
  cpf: string
  tipo: 'paciente' | 'agente' | 'admin'
  created_at?: string
  updated_at?: string
}

export const useUserStore = defineStore('user', () => {
  // State
  const usuario = ref<Usuario | null>(null)
  const isLoggedIn = ref(false)

  // Getters
  const nomeUsuario = computed(() => usuario.value?.nome || '')
  const emailUsuario = computed(() => usuario.value?.email || '')
  const cpfUsuario = computed(() => usuario.value?.cpf || '')
  const tipoUsuario = computed(() => usuario.value?.tipo || '')
  const isAdmin = computed(() => usuario.value?.tipo === 'admin')
  const isAgente = computed(() => usuario.value?.tipo === 'agente')
  const isPaciente = computed(() => usuario.value?.tipo === 'paciente')

  // Actions
  function setUsuario(data: Usuario) {
    usuario.value = data
    isLoggedIn.value = true
    // Salva no localStorage para persistência
    localStorage.setItem('usuario', JSON.stringify(data))
    localStorage.setItem('isLoggedIn', 'true')
  }

  function clearUsuario() {
    usuario.value = null
    isLoggedIn.value = false
    localStorage.removeItem('usuario')
    localStorage.removeItem('isLoggedIn')
  }

  function loadUsuarioFromStorage() {
    const storedUser = localStorage.getItem('usuario')
    const storedLoginStatus = localStorage.getItem('isLoggedIn')
    
    if (storedUser && storedLoginStatus === 'true') {
      usuario.value = JSON.parse(storedUser)
      isLoggedIn.value = true
    }
  }

  function updateUsuario(data: Partial<Usuario>) {
    if (usuario.value) {
      usuario.value = { ...usuario.value, ...data }
      localStorage.setItem('usuario', JSON.stringify(usuario.value))
    }
  }

  // Carrega os dados do localStorage quando a store é criada
  loadUsuarioFromStorage()

  return {
    // State
    usuario,
    isLoggedIn,
    
    // Getters
    nomeUsuario,
    emailUsuario,
    cpfUsuario,
    tipoUsuario,
    isAdmin,
    isAgente,
    isPaciente,
    
    // Actions
    setUsuario,
    clearUsuario,
    loadUsuarioFromStorage,
    updateUsuario,
  }
})
