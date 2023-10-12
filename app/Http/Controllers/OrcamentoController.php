<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orcamento; // Lembre-se de importar o modelo Orçamento se você estiver usando Eloquent

class OrcamentoController extends Controller
{
    // Método para exibir a lista de orçamentos
    public function index()
    {
        $orcamentos = Orcamento::all(); // Recupera todos os orçamentos do banco de dados
        return view('orcamentos.index', compact('orcamentos'));
    }

    // Método para exibir o formulário de criação
    public function create()
    {
        return view('orcamentos.create');
    }

    // Método para lidar com a criação de um novo orçamento
    public function store(Request $request)
    {
        // Validação dos dados e salvamento no banco de dados
        // (Exemplo: $orcamento = new Orcamento; $orcamento->fill($request->all()); $orcamento->save();)

        return redirect()->route('orcamentos.index')
            ->with('success', 'Orçamento criado com sucesso.');
    }

    // Método para exibir o formulário de edição
    public function edit($id)
    {
        $orcamento = Orcamento::find($id);
        return view('orcamentos.edit', compact('orcamento'));
    }

    // Método para lidar com a atualização de um orçamento existente
    public function update(Request $request, $id)
    {
        // Validação dos dados e atualização no banco de dados
        // (Exemplo: $orcamento = Orcamento::find($id); $orcamento->update($request->all());)

        return redirect()->route('orcamentos.index')
            ->with('success', 'Orçamento atualizado com sucesso.');
    }

    // Método para exibir a página de confirmação de exclusão
    public function confirmDelete($id)
    {
        $orcamento = Orcamento::find($id);
        return view('orcamentos.confirm-delete', compact('orcamento'));
    }

    // Método para lidar com a exclusão de um orçamento
    public function destroy($id)
    {
        $orcamento = Orcamento::find($id);
        $orcamento->delete();

        return redirect()->route('orcamentos.index')
            ->with('success', 'Orçamento excluído com sucesso.');
    }
}
