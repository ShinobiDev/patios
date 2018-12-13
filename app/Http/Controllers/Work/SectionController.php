<?php

namespace App\Http\Controllers\Work;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Section;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $section = new Section;
      $this->authorize('view', $section);

       $sections = Section::all();

       return view('works.sections.index',compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $section = new Section;
      $this->authorize('create', $section);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $section = new Section;
      $this->authorize('create', $section);


        // $data['rango'] = range('1',$request['rango']);
      // dd($data);
        $data = $request->validate([
          'seccion' => 'required',
          'rango'   => 'required|min:5|numeric|max:999',
          'yard_id' => 'required',
         ]);


         $section = Section::create($data);

         $valor = $section->rango;
         $id_seccion = $section->id;


        for($i=1;$i<=$valor;$i++){
            DB::table('rangos')->insert([
                'rango' => $i,
                'seccion_id' =>$id_seccion
            ]);

          }

        return back()->with('success','Se a asignado la sección correctamente al patio');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

      $section = new Section;
      $this->authorize('view', $section);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {

      $this->authorize('update', $section);
       return view('works.sections.edit',compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {


      $this->authorize('update', $section);
            $data = $request->validate([
              'seccion' => 'required',
              'rango'   => 'required|min:5|numeric|max:999',
              'yard_id' => 'required',
             ]);

              $section->update($data);

            return redirect()->route('sections.index')->with('success','Se a actulizado la sección correctamente al patio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $section = new Section;
      $this->authorize('view', $section);
    }
}
