<template>
    <div class="flex">
        <!-- Conteúdo principal -->
        <main class="w-full h-screen p-6 bg-gray-200 flex items-center">
            <!-- Header -->


            <section class=" container mx-auto px-20">
                <!-- Cabeçalho -->
                <header>
                    <painel />
                </header>

                <!-- Acesso Rápido para adicionar novo orçamento -->
                <div class="bg-white p-6 rounded-lg shadow mb-6">
                    <div class="">
                        <a @click="openAddModal"
                            class="flex justify-center items-center p-7 border rounded-lg text-center text-xl font-bold hover:bg-[#F3F4F5] hover:border-[#2A4178] hover:shadow-md text-[#4864A7] hover:text-[#2A4178] cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3.0"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            <span class="mx-5">Novo Orçamento</span>
                        </a>
                    </div>
                </div>


                <!-- Tabela de orçamentos -->
                <div class="bg-white p-6 rounded-lg shadow mb-6 h-[50vh] overflow-y-scroll">
                    <tb_orcamento />
                </div>
            </section>


        </main>
    </div>


    <!-- Modal de Adicionar -->
    <div v-if="showAddModal" class="fixed inset-0 flex items-center justify-center z-50" @click="closeAddModal"
        style="background-color: rgba(0, 0, 0, 0.5);">
        <Add @close-modal="closeAddModal" />
    </div>
</template>
  
<script>

import painel from '../components/painel.vue'
import Add from '../components/add_orcamento.vue'
import tb_orcamento from '../components/table_orcamento.vue'

export default {

    data() {
        return {
            showAddModal: false,
        };
    },
    components: {
        painel,
        Add,
        tb_orcamento,
    },
    methods: {
        openAddModal() {
            this.showAddModal = true;
        },
        closeAddModal() {
            this.showAddModal = false;
        },

    },


};
</script>
  