<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
use App\Invoce;
use App\Salida;
use App\Owenr;



class BuscarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $busca = $request->buscar;

      //Consultar los valores de los propietarios

      $actuales =  Carbon::now();
        $placa = Entry::where('placa',$request->buscar)->get();

        foreach ($placa as $placas)
        {
          $id = $placas->id;
        }


          if ($placa->count()=='0')

          {
              return redirect()->route('login')->with('errores', 'La placa no se encuetra en nuestro sistema');
          }

          $verificasalida = Invoce::where('entries_id',$id)
                                  ->get();

            if ($verificasalida->count() !='0')
          {
            return redirect()->route('login')->with('errores', 'El Vehículo con placas '.$busca.' ya fué retirado de nuestros patios y al '.$actuales.' se encuentra a Paz y Salvo.');
          }



       $consulta = DB::table('owenrs')
                      ->join('entries','owenrs.entries_id','entries.id')
                      ->where('owenrs.entries_id',$id)
                      ->get();


          if ($consulta->count()=='0') {
            return redirect()->route('login',$id)->with('errores', 'En este momento no podemos brindar el valor debe intentar más tarde');
          }

       //crear la consulta para traer la validacion de la informacion del monto a pagar del propietario
        foreach ($consulta as $consultas) {
          $var = $consultas->crane_id;
          $val = $consultas->rate_id;
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
                           ->where('entries.id',$id)
                           ->where('entries.crane_id','=',$var)
                           ->where('entries.rate_id','=',$val)
                           ->where('cranes.anio',$fechas)

                           ->get();
                    // dd($valores);

          // dd($valores);
          if ($valores->count()=='0') {
              return redirect()->route('login')->with('errores', 'En este momento no podemos brindar el valor debe intentar más tarde');
          }
        return view('buscar.buscar',compact('consulta'))->with('valores', $valores)->with('actuales', $actuales);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {


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
