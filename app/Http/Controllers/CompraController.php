<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;        
use Illuminate\Http\Request;
use App\Compra;
use App\CompraMedica;
use App\Medicamento;
use App\Provedor;
use DB;
class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = DB::table('compras')            
            ->join('users','compras.user_id','=','users.id')
            ->join('provedores','compras.provedor_id','=','provedores.id')
            ->select('compras.id','compras.fecha','compras.monto','users.name as usernombre',
                'provedores.nombre as provedornombre')
            ->get();        
                                
         return view('compras.index',compact('compras'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicamentos=Medicamento::all();
        $provedores=Provedor::all();
        return view('compras.create',compact('medicamentos','provedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=Auth::user();
        
        $this->validate($request, [
            'fecha' => 'required',
            'monto' => 'required',
            'provedor_id' => 'required',            
            'cantidad' => 'required',            
            'pcompra' => 'required',            
            'medica_id' => 'required',            
        ]);

        $compra = new Compra();
        $compra->fecha=$request->input('fecha');
        $compra->monto=$request->input('monto');
        $compra->provedor_id=$request->input('provedor_id');
        $compra->user_id=$user->id;                
        $compra->save();

        $compramedica= new CompraMedica();        
        $compramedica->cantidad=$request->input('cantidad');
        $compramedica->pcompra=$request->input('pcompra');
        $compramedica->compra_id=$compra->id;
        $compramedica->medica_id=$request->input('medica_id');        
        $compramedica->save();
                                
        $medicamento = Medicamento::find($request->input('medica_id'));
        $medicamento->stock=(($medicamento->stock)+$request->input('cantidad'));
        $medicamento->save();



        // self::registrarEnBitacora("Se registro una nueva compra");

        return redirect()->route('compras.index')
            ->with('success','Compra Registrada Exitosamente'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $compra = DB::table('compras')            
            ->join('users','compras.user_id','=','users.id')
            ->join('provedores','compras.provedor_id','=','provedores.id')
            ->select('compras.id','compras.fecha','compras.monto','users.name as usernombre',
                'provedores.nombre as provedornombre')
            ->where('compras.id',$id)
            ->get();               
    
            $compra=$compra[0];         
            // dd($compra);
        return view('compras.show',compact('compra'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $medicamentos=Medicamento::all();
        $provedores=Provedor::all();                     
        $compra=Compra::find($id);
        return view('compras.edit',compact('medicamentos','provedores','compra'));
   
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
        
        $user=Auth::user();
        // dd($request);
        $this->validate($request, [
            // 'nombre' => 'required',
            // 'descripcion' => 'required',
            // 'pais_id' => 'required',            
        ]);

        $compra = Compra::find($id);
        $compra->fecha=$request->input('fecha');
        $compra->monto=$request->input('monto');
        $compra->provedor_id=$request->input('provedor_id');
        $compra->user_id=$user->id;                
        $compra->save();

        
        $data = DB::table('compra_medica')
        ->where('compra_id',$compra->id)
        ->select('compra_medica.id')
        ->get();

        
        $compramedica= CompraMedica::find($data[0]->id);
        $compramedica->cantidad=$request->input('cantidad');
        $compramedica->pcompra=$request->input('pcompra');
        $compramedica->compra_id=$compra->id;
        $compramedica->medica_id=$request->input('medica_id');                
        $compramedica->save();
 
        return redirect()->route('compras.index')
            ->with('success','Compra Actualizada Exitosamente'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Compra::find($id)->delete();
        return redirect()->route('compras.index')
            ->with('success','Compra Borrada Exitosamente');
    
    }
}
