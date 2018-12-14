<?php

namespace App\Http\Controllers\work;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Http\Requests\EntryRequest;
use App\Http\Requests\EntryUpdateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
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
use App\Infraccion;
use App\Marca;
use App\Clase_vehiculo;
use App\Colore;
use App\Proveedores_gruas;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $entry = new Entry;
      $this->authorize('view', $entry);
       $actuales =  Carbon::now();
       $entries = Entry::all();

       // $pendiente = DB::select('comparendo','motor','chasis')->get();


       return view('works.entries.index')->with('entries', $entries)->with('actuales', $actuales);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $entry = new Entry;

      $this->authorize('create', $entry);

       $tipos = Clase_vehiculo::orderBy('tipo','asc')->get();
       $infraccions =Infraccion::all();
       $proveedores = Proveedores_gruas::all();
       $marcas = Marca::all();
       $rates = Rate::all();
       $cranes = Crane::all();
       $colores = Colore::all();
        return view('works.entries.create')->with('cranes', $cranes)->with('rates', $rates)
                                           ->with('infraccions', $infraccions)->with('marcas', $marcas)
                                           ->with('tipos', $tipos)->with('colores', $colores)->with('proveedores', $proveedores);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EntryRequest $request)
    {

      //dd($request['placa']);
      $entry = new Entry ;
      $this->authorize('create', $entry);

      if ($request['infraccion_id']=='') {
        $request['infraccion_id'] = 0;

        //lineasagregadas por edgar

        /*$en=Entry::where("placa",$request['placa'])->get();
        if(count($en)>0){
            $dd=$request->all();
            //dd($dd);
            unset($dd["_token"]);
            unset($dd["id"]);
            //dd($dd);
            Entry::where("id",$en[0]->id)->update();
        }else{
          $entries = Entry::create($request->validated());
        }*/


        //




        $entries = Entry::create($request->validated());



        return redirect()->route('entries.show',$entries->id)->with('success', 'Se ha ingresado correctamente el vehículo ');

      }

        $entries = Entry::create($request->validated());



        return redirect()->route('entries.show',$entries->id)->with('success', 'Se ha ingresado correctamente el vehículo ');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Entry $entry)
    {

        $this->authorize('view', $entry);

        $dato_rate =0;
        $inventaries = Inventary::join('entries','inventaries.entries_id','entries.id')
                                ->where('inventaries.entries_id',$entry->id)
                                ->get();


        $entry_id = $entry['id'];
        $yards = Yard::all();
        $asignars = DB::table('asignars')
                      ->select('yards.nombre','sections.seccion','rangos.rango','asignars.id')
                      ->join('entries','asignars.entries_id','entries.id')
                      ->join('yards','asignars.nombre','yards.id')
                      ->join('sections','asignars.seccion','sections.id')
                      ->join('rangos','asignars.rango','rangos.id')
                      ->where('asignars.entries_id',$entry_id)
                      ->get();

       $owenrs = DB::table('owenrs')
                   ->join('entries','owenrs.entries_id','entries.id')
                   ->where('owenrs.entries_id',$entry_id)
                   ->get();

        $list_owenrs = DB::table('owenrs')
                       ->select('documento',DB::raw('count(id)')) 
                       ->groupBy('owenrs.documento') 
                       ->get();                   

        $rate = $entry['rate_id'];

        $datos = Rate::select('servicio')->where('id',$rate);

        foreach ($datos as $dato) {
          $dato_rate = $dato->servicio;
           // dd($dato_rate);
        }



        return view('works.entries.show',compact('entry'))->with('yards', $yards)->with('asignars', $asignars)
                                                          ->with('owenrs', $owenrs)->with('inventaries', $inventaries)
                                                          ->with('dato_rate', $dato_rate)
                                                          ->with('list_own',$list_owenrs);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Entry $entry)
    {


      $tipos = Clase_vehiculo::orderBy('tipo','asc')->get();
      $infraccions =Infraccion::all();
      $proveedores = Proveedores_gruas::all();
      $marcas = Marca::all();
      $rates = Rate::all();
      $cranes = Crane::all();
      $colores = Colore::all();




      $this->authorize('update', $entry);

      $tipos = Clase_vehiculo::orderBy('tipo','asc')->get();
      $marcas = Marca::all();
      $infraccions =Infraccion::all();
      $rates = Rate::all();
      $cranes = Crane::all();
      return view('works.entries.edit',compact('entry'))
                                      ->with('cranes', $cranes)
                                      ->with('rates', $rates)
                                      ->with('infraccions', $infraccions)
                                      ->with('tipos', $tipos)
                                      ->with('marcas', $marcas)->with('marcas', $marcas)
                                        ->with('tipos', $tipos)->with('colores', $colores)->with('proveedores', $proveedores);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function EditPendientes(Entry $entry){


         return view('works.entries.pendiente',compact('entry'));
     }


    public function pendientes(Request $request, Entry $entry){

        $entry->update($request->all());
        return redirect()->route('entries.index')->with('success', 'El ingreso se ha actualizado correctamente');
    }



    public function update(Request $request, Entry $entry)
    {
        $this->authorize('update', $entry);

          $entry->update($request->all());
          // dd($entry);
          return redirect()->route('entries.show',$entry->id)->with('success', 'El ingreso se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $this->authorize('delete', $entry, new Entry);
    }
}
