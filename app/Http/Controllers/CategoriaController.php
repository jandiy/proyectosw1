<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use DB;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = DB::table('categorias')                
                ->select('categorias.id','categorias.nombre','categorias.subcategoria')
                ->get();
        return view('categorias.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('categorias.create');
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
            'subcategoria'=> 'required',                        
        ]);

        $categoria = new Categoria();
        $categoria->nombre  = $request->input('nombre');
        $categoria->subcategoria = $request->input('subcategoria');
        $categoria->save();

        self::registrarEnBitacora("Se registro una nueva categoria");

        return redirect()->route('categorias.index')
            ->with('success','Categoria Creada Exitosamente');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Categoria::find($id);
        return view('categorias.show',compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);
         return view('categorias.edit',compact('categoria'));
   
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
            'subcategoria'=> 'required',                        
        ]);

        $categoria = Categoria::find($id);
        $categoria->nombre  = $request->input('nombre');
        $categoria->subcategoria = $request->input('subcategoria');
        $categoria->save();

        return redirect()->route('categorias.index')
            ->with('success','Categoria Actualizada Exitosamente');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('categorias')->where('id',$id)->delete();
        return redirect()->route('categorias.index')
            ->with('success','Categoria Borrada Exitosamente');
   
    }
}
