<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Classe de teste para o controle de orçamento.
 */
class OrcamentoControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Testa se a página inicial está abrindo como o esperado.
     *
     * @return void
     */
    public function test_index_returns_ok()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Testa a criação de um orçamento.
     *
     * @return void
     */
    public function test_store_creates_orcamento()
    {
        $data = [
            'cliente' => 'Cliente Teste',
            'titulo' => 'Título Teste',
            'data' => '2023/09/10',
            'hora' => '12:00',
            'descricao' => 'Teste de descrição',
            'vendedor' => 'Vendedor Teste',
            'valor' => '450.50',
            'email' => 'teste@teste.com',
            'fone' => '31999999999',
        ];

        $response = $this->post('/addOrcamento', $data);

        $response->assertStatus(200);
    }



    /**
     * Testa a validação da criação de um orçamento.
     *
     * @return void
     */
    public function test_store_creates_orcamento_with_invalid_data()
{
    $data = [
        'cliente' => 'Cliente Teste',
        'titulo' => 'Título Teste',
        'data' => 'valor invalido',
        'hora' => 'valor invalido',
        'descricao' => 'Teste de descrição',
        'vendedor' => 'Vendedor Teste',
        'valor' => 'valor invalido',
        'email' => 'valor invalido',
        'fone' => '1234567890g',
    ];

    $response = $this->withHeaders(['Accept' => 'application/json'])
        ->post('/addOrcamento', $data);

    $response->assertStatus(422);

    // Verifica as mensagens de erro específicas
    $response->assertJsonValidationErrors(['data', 'hora', 'valor', 'email', 'fone']);
}


    /**
     * Testa a atualização de um orçamento.
     *
     * @return void
     */
    public function test_update_orcamento()
    {
        $orcamento = \App\Models\Orcamento::factory()->create();
        $data = [
            'cliente' => 'Cliente Teste',
            'titulo' => 'Título Teste',
            'data' => '2023/09/10',
            'hora' => '12:00',
            'descricao' => 'Teste de descrição',
            'vendedor' => 'Vendedor Teste',
            'valor' => '450.50',
            'email' => 'teste@teste.com',
            'fone' => '31999999999',
        ];

        $response = $this->put("/api/orcamentosUpdate/{$orcamento->id}", $data);

        $response->assertStatus(200);
    }



    /**
     * Testa a validação da edição de um orçamento.
     *
     * @return void
     */
    public function test_update_orcamento_with_invalid_data()
    {
        $orcamento = \App\Models\Orcamento::factory()->create();
    
        $data = [
            'cliente' => 'Cliente Teste',
            'titulo' => 'Título Teste',
            'data' => 'valor invalido',
            'hora' => 'valor invalido',
            'descricao' => 'Teste de descrição',
            'vendedor' => 'Vendedor Teste',
            'valor' => 'valor invalido',
            'email' => 'valor invalido', 
            'fone' => '1234567890g',
        ];
    
        $response = $this->withHeaders(['Accept' => 'application/json'])
    ->put("/api/orcamentosUpdate/{$orcamento->id}", $data);

    
        $response->assertStatus(422); 
    
        // Verifica as mensagens de erro específicas
        $response->assertJsonValidationErrors(['valor', 'email', 'data', 'hora', 'fone']);
    }
    


    /**
     * Testa a exclusão de um orçamento.
     *
     * @return void
     */
    public function test_destroy_deletes_orcamento()
    {
        $orcamento = \App\Models\Orcamento::factory()->create();

        $response = $this->delete("/api/orcamentosDelete/{$orcamento->id}");

        $response->assertStatus(200);

        $this->assertDatabaseMissing('orcamentos', ['id' => $orcamento->id]);
    }


    /**
     * Testa o método 'filtrar' para verificar se ele retorna resultados filtrados corretamente.
     *
     * @return void
     */
    public function test_filtrar_returns_filtered_results()
    {
        $data = [
            'cliente' => 'Nome do Cliente',
            'dataInicio' => '2023-01-01',
            'dataFinal' => '2023-12-31',
            'titulo' => 'Título do Orçamento',
            'valorAbaixoDe' => 1000, 
            'valorAcimaDe' => 100, 
            'vendedor' => 'Nome do Vendedor',
        ];

        // Realiza uma solicitação POST para o endpoint do método 'filtrar'
        $response = $this->post('/api/orcamentosFilter', $data);

        // Verifica se a resposta tem o status HTTP 200
        $response->assertStatus(200);

    }
}
