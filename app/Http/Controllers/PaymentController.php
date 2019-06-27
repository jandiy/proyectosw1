<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $paises = DB::table('paises')                
        //     ->select('paises.id','paises.nombre')
        //     ->get();    
        return view('payments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('paises.create');
        $user= Auth::user();
        $carts= DB::select("select p.codigo, p.nombre, p.precio, dc.cantidad, (dc.cantidad*p.precio) as subtotal, dc.id
            from detalle_carrito as dc, producto as p 
            where dc.producto_id=p.codigo and dc.carrito_id is null");
        if(count($carts)>0){
            $total=0;
            if(count($carts)>0){
                foreach ($carts as $key => $value) {
                $total=$total+$value->subtotal*1;
                }
            }
            $ether= $total / 2297.18;
            $gas= $ether + 0.000000000000001;
            
            return view('payments.create', compact('user','total','ether','gas'));
        }
        else{
            return view('carts.index',compact('carts'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'nombre' => 'required',
        // ]);

        // $pais = new Pais();
        // $pais->nombre  = $request->input('nombre');        
        // $pais->save();

        // return redirect()->route('paises.index')
        //     ->with('success','Pais Registrado Exitosamente'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $pais = Pais::find($id);
        // return view('paises.show',compact('pais'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $pais = Pais::find($id);
        //  return view('paises.edit',compact('pais'));
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
        // $this->validate($request, [
        //     'nombre' => 'required',            
        // ]);

        // $pais = Pais::find($id);
        // $pais->nombre  = $request->input('nombre');        
        // $pais->save();

        // return redirect()->route('paises.index')
        //     ->with('success','Pais Actualizada Exitosamente');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DB::table('paises')->where('id',$id)->delete();
        // return redirect()->route('paises.index')
        //     ->with('success','Registro de Pais Borrada Exitosamente');
    }
}
