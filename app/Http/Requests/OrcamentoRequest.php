<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Classe de Request para validação de Orçamento.
 */
class OrcamentoRequest extends FormRequest
{
    /**
     * Determina se o usuário está autorizado a fazer esta solicitação.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Obtem as regras de validação para a solicitação.
     *
     * @return 
     */
    public function rules()
    {
        return [
            'titulo' => 'required|string|max:255',
            'cliente' => 'required|string|max:255',
            'data' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'descricao' => 'required|string',
            'vendedor' => 'required|string|max:255',
            'valor' => 'required|numeric',
            'email' => 'required|email',
            'fone' => 'required|string|max:11',
        ];
    }

    /**
     * Mensagens de erro para as regras de validação definidas.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'titulo.required' => 'O campo Título é obrigatório.',
            'cliente.required' => 'O campo Cliente é obrigatório.',
            'data.required' => 'O campo Data é obrigatório.',
            'hora.required' => 'O campo Hora é obrigatório.',
            'descricao.required' => 'O campo Descrição é obrigatório.',
            'vendedor.required' => 'O campo Vendedor é obrigatório.',
            'valor.required' => 'O campo Valor é obrigatório.',
            'email.required' => 'O campo Email é obrigatório.',
            'fone.required' => 'O campo Telefone é obrigatório.',

            // Validações do formato de campo
            'titulo.string' => 'O campo Título deve ser um texto',
            'cliente.string' => 'O campo Título deve ser um texto',
            'descricao.string' => 'O campo Título deve ser um texto',
            'vendedor.string' => 'O campo Título deve ser um texto',
            'fone.string' => 'O campo Telefone deve ser um numero válido',
            'data.date' => 'O campo Data deve ser uma data válida',
            'hora.date_format' => 'O campo Hora deve estar no formato HH:MM',
            'valor.numeric' => 'O campo Valor deve ser um número',
            'email.email' => 'O campo Email deve ser um endereço de e-mail válido',
        ];
    }
}
