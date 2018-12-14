<?php

namespace App\Http\Controllers\Work;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Salida;
use App\Entry;
use App\Owenr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use App\Infraccion;
use PDF;
use App\Invoce;
use Illuminate\Support\Facades\DB;

class SalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $salida = new Salida;

          $this->authorize('view',$salida );

          $salidas = Salida::select('salidas.created_at','entries.placa','salidas.id','salidas.pdf',
                                    'salidas.verificar','owenrs.nombre','owenrs.documento')
                          ->join('entries','salidas.entries_id','entries.id')
                           ->join('owenrs','salidas.owenrs_id','owenrs.id')
                           ->get();
          return view('works.salidas.index', compact('salidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // $owenrs = Owenr::join('entries','owenrs.entries_id','entries.id')
      //                ->get();
        $salida = new Salida;
        $this->authorize('create', $salida );

          $entries = Invoce::select('entries.id','entries.placa','entries.infraccion_id')
                          ->join('entries','invoces.entries_id','entries.id')
                           ->where('invoces.estado','!=','Anulado')
                           ->whereNotIn('entries.id', function($query){
                             $query->select(DB::raw('salidas.entries_id'))
                             ->from('salidas');
                           })
                           ->get();


      return view('works.salidas.create')->with('entries', $entries);
    }


      public function salidas(){


        $entries_id = Input::get('entries_id');
        $entries = Owenr::where('entries_id',$entries_id)
                         ->get();

        return response()->json($entries);

      }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $salida = new Salida;
      $this->authorize('create', $salida );
      //dd($request);

      $data = $request->validate([
          'entries_id'=>'required|unique:salidas',
          'owenrs_id'=>'required',
          'pdf'      => 'required',
          'observacion'=>'required',
          'verificar.*' => 'in:Inv_ok,Comparendo_ok,cedula_ok,pago_ok,orden_ok',
      ]);
      //dd($data);  

      $actuales =  Carbon::now();
       $nombre_pdf = 'ordenes/orden-'.$actuales.'.pdf';
       $data['pdf'] = $nombre_pdf;
       //dd($request->verificar);
       $dato = $request->verificar;

       $data['verificar'] = implode(', ', $dato);

       $salidas = Salida::create($data);

       $salidas = Salida::select('salidas.id','salidas.created_at as final','salidas.observacion','owenrs.nombre','owenrs.documento','owenrs.tipo_propi',
                                 'entries.created_at as inicial','entries.placa','entries.color','entries.marca','entries.tipo',
                                  'entries.comparendo','infraccions.codigo','entries.servicio')
                        ->join('entries','salidas.entries_id','entries.id')
                        ->join('owenrs','salidas.owenrs_id','owenrs.id')
                        ->join('infraccions','entries.infraccion_id','infraccions.id')
                        ->where('salidas.entries_id',$request->entries_id)
                        ->get();

        $sali = Salida::select('entries.created_at','salidas.observacion')
                        ->join('entries','salidas.entries_id','entries.id')
                         ->where('salidas.entries_id',$request->entries_id)
                         ->get();

          foreach ($sali as $salis) {
            $fecha =$salis->created_at;
            $coment =$salis->observacion;

          }



       $pdf = PDF::loadView('works.salidas.salidaPDF', compact('salidas','actuales','fecha','coment'))->save( $nombre_pdf );



       return redirect()->route('salidas.index')->with('success', 'Se ha creado correctamente la salida');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $this->authorize('view', $salida);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $salida = new Salida;
      $this->authorize('update', $salida );


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
      $salida = new Salida;
      $this->authorize('update', $salida );


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $salida = new Salida;
      $this->authorize('create', $salida );

    }
}
