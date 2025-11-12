    <template>
    <main>
        <div class="menu-lateral">
        <img class="logo-lateral" :src="logo2" alt="Logo" />

        <div class="icone">
            <i class="fi fi-rr-home" @click="$router.push('/MenuCabeUni/TelaPrinc')"></i>
        </div>

        <div class="icone">
            <i class="fi fi-rr-laptop-medical" @click="$router.push('/MenuCabeUni/TelaAgendamentos')"></i>
        </div>

        <div class="icone">
            <i class="fi fi-rs-person-dots-from-line" @click="$router.push('/MenuCabeUni/TelaCadastro')"></i>
        </div>

        <div class="icone">
            <i class="fi fi-rr-users" @click="$router.push('/MenuCabeUni/MeusPacientes')"></i>
        </div>

        <div class="icone">
            <i class="fi fi-rr-file-medical" @click="$router.push('/MenuCabeUni/NovoEncaminhamento')"></i>
        </div>
        </div>
    </main>
    </template>

    <script>
    import logo2 from '../assets/logo2.png';

    export default {
    name: 'MenuLateralUni',
    data() {
        return {
        logo2
        }
    }
    };
    </script>
