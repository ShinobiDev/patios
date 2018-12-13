<?php

namespace App\Http\Controllers\work;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Yard;
use Illuminate\Support\Facades\Input;
use App\Section;
use App\Asignar;

class YardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $yard = new Yard;
      $this->authorize('view', $yard);


      $yards = Yard::all();
       return view('works.yards.index',compact('yards'));
    }


    public function seccion()
  {
      // $select     =  $request->get('select');
      // $value      =  $request->get('value');
      // $dependent  =  $request->get('dependent');
      //
      // $data = Yard::join('sections', 'yard.id', '=', 'sections.yard_id')
      //             ->where($select, $value)
      //             ->groupBy($dependent)
      //             ->get();
      // $output = '<option value="">Seleccione'.ucfirst($dependent).'</option>';
      //
      // foreach ($data as $row)
      //   {
      //
      //     $output .='<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
      //
      //   }
      //
      //   echo $output;

      $yard_id = Input::get('yard_id');
      $seccion = Section::where('yard_id','=',$yard_id)->get();
      return response()->json($seccion);
  }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $yard = new Yard;
      $this->authorize('create', $yard);
       return view('works.yards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $yard = new Yard;
      $this->authorize('create', $yard);

        $data = $request->validate([
          'nombre' => 'required',
          'direccion' =>'required|max:100',
          'telefono' =>'required'
        ]);

        $yards = Yard::create($data);

        return redirect()->route('yards.index')->with('success','Patio creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Yard $yard)
    {

        $this->authorize('view', $yard);
        return view('works.yards.show')->with('yard',$yard);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Yard $yard)
    {

      $this->authorize('update', $yard);
        return view('works.yards.edit',compact('yard'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Yard $yard)
    {
          $yard = new Yard;
          $this->authorize('update', $yard);

          $data = $request->validate([
            'nombre' => 'required',
            'direccion' =>'required|max:100',
            'telefono' =>'required'
          ]);

            $yard->update($data);

          return redirect()->route('yards.index')->with('success','Patio Actulizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Yard $yard)
    {
      
      $this->authorize('delete', $yard);

      $yard->delete();

      return redirect()->route('yards.index');
    }
}
