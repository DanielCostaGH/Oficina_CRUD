<template>
  <div class="flex">
    <main class="p-6 flex items-center" @click.stop>
      <section class="mx-auto">
        <div class="bg-white p-6 rounded-lg shadow mb-6 mx-auto w-[45vh]">
          <div class="flex justify-between p-5 mb-10 bg-gray-200 text-gray-700 rounded-lg">
            <h1 class="font-bold text-xl text-center">Tem certeza que deseja excluir Orçamento: {{ orcamento.id }}?</h1>
          </div>

          <div class="flex justify-between items-center">
            <button @click="deleteOrcamento(orcamento.id)"
              class="border border-red-600 hover:bg-red-600 py-4 px-10 rounded-md hover:text-white text-red-600 font-bold transition duration-300 ease-in-out">
              Excluir Orçamento
            </button>

            <button @click="closeDelModal"
              class="border border-gray-600 hover:bg-gray-600 p-4 rounded-md text-gray-600 hover:text-white transition duration-300 ease-in-out font-bold">
              Cancelar
            </button>
          </div>
        </div>
      </section>
    </main>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  props: ['orcamento'],

  methods: {
    closeDelModal() {
            this.$emit('close-modal'); // Emita o evento personalizado para fechar o modal
        },

    deleteOrcamento(id) {
      axios.delete(`/api/orcamentosDelete/${id}`)
        .then((response) => {
          console.log('Orçamento excluído com sucesso', response.data);
          alert("Orçamento excluído com sucesso")
          window.location.href = '/';
        })
        .catch((error) => {
          console.error('Erro ao excluir o orçamento', error);
          // Adicionar um console.log para exibir detalhes do erro
        });
    },
  },
};
</script>
