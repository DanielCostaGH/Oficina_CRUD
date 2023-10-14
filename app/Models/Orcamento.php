<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orcamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente', 'data', 'hora', 'vendedor', 'descricao', 'valor', 'email', 'fone', 'titulo',
    ];

    public static function search($cliente = null, $dataInicio = null, $dataFinal = null, $titulo = null, $valorAbaixoDe = null, $valorAcimaDe = null, $vendedor = null) {
        $query = self::query(); // Inicializa a consulta na model

        // Verifica se os parâmetros foram fornecidos e adiciona condições à consulta
        if ($cliente) {
            $query->where('cliente', 'like', "%$cliente%");
        }
        
        if ($dataInicio) {
            $query->where('data', '>=', $dataInicio);
        }
        
        if ($dataFinal) {
            $query->where('data', '<=', $dataFinal);
        }
        
        if ($titulo) {
            $query->where('titulo', 'like', "%$titulo%");
        }
        
        if ($valorAbaixoDe) {
            $query->where('valor', '<', $valorAbaixoDe);
        }
        
        if ($valorAcimaDe) {
            $query->where('valor', '>', $valorAcimaDe);
        }
        
        if ($vendedor) {
            $query->where('vendedor', 'like', "%$vendedor%");
        }

        // Execute a consulta e retorne os resultados
        return $query->get();
    }
}
