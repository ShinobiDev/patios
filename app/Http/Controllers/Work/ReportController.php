<?php

namespace App\Http\Controllers\Work;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Entry;
use App\Yard;
use App\Section;
use App\Asignar;
use App\Rango;
use App\Inventary;
use App\Rate;
use App\Crane;
use Carbon\Carbon;
use App\Report;
use Illuminate\Support\Facades\DB;


class ReportController extends Controller
{

    public function index (){

      $report = new Report;
      $this->authorize('view', $report);

      return view('works.reports.index');
    }


    public function reporte (Request $request){


      $fechaini = Carbon::parse($request->fechaini)->format('Y-m-d').' 00:00:00';
      $fechafin = Carbon::parse($request->fechafin)->format('Y-m-d').' 23:59:00';
      $report = $request->reporte;
      // dd($fechaini );
      // dd($fechafin );
          if ($report == 'ingreso')
          {



            $vista = DB::table('owenrs')->select('entries.id','entries.placa','entries.created_at','entries.comparendo',
                                                 'owenrs.documento','owenrs.entries_id','entries.fisico','infraccions.codigo','entries.causal')
                        ->join('entries','owenrs.entries_id','entries.id')
                        ->join('infraccions','entries.infraccion_id','infraccions.id')
                        ->whereBetween('entries.created_at',[$fechaini,$fechafin])
                        ->get();

              if ($vista->count()==0) {
                  return redirect()->route('reports.index')->with('success', 'No hay registros de ingreso en este rango de fechas');
              }



                return view('works.reports.ingreso',compact('vista'));



          }

          elseif($report =='salida')
          {

            $vista = DB::table('salidas')->select('entries.id','entries.placa','salidas.created_at','entries.comparendo','entries.created_at as inicial',
                                                 'owenrs.documento','owenrs.entries_id','entries.fisico','infraccions.codigo','entries.causal'
                                                 ,'salidas.created_at as final')
                        ->join('entries','salidas.entries_id','entries.id')
                        ->join('owenrs','salidas.owenrs_id','owenrs.id')
                        ->join('infraccions','entries.infraccion_id','infraccions.id')
                        ->whereBetween('salidas.created_at',[$fechaini, $fechafin])
                        ->get();
                  // dd($vista);
              if ($vista->count()==0) {
                  return redirect()->route('reports.index')->with('success', 'No hay registros de salida en este rango de fechas');
              }




                return view('works.reports.salida',compact('vista'));

          }

          elseif ($report == 'permanencia')
          {

            $vista = DB::table('salidas')->select('entries.id','entries.placa','salidas.created_at AS fesalida','entries.created_at AS feingreso','entries.comparendo',
                                                 'owenrs.documento','owenrs.entries_id','entries.fisico','infraccions.codigo','entries.causal')
                        ->join('entries','salidas.entries_id','entries.id')
                        ->join('owenrs','salidas.owenrs_id','owenrs.id')
                        ->join('infraccions','entries.infraccion_id','infraccions.id')
                        ->whereBetween('salidas.created_at',[$fechaini, $fechafin])
                        ->get();




              if ($vista->count()==0) {
                  return redirect()->route('reports.index')->with('success', 'No hay registros de permanencia en este rango de fechas');
              }

                return view('works.reports.permanencia',compact('vista'));

          }

          elseif ($report == 'obligatorio')
          {

            //query para generar el informe de obligatorio


            // $vista = DB::table('salidas')->select('entries.id','entries.placa','salidas.created_at AS fesalida','entries.created_at AS feingreso','entries.comparendo',
            //                                      'owenrs.documento','owenrs.entries_id','entries.fisico','infraccions.codigo')
            //             ->join('entries','salidas.entries_id','entries.id')
            //             ->join('owenrs','salidas.owenrs_id','owenrs.id')
            //             ->join('infraccions','entries.infraccion_id','infraccions.id')
            //             ->whereBetween('salidas.created_at',[$fechaini, $fechafin])
            //             ->get();


              $vista = DB::table('infraccions')
                          ->select('entries.created_at','entries.placa','infraccions.codigo','entries.comparendo','entries.grado','entries.causal')
                          ->join('entries','entries.infraccion_id','infraccions.id')
                          ->where('grado','>','0')
                          ->whereNotIn('entries.id', function($query){
                            $query->select(DB::raw('salidas.entries_id'))
                            ->from('salidas');
                          })
                          ->whereBetween('entries.created_at',[$fechaini, $fechafin])
                          ->get();

                // dd($vista);

              if ($vista->count()==0) {
                  return redirect()->route('reports.index')->with('success', 'No hay registros De obligatoriedad  en este rango de fechas');
              }

                return view('works.reports.obligatorio',compact('vista'));




          }

          elseif ($report == 'recaudo')
           {

              $vista = DB::table('entries')
                        ->select('invoces.created_at','invoces.valor_factura','rates.servicio AS rate' ,'cranes.servicio AS crane','entries.placa','invoces.id','invoces.valor_stb','invoces.valor_ittb','invoces.estado')
                        ->join('invoces','invoces.entries_id','entries.id')
                        ->join('rates','entries.rate_id','rates.id')
                         ->join('cranes','entries.crane_id','cranes.id')
                         ->where('estado','!=','Anulado')
                        ->whereBetween('invoces.created_at',[$fechaini, $fechafin])
                        ->get();
              // dd($vista);
              if ($vista->count()==0) {
                  return redirect()->route('reports.index')->with('success', 'No hay registros de recaudos en este rango de fechas');
              }

                return view('works.reports.recaudo',compact('vista'));

          }else {
            //query para generar el informe de Grua

            $vista = DB::table('owenrs')->select('entries.id','entries.grua','entries.created_at','entries.comparendo','entries.placa','entries.causal',
                                                 'owenrs.documento','owenrs.entries_id','entries.fisico','infraccions.codigo','cranes.servicio')
                        ->join('entries','owenrs.entries_id','entries.id')
                        ->join('infraccions','entries.infraccion_id','infraccions.id')
                        ->join('cranes','entries.crane_id','cranes.id')
                        ->whereBetween('entries.created_at',[$fechaini,$fechafin])
                        ->get();

              if ($vista->count()==0) {
                  return redirect()->route('reports.index')->with('success', 'No hay registros de ingreso en este rango de fechas');
              }



                return view('works.reports.grua',compact('vista'));

          }




    }


}
