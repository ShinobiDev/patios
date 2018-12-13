<?php

namespace App\Http\Controllers\Work;

  use Illuminate\Http\Request;
  use App\Http\Controllers\Controller;
  use Illuminate\Support\Facades\Input;
  use Illuminate\Support\Facades\DB;
  use Carbon\Carbon;
  use App\Entry;
  use App\Yard;
  use App\Section;
  use App\Asignar;
  use App\Rango;
  use App\Inventary;
  use App\Rate;
  use App\Crane;
  use App\Servicio;
  use App\Owenr;
  use App\Parametro;


class MostrarFacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {

      //Consultar los valores de los propietarios

          $entries = Entry::all();

          $parametros = Parametro::all();

          $consulta = DB::table('owenrs')
                        ->join('entries','owenrs.entries_id','entries.id')
                        ->where('owenrs.entries_id',$id)
                        ->get();

          if ($consulta->count()=='0') {
            return redirect()->route('entries.show',$id)->with('entries', $entries)->with('success', 'No se puede generar la liquidación de la factura se debe ingresar toda la información');
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



        // $valores = Servicio::select('entries.created_at','servicios.val_grua','servicios.val_parqueadero',
        //                             'servicios.anio','servicios.crane_id','servicios.rate_id','entries.id')
        //                    ->join('entries','servicios.crane_id','entries.crane_id')
        //                    ->where('entries.id',$id)
        //                    ->where('servicios.crane_id','=',$var)
        //                    ->where('servicios.rate_id','=',$val)
        //                    ->where('servicios.anio',$fechas)
        //                    ->get();
                            // dd($valores);

        $valores = Owenr::select('entries.id','entries.created_at','cranes.valor AS cr_valor','cranes.anio AS cr_anio',
                                 'rates.valor AS rt_valor','rates.anio AS rt_anio','entries.placa','owenrs.nombre'
                                 ,'owenrs.documento','owenrs.direccion','owenrs.celular','owenrs.mail'
                                 ,'rates.servicio AS rt_servicio','cranes.servicio AS cr_servicio')
                        ->join('entries','owenrs.entries_id','entries.id')
                        ->join('rates','entries.rate_id','rates.id')
                        ->join('cranes','entries.crane_id','cranes.id')
                        ->where('entries.id',$id)
                        ->get();
        $transaccion=DB::table('transaccion')->where([
                                                  ['id_entry',$id],
                                                  ['estado_transaccion','pagado']
                                                ])->get();                 
        // dd($valores);

          if ($valores->count() == '0') {
              return redirect()->route('servicios.index')->with('success', 'No se puede liquidar la factura la TARIFA NO ESTA CREADA PARA ESTA FECHA');
          }
        return view('works.mostrarfacturas.show',compact('consulta'))->with('valores', $valores)->with('actuales', $actuales)->with('numPlaca', $numPlaca)->with('parametros', $parametros)->with('transaccion',$transaccion);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
