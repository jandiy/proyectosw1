<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provedor;
use DB;
class ProvedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $provedores = DB::table('provedores')                
            ->select('provedores.id','provedores.nombre','provedores.telefono','provedores.email','provedores.compania')
            ->get();            
        return view('provedores.index',compact('provedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('provedores.create');
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
            'telefono' => 'required',                      
            'email' => 'required',                      
            'compania' => 'required',                      
        ]);

        $provedor = new Provedor();
        $provedor->nombre=$request->input('nombre');
        $provedor->telefono=$request->input('telefono');   
        $provedor->email=$request->input('email');   
        $provedor->compania=$request->input('compania');              
        $provedor->save();

        
        return redirect()->route('provedores.index')
            ->with('success','Provedor Registrado Exitosamente'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provedor = Provedor::find($id);
        return view('provedores.show',compact('provedor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provedor = Provedor::find($id);
         return view('provedores.edit',compact('provedor'));
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
            'telefono' => 'required',                      
            'email' => 'required',                      
            'compania' => 'required',                      
        ]);

        $provedor = Provedor::find($id);
        $provedor->nombre=$request->input('nombre');
        $provedor->telefono=$request->input('telefono');   
        $provedor->email=$request->input('email');   
        $provedor->compania=$request->input('compania');              
        $provedor->save();

        return redirect()->route('provedores.index')
            ->with('success','Provedor Actualizada Exitosamente');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('provedores')->where('id',$id)->delete();
        return redirect()->route('provedores.index')
            ->with('success','Provedor Borrado Exitosamente');
    }
}
