<?php

namespace App\Http\Controllers\Work;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Servicio;
use App\Crane;
use App\Rate;
use Illuminate\Support\Facades\DB;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios = DB::table('servicios')
                      ->select('servicios.anio','servicios.id','cranes.servicio as crane','rates.servicio as rate','servicios.val_grua','servicios.val_parqueadero')
                      ->join('rates','servicios.rate_id','rates.id')
                      ->join('cranes','servicios.crane_id','cranes.id')
                      ->get();

        return view('works.servicios.index',compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $cranes = Crane::all();
      $rates =  Rate::all();
        return view('works.servicios.create')->with('cranes', $cranes)->with('rates', $rates);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $data = $request->validate([
          'anio' => 'required',
          'crane_id' =>'required',
          'rate_id' =>'required',
          'val_grua' =>'required',
          'val_parqueadero' =>'required'
        ]);

        $servicios = Servicio::create($data);
         return redirect()->route('servicios.index')->with('success','La tarifa se ha creado correctamente');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicio $servicio)
    {
      // dd($servicios['id']);
      $cranes = Crane::all();
      $rates =  Rate::all();

        return view('works.servicios.edit',compact('servicio'))->with('cranes', $cranes)->with('rates', $rates);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servicio $servicio)
    {
        $data = $request->validate([
          'anio' => 'required',
          'crane_id' =>'required',
          'rate_id' =>'required',
          'val_grua' =>'required',
          'val_parqueadero' =>'required'
        ]);

      $servicio->update($data);
       return redirect()->route('servicios.index')->with('success','La Tarifa se  actualizado correctamente');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicio $servicio)
    {
        $servicio->delete();

        return redirect()->route('servicios.index')->with('success','Tarefa se elimino correctamente');
    }
}
