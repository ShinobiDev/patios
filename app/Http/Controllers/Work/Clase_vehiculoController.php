<?php

namespace App\Http\Controllers\work;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Yard;
use Illuminate\Support\Facades\Input;
use App\Section;
use App\Rate;
use App\Crane;
use App\Clase_vehiculo;
use App\Entry;
use App\Asignar;
use App\Rango;
use App\Inventary;
use Carbon\Carbon;
use App\Owenr;
use App\Infraccion;
use Illuminate\Support\Facades\DB;






class Clase_vehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }


    public function parqueadoro()
  {


      $tipo = Input::get('tipo');
      $rates = Rate::where('tipo_vehiculo','like','%'.$tipo.'%')->get();


      return response()->json($rates);

  }

  public function gruas()
{

  // $vista = DB::table('owenrs')->select('entries.id','entries.placa','entries.created_at','entries.comparendo',
  //                                      'owenrs.documento','owenrs.entries_id','entries.fisico','infraccions.codigo','entries.causal')
  //             ->join('entries','owenrs.entries_id','entries.id')
  //             ->join('infraccions','entries.infraccion_id','infraccions.id')
  //             ->get();
  //
  //   if ($vista->count()==0) {
  //       return redirect()->route('reports.index')->with('success', 'No hay registros de ingreso en este rango de fechas');
  //   }

    // $entries =Entry::all();
    $tipo = Input::get('tipo');
    $cranes = Crane::where('tipo_vehiculo','like','%'.$tipo.'%')->get();


    return response()->json($cranes);

}


}
