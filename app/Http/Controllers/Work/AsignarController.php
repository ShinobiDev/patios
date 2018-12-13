<?php

namespace App\Http\Controllers\Work;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Asignar;
use App\Yard;
use App\Entry;
use App\section;
use App\Rango;
use App\Historial;
use Illuminate\Support\Facades\DB;

class AsignarController extends Controller
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
      $data = $request->validate([
        'nombre' => 'required',
        'seccion' =>'required',
        'rango' =>'required',
        'entries_id' =>'required'
      ]);

      $asignars = Asignar::create($data);

        $historia = Historial::create([
          'nombre' => $request['nombre'],
          'seccion' =>$request['seccion'],
          'rango' =>$request['rango'],
          'entries_id' =>$request['entries_id'],
          'elaborado'  => \Auth::user()->name

        ]);



         return back()->with('success','Se ha asignado ubicación al vehículo');
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
    public function edit($asignars)
    {




       $yards = Yard::all();
       $entry = Entry::all();
       return view('works.asignars.edit')->with('asignars', $asignars)->with('yards', $yards);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asignar $asignar)
    {
      // dd($request);
      $data = $request->validate([
        'nombre' => 'required',
        'seccion' =>'required',
        'rango' =>'required',
        'entries_id' =>'required'
      ]);

        $asignar->update($data);

        $historia = Historial::create([
          'nombre' => $request['nombre'],
          'seccion' =>$request['seccion'],
          'rango' =>$request['rango'],
          'entries_id' =>$request['entries_id'],
          'elaborado'  => \Auth::user()->name

        ]);

        return redirect()->route('entries.show',$request['entries_id'])->with('success', 'Se ha realizado la reubicación correctamente');

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
