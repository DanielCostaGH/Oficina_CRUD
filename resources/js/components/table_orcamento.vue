<template>
    <div>
        <div class="flex w-full items-center justify-between mb-2">
            <h3 class="text-xl font-semibold mb-4 w-1/5">Orçamentos recentes</h3>

            <div class="flex w-3/5 items-center">

                <input type="text" class="py-2 px-4 mr-2 rounded bg-white border w-3/5" v-model="nomeCliente"
                    id="nomeCliente" placeholder="cliente" />
                <input type="text" class="py-2 px-4  mr-2 rounded bg-white border w-3/5" v-model="nomeVendedor"
                    id="nomeVendedor" placeholder="vendedor" />
                <input type="text" class="py-2 px-4  mr-2 rounded bg-white border w-3/5" v-model="tituloOrcamento"
                    id="tituloOrcamento" placeholder="titulo" />
                <input type="date" id="dataInicio" name="data" class="py-2 px-4  mr-2 rounded bg-white border w-3/5"
                    v-model="dataInicio" placeholder="Data de Inicio" />
                <input type="date" id="dataFinal" name="data" class="py-2 px-4  rounded bg-white border w-3/5"
                    v-model="dataFinal" placeholder="Data Final" />
            </div>

            <div class="flex">
                <button @click="limparFiltros" class="mr-3 py-2 px-4 rounded-lg text-white bg-red-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9.75L14.25 12m0 0l2.25 2.25M14.25 12l2.25-2.25M14.25 12L12 14.25m-2.58 4.92l-6.375-6.375a1.125 1.125 0 010-1.59L9.42 4.83c.211-.211.498-.33.796-.33H19.5a2.25 2.25 0 012.25 2.25v10.5a2.25 2.25 0 01-2.25 2.25h-9.284c-.298 0-.585-.119-.796-.33z" />
                    </svg>

                </button>
                <button @click="filtrarOrcamentos"
                    class="px-4 py-2 rounded-lg text-white bg-blue-400 hover:bg-blue-500 flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 mr-3">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                    Pesquisar
                </button>

            </div>
        </div>

        <table class="w-full">
            <thead>
                <tr class="text-left">
                    <th class="border-gray-400 bg-gray-200 p-4">ID</th>
                    <th class="border-gray-400 bg-gray-200 p-4">Título</th>
                    <th class="border-gray-400 bg-gray-200 p-4">Cliente</th>
                    <th class="border-gray-400 bg-gray-200 p-4">Vendedor</th>
                    <th class="border-gray-400 bg-gray-200 p-4">Valor</th>
                    <th class="border-gray-400 bg-gray-200 p-4">Data</th>
                    <th class="border-gray-400 bg-gray-200 p-4"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(orcamento, index) in orcamentos" :key="orcamento.id">
                    <td class="border-gray-400 p-4 w-1/12">{{ orcamento.id }}</td>
                    <td class="border-gray-400 p-4 w-3/12">{{ orcamento.titulo }}</td>
                    <td class="border-gray-400 p-4 w-3/12">{{ orcamento.cliente }}</td>
                    <td class="border-gray-400 p-4 w-3/12">{{ orcamento.vendedor }}</td>
                    <td class="border-gray-400 p-4 w-1/12">R$ {{ orcamento.valor }}</td>
                    <td class="border-gray-400 p-4 w-1/12">{{ formatarDataParaExibicao(orcamento.data) }}</td>
                    <td class="border-gray-400 p-4 flex">
                        <!-- botões -->
                        <div class="flex w-full justify-between">
                            <button @click="openViewModal(orcamento)" class="mx-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6 text-blue-600">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>

                            </button>
                            <button @click="openEditModal(orcamento)" class="mx-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6 text-blue-600">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </button>
                            <button @click="openDelModal(orcamento)" class="mx-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6 text-red-600">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- Modal de visualizacão -->
        <div v-if="showViewModal" class="fixed inset-0 flex items-center justify-center z-50" @click="closeViewModal"
            style="background-color: rgba(0, 0, 0, 0.5);">
            <viewM :orcamento="orcamentoView" @close-modal="closeViewModal" />
        </div>
        <!-- Modal de Edição -->
        <div v-if="showEditModal" class="fixed inset-0 flex items-center justify-center z-50" @click="closeEditModal"
            style="background-color: rgba(0, 0, 0, 0.5);">
            <Edit :orcamento="orcamentoSelecionado"  @close-modal="closeEditModal"/>
        </div>
        <!-- Modal de Exclusão -->
        <div v-if="showDelModal" class="fixed inset-0 flex items-center justify-center z-50" @click="closeDelModal"
            style="background-color: rgba(0, 0, 0, 0.5);">
            <DelM :orcamento="orcamentoToDelete"  @close-modal="closeDelModal"/>
        </div>

    </div>
</template>
  
<script>
import Edit from '../components/edit_orcamento.vue';
import DelM from '../components/delete_orcamento.vue';
import viewM from '../components/view_orcamento.vue';
import axios from 'axios';

export default {

    data() {
        return {
            showEditModal: false,
            showDelModal: false,
            showViewModal: false,
            orcamentos: [],
            orcamentoToDelete: null,
            nomeCliente: '',
            nomeVendedor: '',
            tituloOrcamento: '',
            dataInicio: '',
            dataFinal: '',
            valorAbaixoDe: '',
            valorAcimaDe: '',
        };
    },
    components: {
        Edit,
        DelM,
        viewM,

    },
    methods: {
        openViewModal(orcamento) {
            // Define o orçamento selecionado pra edição
            this.orcamentoView = orcamento;
            this.showViewModal = true;
        },
        closeViewModal() {
            this.showViewModal = false;
        },
        openEditModal(orcamento) {
            // Define o orçamento selecionado pra edição
            this.orcamentoSelecionado = orcamento;
            this.showEditModal = true;
        },
        closeEditModal() {
            this.showEditModal = false;
        },
        openDelModal(orcamento) {
            this.orcamentoToDelete = orcamento;
            this.showDelModal = true;
        },
        closeDelModal() {
            this.showDelModal = false;
        },



        // Método pra buscar os orçamentos
        fetchOrcamentos() {
            axios.get('/api/orcamentosList')
                .then((response) => {
                    this.orcamentos = response.data;
                })
                .catch((error) => {
                    console.error(error);
                });
        },

        filtrarOrcamentos() {
            const filtros = {
                cliente: this.nomeCliente,
                vendedor: this.nomeVendedor,
                titulo: this.tituloOrcamento,
                dataInicio: this.dataInicio,
                dataFinal: this.dataFinal,
                valorAbaixoDe: this.valorAbaixoDe,
                valorAcimaDe: this.valorAcimaDe,
            };

            axios.post('/api/orcamentosFilter', filtros)
                .then((response) => {
                    this.orcamentos = response.data; // Atualize a variável orcamentos com os resultados
                })
                .catch((error) => {
                    console.error(error);
                });
        },

        limparFiltros() {
            // Limpe todos os campos de filtro
            this.nomeCliente = '';
            this.nomeVendedor = '';
            this.tituloOrcamento = '';
            this.dataInicio = '';
            this.dataFinal = '';
            this.valorAbaixoDe = '';
            this.valorAcimaDe = '';

            // Recarregue os orçamentos sem filtros
            this.fetchOrcamentos();
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

    mounted() {
        // Carregue a lista completa de orçamentos inicialmente
        this.fetchOrcamentos();
    },
};
</script>
  