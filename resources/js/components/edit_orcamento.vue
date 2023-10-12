<template>
    <div class="flex ">
      <main class="p-6 flex items-center" @click.stop>
        <section class="mx-auto">
          <div class="bg-white p-6 rounded-lg shadow mb-6 mx-auto w-[80vh]">
            <div class="flex justify-between">
              <h1 class="font-bold text-lg pb-5">Editar Orçamento</h1>
  
  
              <button @click="closeAddModal" class="rounded-lg text-red-500 hover:text-red-700 flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
  
            <!-- Formulário de Novo Orçamento -->
            <form>
  
              <section class="flex w-full justify-between">
  
                <div class="mb-6 px-3 py-2 w-2/5">
                  <label for="titulo" class="block text-sm font-medium text-gray-700 mb-2">
                    Título do Orçamento
                  </label>
                  <input type="text" id="titulo" name="titulo" placeholder="Digite o titulo"
                    class="mt-1 w-full shadow block  sm:text-sm border-b border-gray-400 rounded-md px-3 py-2" />
                </div>
  
  
                <div class="mb-6 px-3 py-2 w-2/5">
                  <label for="cliente" class="block text-sm font-medium text-gray-700 mb-2">
                    Cliente
                  </label>
                  <input type="text" id="cliente" name="cliente" placeholder="Digite o nome do cliente" 
                    class="mt-1 block w-full sm:text-sm shadow border-b border-gray-400 rounded-md px-3 py-2" />
                </div>
  
              </section>
  
              <div class="mb-6">
                <div class="grid grid-cols-2 gap-4">
                  <div class="px-3 py-2">
                    <label for="data" class="block text-sm font-medium text-gray-700 mb-2">
                      Data do Orçamento
                    </label>
                    <input type="date" id="data" name="data"
                      class="mt-1  block w-full sm:text-sm shadow border-b border-gray-400 rounded-md px-3 py-2" />
                  </div>
                  <div class="px-3 py-2">
                    <label for="hora" class="block text-sm font-medium text-gray-700 mb-2">
                      Hora do Orçamento
                    </label>
                    <input type="time" id="hora" name="hora"
                      class="mt-1 block w-full sm:text-sm shadow border-b border-gray-400 rounded-md px-3 py-2" />
                  </div>
                </div>
              </div>
              <div class="mb-6 px-3 py-2">
                <label for="descricao" class="block text-sm font-medium text-gray-700 mb-2">
                  Descrição
                </label>
                <textarea id="descricao" name="descricao" rows="4" placeholder="Digite oa descrição do orçamento"
                  class="mt-1 block w-full sm:text-sm shadow border-b border-gray-400 rounded-md px-3 py-2"></textarea>
              </div>
              <section class="flex w-full justify-between">
                <div class="mb-6 px-3 py-2 w-2/5">
                  <label for="vendedor" class="block text-sm font-medium text-gray-700 mb-2">
                    Vendedor
                  </label>
                  <input type="text" id="vendedor" name="vendedor" placeholder="Digite o nome do vendedor"
                    class="mt-1 block w-full sm:text-sm shadow border-b border-gray-400 rounded-md px-3 py-2" />
                </div>
  
                <div class="mb-6 px-3 py-2 w-2/5">
                  <label for="valor" class="block text-sm font-medium text-gray-700 mb-2">
                    Valor Orçado
                  </label>
                  <input type="text" id="valor" name="valor" placeholder="Digite o valor"
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
  export default {
    data() {
      return {
              showAddModal:false,
          };
    },
    components: {
  
    },
  
    methods: {
          closeAddModal() {
              this.showAddModal = false;
          },
      },
  
  };
  </script>
  