<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orcamento;
use App\Http\Requests\OrcamentoRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;




/**
 * Controlador para orçamentos.
 */
class OrcamentoController extends Controller
{

    /**
     * Exibe a lista de todos os orçamentos.
     *
     * @param Request $request O objeto de solicitação HTTP.
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{
    $orcamentos = Orcamento::all();
    
    if ($request->wantsJson()) {
        return response()->json($orcamentos);
    }

    return view('orcamentos.index', compact('orcamentos'));

}
    


   /**
     * Armazena um novo orçamento.
     *
     * @param OrcamentoRequest $request O objeto de solicitação validado.
     * @return \Illuminate\Http\Response
     */
    public function store(OrcamentoRequest $request)
    {
        // Valida os dados usando o OrcamentoRequest
        $validator = Validator::make($request->all(), $request->rules(), $request->messages());
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $data = $request->all();
        Orcamento::create($data);
    
        return response()->json(['message' => 'Orçamento criado com sucesso']);
    }
    

    

   
     /**
     * Atualiza um orçamento existente.
     *
     * @param Request $request 
     * @param int $id ID do orçamento a ser atualizado.
     * @return \Illuminate\Http\Response
     */
    public function update(OrcamentoRequest $request, $id)
{
    $orcamento = Orcamento::find($id);

    if (!$orcamento) {
        return response()->json(['message' => 'Orçamento não encontrado'], 404);
    }

        // Valida os dados usando o OrcamentoRequest
        $validator = Validator::make($request->all(), $request->rules(), $request->messages());

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $data = $request->all();
    $orcamento->update($data);

    return response()->json(['message' => 'Orçamento atualizado com sucesso']);
}






    /**
     * Exclui um orçamento.
     *
     * @param int $id ID do orçamento a ser excluído.
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    $orcamento = Orcamento::find($id);

    if (!$orcamento) {
        return response()->json(['message' => 'Orçamento não encontrado'], 404);
    }

    $orcamento->delete();

    return response()->json(['message' => 'Orçamento excluído com sucesso']);
}





/**
     * Filtra os orçamentos com base em vários critérios.
     *
     * @param Request $request O objeto de solicitação HTTP.
     * @return \Illuminate\Http\Response
     */
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
