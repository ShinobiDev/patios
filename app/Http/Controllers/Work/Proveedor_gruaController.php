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
use App\Proveedores_gruas;
use Illuminate\Support\Facades\DB;

class Proveedor_gruaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $proveedores = Proveedores_gruas::all();

      $proveedores_gruas = new Proveedores_gruas;
      $this->authorize('view', $proveedores_gruas);

      return view('works.proveedores.index',compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $proveedores_gruas = new Proveedores_gruas;
      $this->authorize('create', $proveedores_gruas);

        return view('works.proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $proveedores_gruas = new Proveedores_gruas;
      $this->authorize('create', $proveedores_gruas);

      $data = $request->validate([
        'proveedor' => 'required',
        'placa' =>'required',
        'descripcion' =>'required',
      ]);
      // dd($data);

      $proveedores = Proveedores_gruas::create($data);

        return redirect()->route('proveedores.index')->with('success', 'Se ha creado correctamente el proveedor');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $proveedores_gruas = new Proveedores_gruas;
      $this->authorize('view', $proveedores_gruas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $proveedores_gruas = new Proveedores_gruas;
      $this->authorize('update', $proveedores_gruas);

       $proveedores = Proveedores_gruas::find($id);
       // dd($proveedores);
       return view('works.proveedores.edit')->with('proveedores', $proveedores);
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

      $proveedores_gruas = new Proveedores_gruas;
      $this->authorize('view', $proveedores_gruas);

       // dd($id);
       $proveedores = Proveedores_gruas::find($id);
      $data = $request->validate([
        'proveedor' => 'required',
        'placa' =>'required',
        'descripcion' =>'required',
      ]);

        $proveedores->update($data);



        return redirect()->route('proveedores.index')->with('success', 'Se ha realizado la reubicación correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $proveedores_gruas = new Proveedores_gruas;
      $this->authorize('view', $proveedores_gruas);

      $proveedores = Proveedores_gruas::find($id);

      $proveedores->delete();

      return redirect()->route('proveedores.index');
    }
}
