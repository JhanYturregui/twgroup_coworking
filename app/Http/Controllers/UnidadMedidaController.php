<?php

namespace App\Http\Controllers;

use App\Models\UnidadMedida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UnidadMedidaController extends Controller {
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct() {
    $this->middleware('auth');
    date_default_timezone_set('America/Lima');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    return view('pages.unidades-medida.index');
  }

  /**
  * Obtener datos para datatables
  *
  * @return json
  */
  public function obtenerDatos() {
    $query = DB::table('unidades_medida')
              ->select('id', 'nombre', 'factor', 'estado', 'created_at', 'updated_at')
              ->orderBy('id', 'desc');

    return datatables()
      ->queryBuilder($query)
      ->addColumn('col-estado', 'pages.unidades-medida.columnas.estado')
      ->addColumn('col-acciones', 'pages.unidades-medida.columnas.acciones')
      ->rawColumns(['col-estado', 'col-acciones'])
      ->toJson();
  }

  /**
   * Función para validar datos para registro o actualización
   * 
   * @param Array $datos
   * @param int $id (null ? registrar : actualizar )
   * @return \Illuminate\Http\Response
   */
  public function validarDatos($datos, $id) {
    $response = array();

    if ($id) {
      if (!UnidadMedida::find($id)) {
        $response = ['estado' => false, 'mensaje' => 'El registro no existe.'];
        return $response;
      }
    }

    $unico = $id ? 'unique:modelos,id,'. $id : 'unique:modelos';
    $reglas = ['nombre' => 'bail|required|'.$unico.'|max:100',
               'factor' => 'bail|required'];

    $mensajes = [
      'nombre.required' => 'El campo NOMBRE es obligatorio.',
      'nombre.unique'   => 'El NOMBRE ya está registrado.',
      'nombre.max'      => 'El campo NOMBRE puede tener máximo 100 caracteres.',
      'factor.required' => 'El campo FACTOR es obligatorio.',
    ];

    $validator = Validator::make($datos, $reglas, $mensajes);  
    if ($validator->fails()) {
      $response = ['estado' => false, 'mensaje' => $validator->messages()->first()];
    } else {
      $response = ['estado' => true];
    }

    return $response;
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    return view('pages.unidades-medida.crear');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request) {
    $datos = array();
    $datos['nombre'] = mb_strtoupper($request->input('nombre'));
    $datos['factor'] = $request->input('factor');

    $response = $this->validarDatos($datos, null);
    if (!$response['estado']) return json_encode($response);

    try {
      $modelo = UnidadMedida::create($datos);

      $response = [
        'estado' => true,
        'mensaje' => 'Registro correcto.',
        'id' => $modelo->id,
        'nombre' => $modelo->nombre,
        'factor' => $modelo->factor,
        'data' => $modelo
      ];

    } catch (Exception $e) {
      $response = ['estado' => false, 'mensaje' => $e->getMessage()];
    }

    return json_encode($response);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  id
   * @return \Illuminate\Http\Response
   */
  public function edit($id) {
    $dato = UnidadMedida::find($id);
    return view('pages.unidades-medida.modificar', compact('dato'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request){
    $id = intval($request->input('id'));
    $datos = array();
    $datos['nombre'] = mb_strtoupper($request->input('nombre'));
    $datos['factor'] = $request->input('factor');
    $datos['estado'] = $request->input('estado');

    $response = $this->validarDatos($datos, $id);
    if (!$response['estado']) return json_encode($response);

    try {
      $dato = UnidadMedida::find($id);
      $dato->update($datos);
      $response = ['estado' => true, 'mensaje' => 'Actualización correcta.'];

    } catch (Exception $e) {
      $response = ['estado' => false, 'mensaje' => $e->getMessage()];
    }

    return json_encode($response);
  }

  /**
  * Eliminar un registro (inactivar)
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function delete(Request $request) {
    $id = $request->input('id');
    $response = array();

    try {
      $dato = UnidadMedida::findOrFail($id);
      $dato->estado = 0;
      $dato->save();

      $response = ['estado' => true, 'mensaje' => 'Eliminación correcta.'];

    } catch (Exception $e) {
      $response = ['estado' => false, 'mensaje' => $e->getMessage()];
    }
    return json_encode($response);
  }
}
