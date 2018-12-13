<?php

namespace App\Http\Controllers\Work;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rate;
use App\Clase_vehiculo;

class RateController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $rate = new Rate;
      $this->authorize('view', $rate);
      $rates = rate::all();
      return view('works.rates.index',compact('rates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rate = new Rate;

        $this->authorize('create', $rate);

        $rate = rate::all();
        $tipos = Clase_vehiculo::orderBy('tipo','asc')->get();
        return view('.works.rates.create',compact('rate','tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->authorize('create', $rate, new Rate);

            $data = $request->validate([
              'servicio' => 'required|string|max:500',
              'valor'    => 'required|integer|min:0',
              'anio'    => 'required|numeric|min:2018',
              'tipo_vehiculo' => 'required'
            ]);
            $data['tipo_vehiculo'] = implode(', ',$data['tipo_vehiculo']);
            $rates = Rate::create($data);

            return redirect()->route('rates.index')->with('success','Servicio fue creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', $rate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Rate $rate)
    {
      $this->authorize('update', $rate);

        // dd($rate);
        $tipos = Clase_vehiculo::orderBy('tipo','asc')->get();
        $datos = explode(', ',$rate->tipo_vehiculo);
        return view('works.rates.edit',compact('rate','tipos','datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rate $rate)
    {

      $this->authorize('update', $rate);


              $data = $request->validate([
                'servicio' => 'required|string|max:500',
                'valor'    => 'required|integer|min:0',
                'anio'    => 'required|numeric',
                'tipo_vehiculo'    => 'required'

              ]);

              $data['tipo_vehiculo'] = implode(', ',$data['tipo_vehiculo']);
              $rate->update($data);


            return redirect()->route('rates.index')->with('success','Servicio fue Actulizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rate $rate)
    {
      $this->authorize('delete', $rate, new Rate);

          $rate->delete();

          return redirect()->route('rates.index');
    }
}
