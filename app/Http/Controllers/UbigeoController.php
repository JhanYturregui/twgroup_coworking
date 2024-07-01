<?php

namespace App\Http\Controllers;

use App\Models\Ubigeo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UbigeoController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct() {
      $this->middleware('auth');
      date_default_timezone_set('America/Lima');
      $this->ubigeo = new Ubigeo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
      return view('pages.ubigeos.index');
    }

    /**
    * Obtener datos para datatables
    *
    * @return json
    */
    public function obtenerDatos() {
      $query = DB::table('ubigeos')
                ->select('id', 'nombre', 'coddpto', 'codprov', 'coddist', 'estado')
                ->orderBy('id', 'desc');

      return datatables()
        ->queryBuilder($query)
        ->toJson();
    }

    /**
    *  Cargar provincias por Departamento y distritos de la primera provincia
    *
    */
    public function cargarProvincias(Request $request) {
      $codDpto = $request->input('codDpto');
      $codigosUbigeo = $this->ubigeo->obtenerCodigosUbigeo($codDpto, null);

      $response = [
        'estado' => true,
        'provincias' => $codigosUbigeo['provincias'],
        'distritos' => $codigosUbigeo['distritos'],
      ];

      return json_encode($response);
    }

    /**
    *  Cargar distritos por provincia
    *
    */
    public function cargarDistritos(Request $request)
    {
      $codDpto = $request->input('codDpto');
      $codProv = $request->input('codProv');

      $codigosUbigeo = $this->ubigeo->obtenerCodigosUbigeo($codDpto, $codProv);

      $response = [
        'estado' => true,
        'distritos' => $codigosUbigeo['distritos'],
      ];

      return json_encode($response);
    }
}
