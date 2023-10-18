<template>
    <div class="flex">
        <main class="p-6 flex items-center" @click.stop>
            <section class="mx-auto">
                <div class="bg-white p-6 rounded-lg shadow mb-6 mx-auto w-[70vh] max-h-[70vh] overflow-y-scroll">
                    <section id="mainSection">
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
                                <div>{{ formatTime(orcamento.hora) }}</div>
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

                    </section>
                    <div class="flex justify-start">
                        <button @click="printPage" class="flex rounded-lg bg-blue-400 text-white  p-3 hover:shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                            </svg>

                            Imprimir</button>
                        <button @click="generatePDF" class="mx-5 flex rounded-lg bg-red-400 text-white  p-3 hover:shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg>

                            Salvar PDF</button>
                    </div>
                </div>
            </section>
        </main>
    </div>
</template>
  
<script>
import moment from 'moment';
import jsPDF from 'jspdf';
import html2canvas from 'html2canvas';


export default {
    props: ['orcamento'],

    methods: {

        closeViewModal() {
            this.$emit('close-modal');
        },

        formatTime(hora) {
            if (hora) {
                return hora.slice(0, 5);
            }
            return '';
        },

        formatarDataParaExibicao(data) {
            if (data) {
                const date = moment(data).format('DD/MM/YYYY');
                return date;
            }
            return '';
        },
        printPage() {
            window.print();
        },
        generatePDF() {
            const doc = new jsPDF();

            // Capturar o conteúdo da seção "mainSection" como uma imagem
            const mainSection = document.getElementById('mainSection');
            html2canvas(mainSection, { scale: 4 }).then(canvas => {
                const imgData = canvas.toDataURL('image/png');

                // Adicionar a imagem ao PDF
                doc.addImage(imgData, 'PNG', 10, 10, 190, 0);

                // Salvar ou abrir o PDF, dependendo do que você deseja
                doc.save('arquivo.pdf');
            });
        },
    },

    mounted() {
        this.formatTime();
    },


};
</script>
  