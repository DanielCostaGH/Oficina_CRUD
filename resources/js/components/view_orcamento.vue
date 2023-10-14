<template>
    <div class="flex">
        <main class="p-6 flex items-center" @click.stop>
            <section class="mx-auto">
                <div class="bg-white p-6 rounded-lg shadow mb-6 mx-auto w-[70vh] max-h-[70vh] overflow-y-scroll">
                    <div class="flex justify-between">
                        <h1 class="font-bold text-lg pb-5">Detalhes do Orçamento</h1>

                        <button @click="closeViewModal" class="rounded-lg text-red-500 hover:text-red-700 flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Exibir Detalhes do Orçamento -->
                    <section class="flex w-full justify-between">

                        <div class="mb-6 px-3 py-2 w-2/5 shadow border-b border-gray-400 rounded-md">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Título do Orçamento</label>
                            <div class="">{{ orcamento.titulo }}</div>
                        </div>

                        <div class="mb-6 px-3 py-2 w-2/5 shadow border-b border-gray-400 rounded-md">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Cliente</label>
                            <div>{{ orcamento.cliente }}</div>
                        </div>

                    </section>
                    <section class="flex w-full justify-between">

                        <div class="mb-6 px-3 py-2 w-2/5 shadow border-b border-gray-400 rounded-md">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Data do Orçamento</label>
                            <div>{{ formatarDataParaExibicao(orcamento.data) }}</div>
                        </div>

                        <div class="mb-6 px-3 py-2 w-2/5 shadow border-b border-gray-400 rounded-md">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Hora do Orçamento</label>
                            <div>{{ orcamento.hora }}</div>
                        </div>

                    </section>

                    <div class="mb-6 px-3 py-2 shadow border-b border-gray-400 rounded-md">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Descrição</label>
                        <div>{{ orcamento.descricao }}</div>
                    </div>

                    <section class="flex w-full justify-between">

                        <div class="mb-6 px-3 py-2 w-2/5 shadow border-b border-gray-400 rounded-md">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Vendedor</label>
                            <div>{{ orcamento.vendedor }}</div>
                        </div>

                        <div class="mb-6 px-3 py-2 w-2/5 shadow border-b border-gray-400 rounded-md">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Valor Orçado</label>
                            <div>{{ orcamento.valor }}</div>
                        </div>

                    </section>
                    <section class="flex w-full justify-between">

                        <div class="mb-6 px-3 py-2 w-2/5 shadow border-b border-gray-400 rounded-md">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <div>{{ orcamento.email }}</div>
                        </div>

                        <div class="mb-6 px-3 py-2 w-2/5 shadow border-b border-gray-400 rounded-md">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Número de Telefone</label>
                            <div>{{ orcamento.fone }}</div>
                        </div>

                    </section>
                    <div>

                    </div>
                </div>
            </section>
        </main>
    </div>
</template>
  
<script>
export default {
    props: ['orcamento'],

    methods: {
        closeViewModal() {
            this.$emit('close-modal'); // Emita o evento personalizado para fechar o modal
        },


        formatarDataParaExibicao(data) {
            if (data) {
                const date = new Date(data);
                const dia = date.getDate().toString().padStart(2, '0');
                const mes = (date.getMonth() + 1).toString().padStart(2, '0');
                const ano = date.getFullYear();
                return `${dia}/${mes}/${ano}`;
            }
            return '';
        },
    },
};
</script>
  