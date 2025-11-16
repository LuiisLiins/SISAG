<template>
    <div>
        <div class="consulta">
            <div class="especialidade-exame">Cardiologia</div>
            <div class="status">concluido</div>
            <div class="informacoes">
                <button @click="$router.push('/informacoes')">Ver informações</button>
            </div>
        </div>
        <div class="consulta">
            <div class="especialidade-exame">Cardiologia</div>
            <div class="status">cancelado</div>
            <div class="informacoes">
                <button>Ver informações</button>
            </div>
        </div>
        <div class="consulta">
            <div class="especialidade-exame">Cardiologia</div>
            <div class="status">perdido</div>
            <div class="informacoes">
                <button >Ver informações</button>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'HistoricoEncaminhamentos',
    };
</script>