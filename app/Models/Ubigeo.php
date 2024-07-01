<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubigeo extends Model
{
    use HasFactory;

    protected $table = 'ubigeos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'nombre', 
      'coddpto', 
      'codprov', 
      'coddist', 
      'estado'
    ];

    public function obtenerCodigosUbigeo($codDpto, $codProv) {
      try {
        $departamentos = Ubigeo::where([['codprov', '00'], ['coddist', '00']])->get();

        $codigoDpto = $codDpto ? $codDpto : $departamentos[0]->coddpto;
        $provincias = Ubigeo::where([
                              ['coddpto', $codigoDpto],
                              ['codprov', '!=', '00'], 
                              ['coddist', '00']
                            ])->get();

        $codigoProv = $codProv ? $codProv : $provincias[0]->codprov;
        $distritos = Ubigeo::where([
                              ['coddpto', $codigoDpto],
                              ['codprov', $codigoProv], 
                              ['coddist', '!=', '00']
                            ])->get();
        
        $codigos = [
          'departamentos' => $departamentos,
          'provincias' => $provincias,
          'distritos' => $distritos,
        ];

      } catch (Exception $e) {
        $response = ['estado' => false, 'mensaje' => $e->getMessage()];
      }

      return $codigos;
    }
}
