<?php

namespace App\Http\Controllers\Work;

use App\Crane;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Clase_vehiculo;
use App\Rate;
use Illuminate\Support\Facades\Input;
// use Illuminate\Routing\Redirector;

class CraneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $crane = new Crane;
      $this->authorize('view', $crane);
      
        $cranes = Crane::all();
        return view('works.cranes.index',compact('cranes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $crane = new Crane;
      $this->authorize('create', $crane);

        $tipos = Clase_vehiculo::all();



        return view('.works.cranes.create')->with('tipos', $tipos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //$this->authorize('create', $crane, new Crane);
      $this->authorize('create', new Crane);

       $data = $request->validate([
         'servicio' => 'required|string|max:255',
         'anio'    => 'required|numeric',
         'valor'    => 'required|integer|min:0',
         'tipo_vehiculo'    => 'required'

       ]);
       $data['tipo_vehiculo'] = implode(', ',$data['tipo_vehiculo']);
       $cranes = Crane::create($data);

       return redirect()->route('cranes.index')->with('success','Servicio fue creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $crane = new Crane;
      $this->authorize('create', $crane);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Crane $crane)
    {

      $this->authorize('update', $crane, new Crane );

        $tipos = Clase_vehiculo::all();
        //dd($tipos);
        $datos = explode(', ',$crane->tipo_vehiculo);

        return view('works.cranes.edit',compact('crane'))->with('tipos', $tipos)->with('datos', $datos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crane $crane)
    {

        // dd($request->tipo_vehiculo);
        $this->authorize('update', $crane, new Crane);


            $data = $request->validate([
              'servicio' => 'required|string|max:255',
              'valor'    => 'required|integer|min:0',
              'anio'    => 'required|numeric',
              'tipo_vehiculo' => 'required'
            ]);


            $data['tipo_vehiculo'] = implode(', ',$data['tipo_vehiculo']);

            $crane->update($data);


          return redirect()->route('cranes.index')->with('success','Servicio fue Actulizado correctamente');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crane $crane)
    {
      $this->authorize('delete', $crane, new crane);

        $crane->delete();

        return redirect()->route('cranes.index');
    }
}
