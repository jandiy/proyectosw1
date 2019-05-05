<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laboratorio;
use App\Pais;
use DB;
class LaboratorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laboratorios = DB::table('laboratorios')            
            ->join('paises','laboratorios.pais_id','=','paises.id')
            ->select('laboratorios.id','laboratorios.nombre','laboratorios.descripcion','paises.nombre as paisnombre')
            ->get();        
                                
         return view('laboratorios.index',compact('laboratorios'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises=Pais::all();
        return view('laboratorios.create',compact('paises'));
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
            'descripcion' => 'required',
            'pais_id' => 'required',            
        ]);

        $laboratorio = new Laboratorio();
        $laboratorio->nombre=$request->input('nombre');
        $laboratorio->descripcion=$request->input('descripcion');
        $laboratorio->pais_id=$request->input('pais_id');        
        $laboratorio->save();

        // self::registrarEnBitacora("Se registro un nuevo laboratorio");
        return redirect()->route('laboratorios.index')
            ->with('success','Laboratorio Registrado Exitosamente'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$laboratorio = Laboratorio::find($id);
        
        $laboratorio = DB::table('laboratorios')            
        ->join('paises','laboratorios.pais_id','=','paises.id')
        ->select('laboratorios.id','laboratorios.nombre','laboratorios.descripcion','paises.nombre as paisnombre')
        ->where('laboratorios.id',$id)
        ->get();
        $laboratorio=$laboratorio[0];         
        return view('laboratorios.show',compact('laboratorio'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        $laboratorio=Laboratorio::find($id);
        $paises=Pais::all();        
        
        return view('laboratorios.edit',compact('laboratorio','paises'));
   
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
            'descripcion' => 'required',
            'pais_id' => 'required',            
        ]);        
        
        $laboratorio = Laboratorio::find($id);
        $laboratorio->nombre=$request->input('nombre');
        $laboratorio->descripcion=$request->input('descripcion');
        $laboratorio->pais_id=$request->input('pais_id');        
        $laboratorio->save();

        return redirect()->route('laboratorios.index')
            ->with('success','Laboratorio Actualizado Exitosamente'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Laboratorio::find($id)->delete();
        return redirect()->route('laboratorios.index')
            ->with('success','Laboratorio Borrado Exitosamente');
    
    }
}
