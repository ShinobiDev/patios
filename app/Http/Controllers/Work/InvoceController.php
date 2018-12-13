<?php

namespace App\Http\Controllers\Work;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Entry;
use Carbon\Carbon;
use App\Servicio;
use App\Invoce;
use PDF;
use App\User;
use App\Owenr;
use App\Rate;
use App\Crane;
use Auth;
// use App\User;

class InvoceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoce = new Invoce;
        $this->authorize('view', $invoce);

        $invoces = DB::table('invoces')
                       ->select('invoces.id','invoces.valor_factura','invoces.pdf','invoces.created_at','entries.placa','invoces.estado')
                       ->join('entries','invoces.entries_id','entries.id')
                       ->get();
                      // dd($invoces);
        return view('works.invoces.index', compact('invoces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $invoce = new Invoce;
      $this->authorize('create', $invoce);

        $entries = Entry::all();
        return view('works.invoces.create',compact('entries','valores'));
    }

    public function valores($valor)
    {



      $valores = Owenr::select('entries.id','entries.created_at','cranes.valor AS cr_valor','cranes.anio AS cr_anio',
                               'rates.valor AS rt_valor','rates.anio AS rt_anio','entries.placa','owenrs.nombre'
                               ,'owenrs.documento','owenrs.direccion','owenrs.celular','owenrs.mail'
                               ,'rates.servicio AS rt_servicio','cranes.servicio AS cr_servicio')
                      ->join('entries','owenrs.entries_id','entries.id')
                      ->join('rates','entries.rate_id','rates.id')
                      ->join('cranes','entries.crane_id','cranes.id')
                      ->where('entries.id',$valor)
                      ->get();
        $entries = Entry::all();
        return view('works.invoces.create',compact('entries','valores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $invoce = new Invoce;
      $this->authorize('create', $invoce);



      $elabora = $request->elaborado;

      if ($request->nombre !='') {

        $data = $request->validate([
          'entries_id' => 'required',
          'valor_factura' => 'required|integer|min:0',
          'pdf' => 'required',
          'estado' => 'required',
          'valor_stb' => 'required',
          'valor_ittb' => 'required',
          'elaborado' => 'required',
          'dias_cantidad' => 'required'
        ]);

          $actuales =  Carbon::now();
          $nombre_pdf = 'facturaPDF/factuta-'.$actuales.'.pdf';
          $data['pdf'] = $nombre_pdf;

          $stb_resul = ($data['valor_factura']-13017)*0.7;
          $ittb_resul = ($data['valor_factura']-13017)*0.3;
          $data['valor_stb'] = $stb_resul+13010;
          $data['valor_ittb'] = $ittb_resul+7;

          $invoces = Invoce::create($data);

          $nombre =$request['nombre'];
          $documento =$request['documento'];
          $celular =$request['celular'];
          $mail =$request['mail'];
          $direccion =$request['direccion'];
          $concepto =$request['concepto'];
          $valor_factura =$request['valor_factura'];
          $valor_stb = $stb_resul;
          $valor_ittb = $ittb_resul;
          $elaborado = $request['elaborado'];
          $placa =$request['placa'];

          $numero = Entry::where('placa','placa')->get();
          foreach ($numero as $numeros) {
            $nume = $numeros->id;
          }

          $invoces = Invoce::where('entries_id',$request->entries_id)
                           ->where('estado','!=','Anulado')
                            ->get();


          $cajero = User::where('email',Auth::user()->email)->get();



            foreach ($cajero as $cajas) {

            $cajeros = $cajas->caja;

          }

          $transaccion=DB::table('transaccion')->where([
                                                    ['id_entry',$id],
                                                    ['estado_transaccion','pagado']
                                                  ])->get();

          // dd($cajeros);

          $pdf = PDF::loadView('works.invoces.recibo_manual', compact('invoces','nombre','documento','celular','mail','direccion',
                                                            'concepto','valor_factura','placa','nume','invoces','cajeros','elaborado','actuales','transaccion'))->save( $nombre_pdf );

          return redirect()->route('invoces.index')->with('success', 'Se ha generado la factura correctamente');

          }else{

        $data = $request->validate([
          'entries_id' => 'required',
          'valor_factura' => 'required|integer|min:0',
          'pdf' => 'required',
          'estado' => 'required',
          'valor_stb' => 'required',
          'valor_ittb' => 'required',
          'elaborado' => 'required',
          'dias_cantidad' => 'required'
        ]);



        $id = $request->entries_id;
        $consulta = DB::table('owenrs')
                       ->join('entries','owenrs.entries_id','entries.id')
                       ->where('owenrs.entries_id',$id)
                       ->get();


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


         $nombre_pdf = 'facturaPDF/factuta-'.$actuales.'.pdf';
         $data['pdf'] = $nombre_pdf;

         $invoces = Invoce::create($data);

         $valores = Owenr::select('entries.id','entries.created_at','cranes.valor AS cr_valor','cranes.anio AS cr_anio',
                                  'rates.valor AS rt_valor','rates.anio AS rt_anio','entries.placa','owenrs.nombre'
                                  ,'owenrs.documento','owenrs.direccion','owenrs.celular','owenrs.mail'
                                  ,'rates.servicio AS rt_servicio','cranes.servicio AS cr_servicio')
                         ->join('entries','owenrs.entries_id','entries.id')
                         ->join('rates','entries.rate_id','rates.id')
                         ->join('cranes','entries.crane_id','cranes.id')
                         ->where('entries.id',$request->entries_id)
                         ->get();

        // $view = \View::make('works.invoces.pdf', compact('valores','consulta','actuales'))->render();
        // $pdf = \App::make('dompdf.wrapper');
        // $pdf->loadHTML($view);




        $invoces = Invoce::where('entries_id',$id)
                          ->where('estado','Generado')
                          ->where('estado','!=','Anulado')
                          ->get();


        $cajero = User::where('email',Auth::user()->email)->get();



          foreach ($cajero as $cajas) {

          $cajeros= $cajas->caja;
          ($elaborado= $cajas->name);


        }

        $transaccion=DB::table('transaccion')->where([
                                                  ['id_entry',$id],
                                                  ['estado_transaccion','pagado']
                                                ])->get();


        $pdf = PDF::loadView('works.invoces.pdf', compact('valores','consulta','actuales','invoces','numPlaca','cajeros','elaborado','transaccion'))->save( $nombre_pdf );





        return redirect()->route('invoces.index')->with('success', 'Se ha generado la factura correctamente');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $invoce = new Invoce;
      $this->authorize('view', $invoce);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $invoce = new Invoce;
      $this->authorize('update', $invoce);

        $invoce = Invoce::find($id);
        return view('works.invoces.edit', compact('invoce'));
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
      $invoce = new Invoce;
      $this->authorize('update', $invoce);
        $invoces = Invoce::find($id);
        $estados = $request['estado'];

        $invoces->update([
            'estado' => $estados
        ]);


        return redirect()->route('invoces.index')->with('success', 'Se ha cambiado el estado de la factura correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $invoce = new Invoce;
      $this->authorize('create', $invoce);
    }
}
