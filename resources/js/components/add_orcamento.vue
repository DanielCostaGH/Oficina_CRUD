<template>
  <div class="flex ">
    <main class="p-6 flex items-center" @click.stop>
      <section class="mx-auto">
        <div class="bg-white p-6 rounded-lg shadow mb-6 mx-auto w-[80vh]">
          <div class="flex justify-between">
            <h1 class="font-bold text-lg pb-5">Adicionar Orçamento</h1>
            <button @click="closeAddModal" class="rounded-lg text-red-500 hover:text-red-700 flex">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>

          <!-- Formulário de Novo Orçamento -->
          <form @submit.prevent="submitForm">
            <section class="flex w-full justify-between">
              <div class="mb-6 px-3 py-2 w-2/5">
                <label for="titulo" class="block text-sm font-medium text-gray-700 mb-2">
                  Título do Orçamento
                </label>
                <input type="text" id="titulo" name="titulo" placeholder="Digite o título" v-model="formData.titulo"
                  class="mt-1 w-full shadow block  sm:text-sm border-b border-gray-400 rounded-md px-3 py-2" />
                <!-- Mensagem de erro para Título -->
                <p v-if="showErrors && !formData.titulo" class="text-red-500 text-sm mt-2">O título é obrigatório.</p>
              </div>
              <div class="mb-6 px-3 py-2 w-2/5">
                <label for="cliente" class="block text-sm font-medium text-gray-700 mb-2">
                  Cliente
                </label>
                <input type="text" id="cliente" name="cliente" placeholder="Digite o nome do cliente"
                  v-model="formData.cliente"
                  class="mt-1 block w-full sm:text-sm shadow border-b border-gray-400 rounded-md px-3 py-2" />
                <!-- Mensagem de erro para Título -->
                <p v-if="showErrors && !formData.cliente" class="text-red-500 text-sm mt-2">O nome do cliente é
                  obrigatório.</p>
              </div>
            </section>
            <div class="mb-6">
              <div class="grid grid-cols-2 gap-4">
                <div class="px-3 py-2">
                  <label for="data" class="block text-sm font-medium text-gray-700 mb-2">
                    Data do Orçamento
                  </label>
                  <input type="date" id="data" name="data" v-model="formData.data"
                    class="mt-1  block w-full sm:text-sm shadow border-b border-gray-400 rounded-md px-3 py-2" />
                  <!-- Mensagem de erro para Título -->
                  <p v-if="showErrors && !formData.data" class="text-red-500 text-sm mt-2">O campo data é obrigatório.</p>
                </div>
                <div class="px-3 py-2">
                  <label for="hora" class="block text-sm font-medium text-gray-700 mb-2">
                    Hora do Orçamento
                  </label>
                  <input type="time" id="hora" name="hora" v-model="formData.hora"
                    class="mt-1 block w-full sm:text-sm shadow border-b border-gray-400 rounded-md px-3 py-2" />
                  <!-- Mensagem de erro para Título -->
                  <p v-if="showErrors && !formData.hora" class="text-red-500 text-sm mt-2">O horário é obrigatório.</p>
                </div>
              </div>
            </div>
            <div class="mb-6 px-3 py-2">
              <label for="descricao" class="block text-sm font-medium text-gray-700 mb-2">
                Descrição
              </label>
              <textarea id="descricao" name="descricao" rows="4" placeholder="Digite a descrição do orçamento"
                v-model="formData.descricao"
                class="mt-1 block w-full sm:text-sm shadow border-b border-gray-400 rounded-md px-3 py-2"></textarea>
              <!-- Mensagem de erro para Título -->
              <p v-if="showErrors && !formData.descricao" class="text-red-500 text-sm mt-2">A descrição é obrigatória.</p>
            </div>
            <section class="flex w-full justify-between">
              <div class="mb-6 px-3 py-2 w-2/5">
                <label for="vendedor" class="block text-sm font-medium text-gray-700 mb-2">
                  Vendedor
                </label>
                <input type="text" id="vendedor" name="vendedor" placeholder="Digite o nome do vendedor"
                  v-model="formData.vendedor"
                  class="mt-1 block w-full sm:text-sm shadow border-b border-gray-400 rounded-md px-3 py-2" />
                <!-- Mensagem de erro para Título -->
                <p v-if="showErrors && !formData.vendedor" class="text-red-500 text-sm mt-2">O nome do vendedor é
                  obrigatório.</p>
              </div>
              <div class="mb-6 px-3 py-2 w-2/5">
                <label for="valor" class="block text-sm font-medium text-gray-700 mb-2">
                  Valor Orçado
                </label>
                <input type="text" id="valor" name="valor" placeholder="Digite o valor" v-model="formData.valor"
                  class="mt-1 block w-full sm:text-sm shadow border-b border-gray-400 rounded-md px-3 py-2" />
                <!-- Mensagem de erro para Título -->
                <p v-if="showErrors && !formData.valor" class="text-red-500 text-sm mt-2">O campo valor é obrigatório e
                  deve ser numérico</p>
              </div>
            </section>
            <section class="flex w-full justify-between">
              <div class="mb-6 px-3 py-2 w-2/5">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                  Email
                </label>
                <input type="email" id="email" name="email" placeholder="Digite o email do cliente"
                  v-model="formData.email"
                  class="mt-1 block w-full sm:text-sm shadow border-b border-gray-400 rounded-md px-3 py-2" />
                <!-- Mensagem de erro para Título -->
                <p v-if="showErrors && !formData.email" class="text-red-500 text-sm mt-2">O email do cliente é
                  obrigatório.</p>
              </div>
              <div class="mb-6 px-3 py-2 w-2/5">
                <label for="fone" class="block text-sm font-medium text-gray-700 mb-2">
                  Número de Telefone
                </label>
                <input type="text" id="fone" name="fone" placeholder="DDD+numero (Apenas dígitos)" v-model="formData.fone"
                  class="mt-1 block w-full sm:text-sm shadow border-b border-gray-400 rounded-md px-3 py-2" />
                <!-- Mensagem de erro para Título -->
                <p v-if="showErrors && !formData.fone" class="text-red-500 text-sm mt-2">Telefone é obrigatório e deve ser
                  válido.</p>
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
  data() {
    return {
      showAddModal: false,
      showErrors: false,
      formData: {
        titulo: '',
        cliente: '',
        data: '',
        hora: '',
        descricao: '',
        vendedor: '',
        valor: '',
        email: '',
        fone: '',
      },
    };
  },
  components: {

  },

  methods: {
    closeAddModal() {
      this.$emit('close-modal');
    },
    submitForm() {
      this.showErrors = true;
      // Validação do campo título
      if (!this.formData.titulo) {
        alert('O campo "Título do Orçamento" é obrigatório.');
        return;
      }

      // Validação do campo cliente
      if (!this.formData.cliente) {
        alert('O campo "Cliente" é obrigatório.');
        return;
      }

      // Validação do campo data
      if (!this.formData.data) {
        alert('O campo "Data do Orçamento" é obrigatório.');
        return;
      }

      // Validação do campo hora
      if (!this.formData.hora) {
        alert('O campo "Hora do Orçamento" é obrigatório.');
        return;
      }

      // Validação do campo descrição
      if (!this.formData.descricao) {
        alert('O campo "Descrição" é obrigatório.');
        return;
      }

      // Validação do campo vendedor
      if (!this.formData.vendedor) {
        alert('O campo "Vendedor" é obrigatório.');
        return;
      }

      // Validação do campo valor
      if (!/^\d+(\.\d+)?$/.test(this.formData.valor)) {
        alert('O campo "Valor Orçado" deve ser um número decimal válido.');
        return;
      }

      // Validação do campo email
      if (!this.formData.email || !/^\S+@\S+\.\S+$/.test(this.formData.email)) {
        alert('O campo "Email" deve ser um endereço de email válido.');
        return;
      }

      // Validação do campo fone
      if (!this.formData.fone || !/^\d{9,11}$/.test(this.formData.fone)) {
        alert('O campo "Número de Telefone" deve conter de 9 a 11 dígitos.');
        return;
      }


      if (!this.formData.titulo || !this.formData.cliente || !this.formData.data || !this.formData.hora ||
        !this.formData.descricao || !this.formData.vendedor || !this.formData.valor || !this.formData.email ||
        !this.formData.fone) {
        alert('Favor preencher todos os campos')
        return;
      }

      // request da Api
      axios.post('/addOrcamento', this.formData)
        .then(response => {
          this.showAddModal = false;
          alert('Orçamento registrado!');
          window.location.href = '/';

        })
        .catch(error => {
          console.error(error);
          if (error.response) {
            console.log("Response data:", error.response.data);
            console.log("Response status:", error.response.status);

            if (error.response.status === 422) {
              // Erros de validação do back-end
              this.formData = { ...this.formData, ...error.response.data.errors };
            }
          } else {
            console.error(error);
            alert("Ocorreu um erro ao enviar o formulário. Verifique o console para mais informações.");
          }
        });
    },
  },

};
</script>
