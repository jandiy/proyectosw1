<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pais;
use DB;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paises = DB::table('paises')                
            ->select('paises.id','paises.nombre')
            ->get();    
        return view('paises.index',compact('paises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paises.create');
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
            'nombre' => 'required',
        ]);

        $pais = new Pais();
        $pais->nombre  = $request->input('nombre');        
        $pais->save();

        return redirect()->route('paises.index')
            ->with('success','Pais Registrado Exitosamente'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pais = Pais::find($id);
        return view('paises.show',compact('pais'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pais = Pais::find($id);
         return view('paises.edit',compact('pais'));
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
            'nombre' => 'required',            
        ]);

        $pais = Pais::find($id);
        $pais->nombre  = $request->input('nombre');        
        $pais->save();

        return redirect()->route('paises.index')
            ->with('success','Pais Actualizada Exitosamente');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('paises')->where('id',$id)->delete();
        return redirect()->route('paises.index')
            ->with('success','Registro de Pais Borrada Exitosamente');
    }
}
