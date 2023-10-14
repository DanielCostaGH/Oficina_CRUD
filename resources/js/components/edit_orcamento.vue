<template>
  <div class="flex">
    <main class="p-6 flex items-center" @click.stop>
      <section class="mx-auto">
        <div class="bg-white p-6 rounded-lg shadow mb-6 mx-auto w-[80vh]">
          <div class="flex justify-between">
            <h1 class="font-bold text-lg pb-5">Editar Orçamento</h1>

            <button @click="closeEditModal" class="rounded-lg text-red-500 hover:text-red-700 flex">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>

          <!-- Formulário de Edição -->
          <form @submit.prevent="submitForm">
            <section class="flex w-full justify-between">
              <div class="mb-6 px-3 py-2 w-2/5">
                <label for="titulo" class="block text-sm font-medium text-gray-700 mb-2">
                  Título do Orçamento
                </label>
                <input type="text" id="titulo" name="titulo" v-model="orcamento.titulo"
                  class="mt-1 w-full  block sm:text-sm shadow border-b border-gray-400 rounded-md px-3 py-2" />
              </div>

              <div class="mb-6 px-3 py-2 w-2/5">
                <label for="cliente" class="block text-sm font-medium text-gray-700 mb-2">
                  Cliente
                </label>
                <input type="text" id="cliente" name="cliente" v-model="orcamento.cliente"
                  class="mt-1 block w-full sm:text-sm shadow border-b border-gray-400 rounded-md px-3 py-2" />
              </div>
            </section>

            <div class="mb-6">
              <div class="grid grid-cols-2 gap-4">
                <div class="px-3 py-2">
                  <label for="data" class="block text-sm font-medium text-gray-700 mb-2">
                    Data do Orçamento
                  </label>
                  <input type="date" id="data" name="data" v-model="orcamento.data"
                    class="mt-1 block w-full sm:text-sm shadow border-b border-gray-400 rounded-md px-3 py-2" />
                </div>
                <div class="px-3 py-2">
                  <label for="hora" class="block text-sm font-medium text-gray-700 mb-2">
                    Hora do Orçamento
                  </label>
                  <input type="time" id="hora" name="hora" v-model="orcamento.hora"
                    class="mt-1 block w-full sm:text-sm shadow border-b border-gray-400 rounded-md px-3 py-2" />
                </div>
              </div>
            </div>

            <div class="mb-6 px-3 py-2">
              <label for="descricao" class="block text-sm font-medium text-gray-700 mb-2">
                Descrição
              </label>
              <textarea id="descricao" name="descricao" v-model="orcamento.descricao" rows="4"
                class="mt-1 block w-full sm:text-sm shadow border-b border-gray-400 rounded-md px-3 py-2"></textarea>
            </div>

            <section class="flex w-full justify-between">
              <div class="mb-6 px-3 py-2 w-2/5">
                <label for="vendedor" class="block text-sm font-medium text-gray-700 mb-2">
                  Vendedor
                </label>
                <input type="text" id="vendedor" name="vendedor" v-model="orcamento.vendedor"
                  class="mt-1 block w-full sm:text-sm shadow border-b border-gray-400 rounded-md px-3 py-2" />
              </div>

              <div class="mb-6 px-3 py-2 w-2/5">
                <label for="valor" class="block text-sm font-medium text-gray-700 mb-2">
                  Valor Orçado
                </label>
                <input type="text" id="valor" name="valor" v-model="orcamento.valor"
                  class="mt-1 block w-full sm:text-sm shadow border-b border-gray-400 rounded-md px-3 py-2" />
              </div>
            </section>

            <section class="flex w-full justify-between">
              <div class="mb-6 px-3 py-2 w-2/5">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                  Email
                </label>
                <input type="email" id="email" name="email" v-model="orcamento.email"
                  class="mt-1 block w-full sm:text-sm shadow border-b border-gray-400 rounded-md px-3 py-2" />
              </div>

              <div class="mb-6 px-3 py-2 w-2/5">
                <label for="fone" class="block text-sm font-medium text-gray-700 mb-2">
                  Número de Telefone
                </label>
                <input type="text" id="fone" name="fone" v-model="orcamento.fone"
                  class="mt-1 block w-full sm:text-sm shadow border-b border-gray-400 rounded-md px-3 py-2" />
              </div>
            </section>

            <div class="mb-6 px-3 py-2">
              <button type="submit"
                class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Salvar Orçamento
              </button>
            </div>
          </form>
        </div>
      </section>
    </main>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  props: ['orcamento'],

  data() {
    return {
     
    };
  },

  methods: {
    closeEditModal() {
            this.$emit('close-modal'); // Emita o evento personalizado para fechar o modal
        },
    
    submitForm() {
      const dados = {
        titulo: this.orcamento.titulo,
        cliente: this.orcamento.cliente,
        data: this.orcamento.data,
        hora: this.orcamento.hora,
        descricao: this.orcamento.descricao,
        vendedor: this.orcamento.vendedor,
        valor: this.orcamento.valor,
        email: this.orcamento.email,
        fone: this.orcamento.fone,
      };

      axios.put(`/api/orcamentosUpdate/${this.orcamento.id}`, dados)
        .then((response) => {
          console.log('Orçamento atualizado com sucesso', response.data);
          alert("Orçamento atualizado com sucesso")
          window.location.href = '/';
        })
        .catch((error) => {
          console.error('Erro ao atualizar o orçamento', error);
        });
    }
  },
};
</script>
