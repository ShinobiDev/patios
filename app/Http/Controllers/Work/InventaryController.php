<?php

namespace App\Http\Controllers\work;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Inventary;
use App\Entry;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
class InventaryController extends Controller
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
    public function inventario(Request $request, Entry $entry)
    {


      $arr = $request->except('_token');

      foreach ($arr as $key => $value) {
        
            $newInventary = new Inventary();
            if (! is_array( $value )) {
              ($newValue = $value);

            } else {
              $newValue = json_encode($value);
            }

            $newInventary->entries_id = $entry->id;
            $newInventary->title = $key;
            $newInventary->opcion = $newValue;



            $newInventary->save();

            $inventaryArray[] = $newInventary;    
        
        
      };
        return redirect()->back()->with('success', 'Se agrego el inventario correctamente');

    }

    public function editarinventario(Request $request, Entry $entry)
    {


      $arr = $request->except('_token');
      //dd([$arr,$entry]);
      foreach ($arr as $key => $value) {
        //dd([$key,$value]);
            Inventary::where([['entries_id',$entry->id],['title',$key]])->update(['opcion'=>$value]);
       }
        return redirect()->back()->with('success', 'Se agrego el inventario correctamente');
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
    public function edit($id)
    {
        
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
