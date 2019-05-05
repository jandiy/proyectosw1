<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posicion;
use DB;
class PosicionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $posiciones = DB::table('posiciones')                
            ->select('posiciones.id','posiciones.nroestante','posiciones.nrofila')
            ->get();            
        return view('posiciones.index',compact('posiciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posiciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nroestante' => 'required',
            'nrofila' => 'required',                      
        ]);

        $posicion = new Posicion();
        $posicion->nroestante=$request->input('nroestante');
        $posicion->nrofila=$request->input('nrofila');              
        $posicion->save();

        return redirect()->route('posiciones.index')
            ->with('success','Posicion Registrado Exitosamente'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posicion = Posicion::find($id);
        return view('posiciones.show',compact('posicion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posicion = Posicion::find($id);
         return view('posiciones.edit',compact('posicion'));
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

        $this->validate($request, [
            'nroestante' => 'required',
            'nrofila' => 'required',            
        ]);

        $posicion = Posicion::find($id);
        $posicion->nroestante  = $request->input('nroestante');
        $posicion->nrofila  = $request->input('nrofila');        
        $posicion->save();

        return redirect()->route('posiciones.index')
            ->with('success','Posicion Actualizada Exitosamente');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('posiciones')->where('id',$id)->delete();
        return redirect()->route('posiciones.index')
            ->with('success','Posicion Borrado Exitosamente');
    }
}