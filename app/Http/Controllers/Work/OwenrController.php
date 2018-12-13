<?php

namespace App\Http\Controllers\Work;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Owenr;
use App\Entry;

class OwenrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owenr = new Owenr;
        $this->authorize('view', $owenr );

        $owenrs = Owenr::all();
        return view('works.owenrs.index')->with('owenrs', $owenrs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owenr = new Owenr;
        $this->authorize('create', $owenr);

      $entries = Entry::all();
      return view('works.owenrs.create', compact('entries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $owenr = new Owenr;
       $this->authorize('create', $owenr);

        $data = $request->validate([
            'nombre'=>'required|min:4|max:20',
            'tipo_propi' => 'required',
            'documento'=>'required|unique:owenrs|min:5|max:20',
            // 'celular'=>'required',
             'mail'=>'required|unique:owenrs',
            // 'direccion'=>'required',
            'entries_id'=>'required',
        ]);

          $data['celular'] = $request->celular;
          $data['mail'] = $request->mail;
          $data['direccion'] = $request->celular;

        $owenrs = owenr::create($data);

        return back()->with('success','Se ha creado el propietario correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $owenr = new Owenr;
        $this->authorize('view', $owenr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Owenr $owenr)

    {
      $this->authorize('update', $owenr);

        return view('works.owenrs.edit',compact('owenr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owenr $owenr)
    {


      $this->authorize('update', $owenr, new Owenr);


      $data = $request->validate([
          'nombre'=>'required|min:4|max:20',
          'documento'=>'required|min:5|max:20',
          'celular'=>'required|min:7|max:15',
          'mail'=>'required|email',
          'direccion'=>'required|min:8|max:20',
      ]);

      $owenr->update($data);

      return redirect()->route('owenrs.index')->with('success', 'El propietario de actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $owenr = new Owenr;
      $this->authorize('delete', $owenr);

      $owenr->delete($id);
      return redirect()->route('owenrs.index')->with('success', 'El registro fue borrado correctamente');
    }
}
