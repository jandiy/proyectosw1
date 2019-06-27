<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Medida;

class MedidaController extends Controller
{
     public function index()
    {
        $medidas = DB::table('medida')                
                ->select('id','nombre','abreviatura')
                ->get();
        return view('medidas.index',compact('medidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

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
            'abreviatura'=> 'required',                        
        ]);

        $categoria = new Medida();
        $categoria->nombre  = $request->input('nombre');
        $categoria->abreviatura = $request->input('abreviatura');
        $categoria->save();

        // self::registrarEnBitacora("Se registro una nueva categoria");

        return redirect()->route('medidas.index')
            ->with('success','Medida Creada Exitosamente');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

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
            'abreviatura'=> 'required',                        
        ]);

        $categoria = Medida::find($id);
        $categoria->nombre  = $request->input('nombre');
        $categoria->abreviatura = $request->input('abreviatura');
        $categoria->save();

        return redirect()->route('medidas.index')
            ->with('success','Medida Actualizada Exitosamente');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('medida')->where('id',$id)->delete();
        return redirect()->route('medidas.index')
            ->with('success','Medida Borrada Exitosamente');
   
    }
}
