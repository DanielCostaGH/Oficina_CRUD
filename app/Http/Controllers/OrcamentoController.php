<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orcamento;
use App\Http\Requests\OrcamentoRequest;

class OrcamentoController extends Controller
{
    public function index(Request $request)
{
    $orcamentos = Orcamento::all();
    
    if ($request->wantsJson()) {
        return response()->json($orcamentos);
    }

    return view('orcamentos.index', compact('orcamentos'));

}
    


   
     public function store(OrcamentoRequest $request)
{
    $data = $request->all();
    Orcamento::create($data);

    return view('orcamentos.index')
        ->with('success', 'Orçamento criado com sucesso.');
}


   
   
    public function update(Request $request, $id)
{
    $orcamento = Orcamento::find($id);

    if (!$orcamento) {
        return response()->json(['message' => 'Orçamento não encontrado'], 404);
    }

    $data = $request->all();
    $orcamento->update($data);

    return response()->json(['message' => 'Orçamento atualizado com sucesso']);
}


   
    public function destroy($id)
{
    $orcamento = Orcamento::find($id);

    if (!$orcamento) {
        return response()->json(['message' => 'Orçamento não encontrado'], 404);
    }

    $orcamento->delete();

    return response()->json(['message' => 'Orçamento excluído com sucesso']);
}


public function filtrar(Request $request)
{
    $cliente = $request['cliente'];
    $dataInicio = $request['dataInicio'];
    $dataFinal = $request['dataFinal'];
    $titulo = $request['titulo'];
    $valorAbaixoDe = $request['valorAbaixoDe'];
    $valorAcimaDe = $request['valorAcimaDe'];
    $vendedor = $request['vendedor'];
    

    $orcamentos = Orcamento::search($cliente, $dataInicio, $dataFinal, $titulo, $valorAbaixoDe, $valorAcimaDe, $vendedor);

    
    return response()->json($orcamentos);
    // return view('orcamentos.filters', compact('orcamentos'));
      
}


   
}
