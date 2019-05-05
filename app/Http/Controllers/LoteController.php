<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lote;
use DB;
class LoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $lotes = DB::table('lotes')                
            ->select('lotes.id','lotes.codigo','lotes.fechaproduccion','lotes.fechavencimiento')
            ->get();            
        return view('lotes.index',compact('lotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
                
        return view('lotes.create');
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
            'codigo' => 'required',
            'fechaproduccion' => 'required',
            'fechavencimiento' => 'required',            
        ]);

        $lote = new Lote();        
        $lote->codigo  = $request->input('codigo');
        $lote->fechaproduccion  = $request->input('fechaproduccion');
        $lote->fechavencimiento  = $request->input('fechavencimiento');     
        $lote->save();

        return redirect()->route('lotes.index')
            ->with('success','Lote Registrado Exitosamente'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lote = Lote::find($id);
        return view('lotes.show',compact('lote'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lote = Lote::find($id);
         return view('lotes.edit',compact('lote'));
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
            'codigo' => 'required',
            'fechaproduccion' => 'required',
            'fechavencimiento' => 'required',            
        ]);

        $lote = Lote::find($id);
        $lote->codigo  = $request->input('codigo');
        $lote->fechaproduccion  = $request->input('fechaproduccion');
        $lote->fechavencimiento  = $request->input('fechavencimiento');     
        $lote->save();

        return redirect()->route('lotes.index')
            ->with('success','Lote Actualizada Exitosamente');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('lotes')->where('id',$id)->delete();
        return redirect()->route('lotes.index')
            ->with('success','Lote Borrado Exitosamente');
    }
}
