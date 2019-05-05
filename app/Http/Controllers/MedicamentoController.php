<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medicamento;
use App\Laboratorio;
use App\Pais;
use App\Lote;
use App\Posicion;
use App\Categoria;
use App\Accionterapeutica;
use DB;
class MedicamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicamentos = DB::table('medicamentos')            
            ->join('laboratorios','medicamentos.laboratorio_id','=','laboratorios.id')
            ->join('categorias','medicamentos.categoria_id','=','categorias.id')
            ->join('accionesterapeuticas','medicamentos.accionesterapeuticas_id','=','accionesterapeuticas.id')
            ->join('lotes','medicamentos.lote_id','=','lotes.id')
            ->join('posiciones','medicamentos.posicion_id','=','posiciones.id')
            
            ->select('medicamentos.id','medicamentos.nombre','medicamentos.descripcion',
            'medicamentos.pventa','medicamentos.stock','laboratorios.nombre as laboratorio_nombre',
            'accionesterapeuticas.nombre as accion_nombre','lotes.codigo as lote_codigo',
            'lotes.fechavencimiento as lote_vencimiento','posiciones.nroestante as posicion_estante',
            'posiciones.nrofila as posicion_fila','categorias.nombre as categoria_nombre'
            )->get();               
                                    
         return view('medicamentos.index',compact('medicamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $laboratorios=Laboratorio::all();
        $categorias=Categoria::all();
        $acciones=Accionterapeutica::all();
        $lotes=Lote::all();
        $posiciones=Posicion::all();

        return view('medicamentos.create',compact('laboratorios','categorias','acciones','lotes','posiciones'));
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
            'pventa' => 'required',         
            'stock' => 'required', 
            'laboratorio_nombre' => 'required',                          
            'accion_nombre' => 'required',            
            'lote_codigo' => 'required',                        
            'posicion_nroestante' => 'required',                    
            'categoria_nombre' => 'required',            
        ]);
    
        $medicamento = new Medicamento();
        $medicamento->nombre=$request->input('nombre');
        $medicamento->descripcion=$request->input('descripcion');
        $medicamento->pventa=$request->input('pventa');
        $medicamento->stock=$request->input('stock');
        $medicamento->laboratorio_id=$request->input('laboratorio_nombre');
        $medicamento->accionesterapeuticas_id=$request->input('accion_nombre');
        $medicamento->lote_id=$request->input('lote_codigo');        
        $medicamento->posicion_id=$request->input('posicion_nroestante');        
        $medicamento->categoria_id=$request->input('categoria_nombre');

        $medicamento->save();
        self::registrarEnBitacora("Se registro un nuevo Medicamento");
        return redirect()->route('medicamentos.index')
            ->with('success','Medicamento Registrado Exitosamente'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {                         
        $medicamento = DB::table('medicamentos')            
            ->join('laboratorios','medicamentos.laboratorio_id','=','laboratorios.id')
            ->join('categorias','medicamentos.categoria_id','=','categorias.id')
            ->join('accionesterapeuticas','medicamentos.accionesterapeuticas_id','=','accionesterapeuticas.id')
            ->join('lotes','medicamentos.lote_id','=','lotes.id')
            ->join('posiciones','medicamentos.posicion_id','=','posiciones.id')
            
            ->select('medicamentos.id','medicamentos.nombre','medicamentos.descripcion','medicamentos.pventa','medicamentos.stock',
            'laboratorios.nombre as laboratorio_nombre',
            'accionesterapeuticas.nombre as accion_nombre',
            'lotes.codigo as lote_codigo','lotes.fechavencimiento as lote_vencimiento',
            'posiciones.nroestante as posicion_estante','posiciones.nrofila as posicion_fila',
            'categorias.nombre as categoria_nombre')
            ->where('medicamentos.id',$id)->get();
            
            $medicamento = $medicamento[0];  
                   
        return view('medicamentos.show',compact('medicamento'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        // $laboratorio=Laboratorio::find($id);
        // $paises=Pais::all();        
        
        // return view('laboratorios.edit',compact('laboratorio','paises'));
        $medicamento=Medicamento::find($id);
        $laboratorios=Laboratorio::all();
        $categorias=Categoria::all();
        $acciones=Accionterapeutica::all();
        $lotes=Lote::all();
        $posiciones=Posicion::all();

        return view('medicamentos.edit',compact('medicamento','laboratorios','categorias','acciones','lotes','posiciones'));
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
            'pventa' => 'required',         
            'stock' => 'required', 
            'laboratorio_nombre' => 'required',                          
            'accion_nombre' => 'required',            
            'lote_codigo' => 'required',                        
            'posicion_nroestante' => 'required',                    
            'categoria_nombre' => 'required',            
        ]);              
        $medicamento = Medicamento::find($id);
        $medicamento->nombre=$request->input('nombre');
        $medicamento->descripcion=$request->input('descripcion');
        $medicamento->pventa=$request->input('pventa');
        $medicamento->stock=$request->input('stock');
        $medicamento->laboratorio_id=$request->input('laboratorio_nombre');
        $medicamento->accionesterapeuticas_id=$request->input('accion_nombre');
        $medicamento->lote_id=$request->input('lote_codigo');        
        $medicamento->posicion_id=$request->input('posicion_nroestante');        
        $medicamento->categoria_id=$request->input('categoria_nombre');
        $medicamento->save();

        self::registrarEnBitacora("Se registro un nuevo medicamento");
        return redirect()->route('medicamentos.index')
            ->with('success','Medicamento Actualizado Exitosamente'); 
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Medicamento::find($id)->delete();
        return redirect()->route('medicamentos.index')
            ->with('success','Medicamento Borrado Exitosamente');
    
    }
}

