<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrcamentoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
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
            'fone' => 'required|string',
        ];
    }
}
