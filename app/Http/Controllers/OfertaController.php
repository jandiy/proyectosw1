<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Oferta;
use DB;
class OfertaController extends Controller
{
    public function index()
    {
    	$productos= DB::select("select p.codigo, p.nombre, m.nombre as marca
            from producto as p, marca as m
            where p.marca_id=m.id");
        $ofertas = DB::select("select o.id, p.imagen, p.nombre, m.nombre as marca, o.fecha_inicio, o.fecha_fin, o.interes
            from producto as p, marca as m, oferta as o
            where p.marca_id=m.id and o.producto_id=p.codigo");
        return view('ofertas.index',compact('ofertas','productos'));
    }
    public function create()
    {
        $productos= DB::select("select p.codigo, p.nombre, m.nombre as marca
            from producto as p, marca as m
            where p.marca_id=m.id");
        return view('ofertas.create',compact('productos'));
    }
    public function edit($id)
    {
        $productos= DB::select("select p.codigo, p.nombre, m.nombre as marca
            from producto as p, marca as m
            where p.marca_id=m.id");
        $oferta=Oferta::find($id);
        return view('ofertas.edit',compact('oferta','productos'));
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
            'fecha_inicio' => 'required',
            'fecha_fin'=> 'required',
            'interes'=> 'required|numeric',
            'producto'=>'required'                        
        ]);

        $categoria = new Oferta();
        $categoria->fecha_inicio  = $request->input('fecha_inicio');
        $categoria->fecha_fin = $request->input('fecha_fin');
         $categoria->interes = $request->input('interes');
        $categoria->producto_id = $request->input('producto');
        $categoria->save();

        // self::registrarEnBitacora("Se registro una nueva categoria");

        return redirect()->route('ofertas.index')
            ->with('success','Oferta Creada Exitosamente');    
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
            'fecha_inicio' => 'required',
            'fecha_fin'=> 'required',
            'interes'=> 'required|numeric', 
            'producto'=>'required'                       
        ]);

        $categoria = Oferta::find($id);
        $categoria->fecha_inicio  = $request->input('fecha_inicio');
        $categoria->fecha_fin = $request->input('fecha_fin');
        $categoria->producto_id = $request->input('producto');
         $categoria->interes = $request->input('interes');
        $categoria->save();

        return redirect()->route('ofertas.index')
            ->with('success','Oferta Actualizada Exitosamente');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('oferta')->where('id',$id)->delete();
        return redirect()->route('ofertas.index')
            ->with('success','Oferta Borrada Exitosamente');
   
    }
}
