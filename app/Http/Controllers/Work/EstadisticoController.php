<?php

namespace App\Http\Controllers\Work;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Entry;
use App\Yard;
use App\Section;
use App\Asignar;
use App\Rango;
use App\Inventary;
use App\Rate;
use App\Crane;
use Carbon\Carbon;
use App\Parametro;

class EstadisticoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('works.estadisticos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function reporte (Request $request){

       // dd($request->all());

       // $fechaini = Carbon::parse($request->fechaini.'-01')->format('Y-m-d').' 00:00:00';
       // $fechafin = Carbon::parse($request->fechaini.'-31')->format('Y-m-d').' 23:59:00';
       $report = $request->reporte;
       // dd($fechaini );
       // dd($fechafin );
           if ($report == 'ingreso')
           {



             $vista = DB::table('entries')
                      ->join('infraccions','entries.infraccion_id','infraccions.id', 'infraccions.codigo')
                       ->where('entries.created_at','like','%'.$request->fechaini.'%')
                      ->select(DB::raw('infraccions.codigo as codigo'), DB::raw('count(infraccions.id) as cantidad'))
                      ->groupBy('codigo')
                      ->get();




               if ($vista->count()==0) {
                   return redirect()->route('estadisticos.index')->with('success', 'No hay registros de ingreso en este rango de fechas');
               }



                 return view('works.estadisticos.ingreso',compact('vista'));



           }

           elseif($report =='salida')
           {

             $vista = DB::table('salidas')
                      // ->join('infraccions','entries.infraccion_id','infraccions.id', 'infraccions.codigo')
                      ->where('created_at','like','%'.$request->fechaini.'%')
                       ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as promedio'))
                      ->groupBy('date')
                      ->get();

                   // dd($vista);
               if ($vista->count()==0) {
                   return redirect()->route('estadisticos.index')->with('success', 'No hay registros de salida en este rango de fechas');
               }




                 return view('works.estadisticos.salida',compact('vista'));

           }

           elseif ($report == 'valor')
           {

             $fechafin = Carbon::parse($request->fechaini)->format('Y');

             $vista = DB::table('entries')
                         ->join('cranes','entries.crane_id','cranes.id')
                         ->join('asignars','asignars.entries_id','entries.id')
                         ->join('yards','asignars.nombre','yards.id')
                         ->join('invoces','invoces.entries_id','entries.id')
                         ->where('invoces.created_at','like','%'.$request->fechaini.'%')
                         ->where('cranes.anio','like','%'.$fechafin.'%')
                         ->where('invoces.estado','!=','Anulado')
                         ->select(DB::raw('yards.nombre as patio'), DB::raw('sum(cranes.valor) as valor'))
                         ->groupBy('patio')
                         ->get();


                // dd($vista);

               if ($vista->count()==0) {
                   return redirect()->route('estadisticos.index')->with('success', 'No hay registros de Permanencia en este rango de fechas');
               }

                 return view('works.estadisticos.permanencia',compact('vista'));

           }

           elseif ($report == 'valorP')
           {

             $para = Parametro::all();
             foreach ($para as $par) {
               $sistemas = $par->sistema_stb + $par->sistema_ittb;
             }

             $fechafin = Carbon::parse($request->fechaini)->format('Y');
             $vista = DB::table('invoces')
                         ->join('entries','invoces.entries_id','entries.id')
                         ->join('rates','entries.rate_id','rates.id')
                         ->join('asignars','asignars.entries_id','entries.id')
                         ->join('yards','asignars.nombre','yards.id')
                         ->where('invoces.created_at','like','%'.$request->fechaini.'%')
                         ->where('rates.anio','like','%'.$fechafin.'%')
                         ->where('invoces.estado','!=','Anulado')
                         ->select(DB::raw('yards.nombre as patio'), DB::raw('sum(invoces.valor_factura - rates.valor -'.$sistemas.') as valor'))
                         ->groupBy('patio')
                         ->get();




               if ($vista->count()==0) {
                   return redirect()->route('estadisticos.index')->with('success', 'No hay registros De Obligatoriedad  en este rango de fechas');
               }

                 return view('works.estadisticos.obligatorio',compact('vista'));






           }else {
             //query para generar el informe de Grua

             $vista = DB::table('salidas')
                         ->join('entries','salidas.entries_id','entries.id')
                         ->join('asignars','asignars.entries_id','entries.id')
                         ->join('yards','asignars.nombre','yards.id')
                         ->join('invoces','invoces.entries_id','entries.id')
                         ->where('salidas.created_at','like','%'.$request->fechaini.'%')
                         ->where('invoces.estado','!=','Anulado')
                         ->select(DB::raw('yards.nombre as patio'), DB::raw('avg(invoces.dias_cantidad) as cantidad'))
                         ->groupBy('patio')
                         ->get();

               if ($vista->count()==0) {
                   return redirect()->route('estadisticos.index')->with('success', 'No hay registros de ingreso en este rango de fechas');
               }



                 return view('works.estadisticos.grua',compact('vista'));

           }




     }

   }
