<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Unidad,App\Models\Ubicacion;
use Input;

class ConsultaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

         $unidades= DB::table('unidad')->select('nombre_unidad','unidad_pk')->get();
		$ubicaciones= DB::table('ubicacion')->select('ubicacion','ubicacion_pk')->get();

		$unidadSeleccionada= new Unidad();
		$ubicacionSeleccionada=new Ubicacion();

		$bien=DB::table('bien')
		->leftJoin('inventario as inventario', 'bien.bien_pk', '=', 'inventario.bien_fk', 'left outer')
		->leftJoin('marca', 'bien.marca_fk', '=', 'marca.marca_pk', 'left outer')
		->leftJoin('ubicacion', 'inventario.ubicacion_fk', '=', 'ubicacion_pk', 'left outer')
		->leftJoin('unidad', 'inventario.unidad_fk', '=', 'unidad.unidad_pk', 'left outer')
		->leftJoin('identificacion', 'bien.identificacion_fk', '=', 'identificacion.identificacion_pk', 'left outer')
		->leftJoin('catalogo_activo', 'identificacion.catalogo_fk', '=', 'catalogo_activo.catalogo_act_pk', 'left outer')
		->leftJoin('especifico', 'identificacion.especifico_fk', '=', 'especifico.especifico_pk', 'left outer')
		->leftJoin('proveedor', 'identificacion.proveedor_fk', '=', 'proveedor.proveedor_pk', 'left outer')
		->join('clase', function($join){ $join->on('identificacion.clase_fk', '=', 'clase.clase_pk');$join->on('clase.catalogo_fk','=','identificacion.catalogo_fk' );}) 
		->select('bien.bien_pk', 'bien.identificacion_fk', 'nombre_marca','descripcion_equipo','modelo','serie','ubicacion','estado_fk','nombre_unidad','valor_adquisicion','bien_principal_fk','ingreso_fk','traslado_fk','descargo_fk','nombre_clase','nombre_catalogo','nombre_especifico','nombre_proveedor','fecha_adquisicion','fecha_inventario','observacion','movimiento')
		->orderBy('bien_pk','ASC')->Paginate(20)->setPath('');

		return view('consulta.consulta',compact('bien','unidadSeleccionada','ubicacionSeleccionada','unidades','ubicaciones'));
		

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function filtro(Request $request)
	{ 
		/*Para la unidad*/
		$unidad=Input::get('unidad');
		$unidades= DB::table('unidad')->select('nombre_unidad','unidad_pk')->get();
		if($unidad=='default'){
			$unidadSeleccionada=new Unidad();
			$ubicaciones= DB::table('ubicacion')->select('ubicacion','ubicacion_pk')->get();
		}
		else{
			$unidadSeleccionada = DB::table('unidad')->select('nombre_unidad','unidad_pk')->where('unidad_pk','=',$unidad)->first();
			$ubicaciones= DB::table('ubicacion')->select('ubicacion','ubicacion_pk')->where('unidad_fk','=', $unidad)->get();
		}

		/*Para las ubicaciones*/
		$ubicacion=Input::get('ubicacion');
		if($ubicacion=='default'){
			$ubicacionSeleccionada=new Ubicacion();
		}
		else{
			$ubicacionSeleccionada = DB::table('ubicacion')->select('ubicacion','ubicacion_pk')->where('ubicacion_pk','=',$ubicacion)->first();
		}




		$bien=DB::table('bien')
		->leftJoin('inventario as inventario', 'bien.bien_pk', '=', 'inventario.bien_fk', 'left outer')
		->leftJoin('marca', 'bien.marca_fk', '=', 'marca.marca_pk', 'left outer')
		->leftJoin('ubicacion', 'inventario.ubicacion_fk', '=', 'ubicacion_pk', 'left outer')
		->leftJoin('unidad', 'inventario.unidad_fk', '=', 'unidad.unidad_pk', 'left outer')
		->leftJoin('identificacion', 'bien.identificacion_fk', '=', 'identificacion.identificacion_pk', 'left outer')
		->leftJoin('catalogo_activo', 'identificacion.catalogo_fk', '=', 'catalogo_activo.catalogo_act_pk', 'left outer')
		->leftJoin('especifico', 'identificacion.especifico_fk', '=', 'especifico.especifico_pk', 'left outer')
		->leftJoin('proveedor', 'identificacion.proveedor_fk', '=', 'proveedor.proveedor_pk', 'left outer')
		->join('clase', function($join){ $join->on('identificacion.clase_fk', '=', 'clase.clase_pk');$join->on('clase.catalogo_fk','=','identificacion.catalogo_fk' );}) 
		->select('bien.bien_pk', 'bien.identificacion_fk', 'nombre_marca','descripcion_equipo','modelo','serie','ubicacion','estado_fk','nombre_unidad','valor_adquisicion','bien_principal_fk','ingreso_fk','traslado_fk','descargo_fk','nombre_clase','nombre_catalogo','nombre_especifico','nombre_proveedor','fecha_adquisicion','fecha_inventario','observacion','movimiento')->where('unidad_pk','=',$unidad)->orderBy('bien_pk','ASC')->Paginate(20)->setPath('');

		return view('consulta.consulta',compact('bien'))->with('ubicaciones',$ubicaciones)->with('unidades',$unidades)->with('unidadSeleccionada',$unidadSeleccionada)->with('ubicacionSeleccionada',$ubicacionSeleccionada);
	}

}
