<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Accionterapeutica;
use DB;
class AccionterapeuticaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acciones = DB::table('accionesterapeuticas')                
            ->select('accionesterapeuticas.id','accionesterapeuticas.nombre')
            ->get();    
        return view('acciones.index',compact('acciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('acciones.create');
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

        $accion = new Accionterapeutica();
        $accion->nombre  = $request->input('nombre');        
        $accion->save();
        
        // self::registrarEnBitacora("Se registro una nueva accion terapeutica");
        return redirect()->route('acciones.index')
            ->with('success','Accion terapeutica Registrada Exitosamente'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $accion = Accionterapeutica::find($id);
        return view('acciones.show',compact('accion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $accion = Accionterapeutica::find($id);
         return view('acciones.edit',compact('accion'));
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

        $accion = Accionterapeutica::find($id);
        $accion->nombre  = $request->input('nombre');        
        $accion->save();

        return redirect()->route('acciones.index')
            ->with('success','Accion terapeutica Actualizada Exitosamente');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('accionesterapeuticas')->where('id',$id)->delete();
        return redirect()->route('acciones.index')
            ->with('success','Accion terapeutica Borrada Exitosamente');
    }
}
