<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Marca;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas = DB::table('marca')                
                ->select('id','nombre')
                ->get();
        return view('marcas.index',compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('marcas.create');
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

        $categoria = new Marca();
        $categoria->nombre  = $request->input('nombre');
        $categoria->save();

        // self::registrarEnBitacora("Se registro una nueva categoria");

        return redirect()->route('marcas.index')
            ->with('success','Marca Creada Exitosamente');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $marca = Marca::find($id);
        return view('marcas.show',compact('marca'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marca = Marca::find($id);
         return view('marcas.edit',compact('marca'));
   
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

        $categoria = Marca::find($id);
        $categoria->nombre  = $request->input('nombre');
        $categoria->save();

        return redirect()->route('marcas.index')
            ->with('success','Marca Actualizada Exitosamente');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('marca')->where('id',$id)->delete();
        return redirect()->route('marcas.index')
            ->with('success','Marca Borrada Exitosamente');
   
    }
}
