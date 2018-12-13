<?php

namespace App\Http\Controllers\Work;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Entry;
use App\Parametro;
use App\Owenr;
use Carbon\Carbon;

class TransationController extends Controller
{
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
         //dd($request);
         $tr=DB::table('transaccion')->where("id_transaccion",$request['id_transaccion'])->get();
         if(count($tr)==0){
            DB::table('transaccion')->insert([
                                            "fecha_transaccion"=>$request['fecha_transaccion'],
                                            "forma_de_pago"=>$request['forma_de_pago'],
                                            "id_transaccion"=>$request['id_transaccion'],
                                            'total'=>$request['valor_factura'],
                                            'id_entry'=>$request['entries_id'],
                                            'estado_transaccion'=>'pagado'
                                            ]);   

            //bloque copiado de MOstra FacturaControler show
                  $entries = Entry::all();

                  $parametros = Parametro::all();

                  $consulta = DB::table('owenrs')
                                ->join('entries','owenrs.entries_id','entries.id')
                                ->where('owenrs.entries_id',$request['entries_id'])
                                ->get();
                  //dd($consulta);              
                  if ($consulta->count()=='0') {
                    return redirect()->route('entries.show',$request['entries_id'])->with('entries', $entries)->with('success', 'No se puede generar la liquidación de la factura se debe ingresar toda la información');
                  }

               //crear la consulta para traer la validacion de la informacion del monto a pagar del propietario
                foreach ($consulta as $consultas) {
                  $var = $consultas->crane_id;
                  $val = $consultas->rate_id;
                  $numPlaca = $consultas->placa;
                  //capturasr la fecha de la entrada del vehiculo
                  $fechas = Carbon::parse($consultas->created_at)->format('Y');
                  $fecha = $consultas->created_at;
                  $actual =  Carbon::now()->format('Y');
                  $actuales =  Carbon::now();
                  $dias = $actuales->diffInDays($fecha);
                }

                $valores = Owenr::select('entries.id','entries.created_at','cranes.valor AS cr_valor','cranes.anio AS cr_anio',
                                         'rates.valor AS rt_valor','rates.anio AS rt_anio','entries.placa','owenrs.nombre'
                                         ,'owenrs.documento','owenrs.direccion','owenrs.celular','owenrs.mail'
                                         ,'rates.servicio AS rt_servicio','cranes.servicio AS cr_servicio')
                                ->join('entries','owenrs.entries_id','entries.id')
                                ->join('rates','entries.rate_id','rates.id')
                                ->join('cranes','entries.crane_id','cranes.id')
                                ->where('entries.id',$request['entries_id'])
                                ->get();
                  $transaccion=DB::table('transaccion')->where([
                                                              ['id_entry',$request['entries_id']],
                                                              ['estado_transaccion','pagado']
                                                    ])->get();
               

                  if ($valores->count() == '0') {
                      return redirect()->route('servicios.index')->with('success', 'No se puede liquidar la factura la TARIFA NO ESTA CREADA PARA ESTA FECHA');
                  }
                  //dd($consulta);
                return view('works.mostrarfacturas.show',compact('consulta'))->with('valores', $valores)->with('actuales', $actuales)->with('numPlaca', $numPlaca)->with('parametros', $parametros)->with("transaccion",$transaccion)->with('success','Pago registrado');
            
            //


         }else{
           //dd("ee");
           //
            return redirect()->back()->with('errores','No se puede ingresar este pago ya se habia registrado,por favor verifica el # de pago de la entidad');
            
         }
         
         
    }

   
}
